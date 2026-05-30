<?php

declare(strict_types=1);

require_once __DIR__ . '/api.php';

/** Same school id as header/meta across the site */
if (!defined('ALLENHOUSE_SCLID')) {
    define('ALLENHOUSE_SCLID', SCHOOL_ID);
}

if (!defined('ALLENHOUSE_SITE_ORIGIN')) {
    define('ALLENHOUSE_SITE_ORIGIN', 'https://allenhouseagra.com');
}

/**
 * CMS endpoint slug (same pattern as other apis: `{slug}/SCLID...`).
 */
if (!defined('ALLENHOUSE_IMAGE_ALT_ENDPOINT')) {
    define('ALLENHOUSE_IMAGE_ALT_ENDPOINT', 'image_alt_text/' . ALLENHOUSE_SCLID);
}

/**
 * Php basename (no .php) -> CMS webpage display names, for matching row.webpage.name.
 *
 * @return array<string, list<string>>
 */
function allenhouse_image_alt_page_aliases(): array
{
    static $map = null;
    if ($map !== null) {
        return $map;
    }

    $explicit = [
        'index' => ['Home Page', 'home'],
        'contact-us' => ['Contact Us Page'],
        'about-us' => ['About Us Page'],
        'admission-procedure' => ['Admission - Admission procedure'],
        'fee-structure' => ['Admission - Fee structure'],
        'blog' => ['Blogs'],
        'faq' => ['FAQ'],
        'our-curriculum' => ['Our Curriculum'],
    ];

    $map = [];

    foreach (glob(dirname(__DIR__) . '/*.php') ?: [] as $file) {
        $slug = basename($file, '.php');
        $map[$slug][] = $slug;
        $map[$slug][] = str_replace('-', ' ', $slug);
    }

    foreach ($explicit as $slug => $names) {
        $map[$slug] = array_merge(isset($map[$slug]) ? $map[$slug] : [], $names);
    }

    foreach ($map as $slug => &$names) {
        $names = array_values(array_unique(array_filter(array_map(static function ($n) {
            return trim((string) $n);
        }, $names))));
    }
    unset($names);

    return $map;
}

function allenhouse_current_page_slug(): string
{
    $script = $_SERVER['SCRIPT_FILENAME'] ?? '';
    return basename((string) $script, '.php');
}

/**
 * Normalize image URL/path for lookup (absolute https when relative to this site).
 */
function allenhouse_normalize_image_src(string $src): string
{
    $src = trim(html_entity_decode($src, ENT_QUOTES | ENT_HTML5, 'UTF-8'));
    if ($src === '') {
        return '';
    }

    $parts = parse_url($src);
    if ($parts === false) {
        return strtolower(rawurldecode($src));
    }

    if (empty($parts['scheme'])) {
        $path = isset($parts['path']) ? (string) $parts['path'] : '';
        $path = str_replace('\\', '/', $path);
        $base = preg_match('#^/#', $path) ? ALLENHOUSE_SITE_ORIGIN : (ALLENHOUSE_SITE_ORIGIN . '/');
        $assembled = $base . ltrim($path, '/');
        if (!empty($parts['query'])) {
            $assembled .= '?' . $parts['query'];
        }

        return strtolower(rawurldecode($assembled));
    }

    return strtolower(rawurldecode($src));
}

/** @internal @return list<string> */
function allenhouse_normalize_key_variants(string $src): array
{
    $n = allenhouse_normalize_image_src($src);
    if ($n === '') {
        return [];
    }

    $variants = [$n];
    $p = parse_url($n);
    if ($p !== false && !empty($p['path'])) {
        $path = (string) $p['path'];
        $variants[] = strtolower($path);
        $basename = strtolower(basename($path));
        if ($basename !== '') {
            $variants[] = $basename;
            $variants[] = strtolower(rawurldecode($basename));
        }
    }

    return array_values(array_unique(array_filter($variants)));
}

/**
 * @param array<mixed, mixed> $row
 */
function allenhouse_alt_text_from_row(array $row): string
{
    foreach (['alt_text', 'image_alt_text', 'altText', 'image_alt', 'alternate_text', 'alt'] as $k) {
        if (!empty($row[$k])) {
            return trim((string) $row[$k]);
        }
    }
    // Some CMS payloads use "text" on image rows alongside image/media
    if (!empty($row['text']) && ((isset($row['image'])) || isset($row['urls']) || isset($row['media']))) {
        return trim((string) $row['text']);
    }

    return '';
}

/**
 * @param array<mixed, mixed> $row
 *
 * @return list<string>
 */
function allenhouse_extract_image_urls_from_row(array $row): array
{
    $urls = [];

    foreach (['image', 'url', 'image_url', 'src'] as $k) {
        if (!empty($row[$k]) && is_string($row[$k])) {
            $urls[] = $row[$k];
        }
    }

    foreach (['media', 'attachments', 'photos'] as $block) {
        if (empty($row[$block]) || !is_array($row[$block])) {
            continue;
        }
        $m = $row[$block];

        foreach (['urls', 'path', 'src', 'url'] as $bk) {
            if (!empty($m[$bk]) && is_string($m[$bk])) {
                $urls[] = $m[$bk];
            }
        }
    }

    return array_values(array_unique(array_filter($urls)));
}

/**
 * @param array<mixed, mixed> $webpage
 * @param list<string>       $aliases
 */
function allenhouse_webpage_row_matches_slug(array $webpage, string $slug, array $aliases): bool
{
    $name = isset($webpage['name']) ? trim((string) $webpage['name']) : '';

    foreach ($aliases as $a) {
        if ($a !== '' && strcasecmp($name, $a) === 0) {
            return true;
        }
    }

    foreach (['slug', 'basename', 'file', 'code'] as $k) {
        if (!isset($webpage[$k])) {
            continue;
        }

        $v = trim((string) $webpage[$k]);

        if ($v !== '' && strcasecmp($v, $slug) === 0) {
            return true;
        }
    }

    foreach (['id', 'webpageid'] as $k) {
        if (!isset($webpage[$k])) {
            continue;
        }
        // rarely id equals slug literal
        if ((string) $webpage[$k] !== '' && strcasecmp((string) $webpage[$k], $slug) === 0) {
            return true;
        }
    }

    return false;
}

/**
 * Row applies when it has no webpage (global rows) or when webpage matches this page.
 *
 * @param array<mixed, mixed> $row
 * @param list<string>        $aliases
 */
function allenhouse_image_alt_row_matches_page(array $row, string $slug, array $aliases): bool
{
    if (isset($row['webpage'])) {
        $w = $row['webpage'];

        if (!is_array($w)) {
            return true;
        }

        if ([] === $w) {
            return true;
        }

        return allenhouse_webpage_row_matches_slug($w, $slug, $aliases);
    }

    if (isset($row['page_slug'])) {
        return strcasecmp(trim((string) $row['page_slug']), $slug) === 0;
    }

    if (isset($row['page'])) {
        return strcasecmp(trim((string) $row['page']), $slug) === 0;
    }

    return true;
}

/** @return array<string, string> */
function allenhouse_build_image_alt_lookup(): array
{
    static $cache = null;
    if ($cache !== null) {
        return $cache;
    }

    $slug = allenhouse_current_page_slug();
    if (isset($GLOBALS['page']) && is_string($GLOBALS['page']) && trim($GLOBALS['page']) !== '') {
        $slug = trim($GLOBALS['page']);
    }

    $aliases = allenhouse_image_alt_page_aliases();

    /** @var list<string> */
    $aliasList = isset($aliases[$slug]) ? $aliases[$slug] : [$slug, str_replace('-', ' ', $slug)];

    $payload = $image_alt_data;
    if (($payload['status'] ?? '') === 'error' && empty($payload['data'])) {
        $payload = fetchApiData(ALLENHOUSE_IMAGE_ALT_ENDPOINT);
    }
    $hasData = isset($payload['data']) && $payload['data'] !== null && (!is_array($payload['data']) || $payload['data'] !== []);
    $statusFail = (($payload['status'] ?? '') === 'error') && !$hasData;

    if ($statusFail) {
        $cache = [];

        return $cache;
    }

    /** @var mixed */
    $rawData = $payload['data'];

    if (!is_array($rawData) || $rawData === []) {
        $cache = [];

        return $cache;
    }

    /** @var list<array<mixed,mixed>> */
    $items = [];

    // List of rows versus single associative row object
    if (isset($rawData[0]) && is_array($rawData[0])) {
        foreach ($rawData as $row) {
            if (is_array($row)) {
                $items[] = $row;
            }
        }
    } elseif (is_array($rawData)) {
        /** @var array<mixed,mixed> $rawData */
        $items[] = $rawData;
    }

    /** @var array<string, string> */
    $lookup = [];

    foreach ($items as $item) {
        if (!is_array($item)) {
            continue;
        }

        if (!allenhouse_image_alt_row_matches_page($item, $slug, $aliasList)) {
            continue;
        }

        $alt = allenhouse_alt_text_from_row($item);

        foreach (allenhouse_extract_image_urls_from_row($item) as $u) {
            foreach (allenhouse_normalize_key_variants($u) as $key) {
                if ($alt === '' || $key === '') {
                    continue;
                }

                if (!isset($lookup[$key])) {
                    $lookup[$key] = $alt;
                }
            }
        }
    }

    $cache = $lookup;

    return $cache;
}

/**
 * Prefer CMS alt for this URL on the active page; else use fallback string.
 */
function img_alt(?string $imageSrc, ?string $fallback = null): string
{
    $lookup = allenhouse_build_image_alt_lookup();

    foreach (allenhouse_normalize_key_variants((string) $imageSrc) as $key) {
        if (isset($lookup[$key])) {
            return $lookup[$key];
        }
    }

    return $fallback ?? '';
}

if (!function_exists('allenhouse_apply_image_alt_to_html')) {
    /**
     * @internal Merge CMS-defined alt attributes into rendered HTML.
     */
    function allenhouse_apply_image_alt_to_html(string $html): string
    {
        if (allenhouse_build_image_alt_lookup() === []) {
            return $html;
        }

        return preg_replace_callback(
            '/<img\b[^>]*>/is',
            function (array $m): string {
                $tag = $m[0];
                $lookup = allenhouse_build_image_alt_lookup();

                if (!preg_match('/\bsrc\s*=\s*(["\'])([^"\']*)\1/i', $tag, $sm)) {
                    return $tag;
                }

                $chosen = null;
                foreach (allenhouse_normalize_key_variants($sm[2]) as $key) {
                    if (isset($lookup[$key])) {
                        $chosen = $lookup[$key];
                        break;
                    }
                }

                if ($chosen === null) {
                    return $tag;
                }

                $replacement = htmlspecialchars($chosen, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

                if (preg_match('/\salt\s*=\s*(["\'])[^"\']*\1/is', $tag)) {
                    $out = preg_replace('/\salt\s*=\s*(["\'])[^"\']*\1/is', ' alt="' . $replacement . '"', $tag, 1);

                    return $out !== null ? $out : $tag;
                }

                $out = preg_replace('/<img\b/i', '<img alt="' . $replacement . '"', $tag, 1);

                return $out !== null ? $out : $tag;
            },
            $html
        ) ?? $html;
    }
}

if (!function_exists('allenhouse_image_alt_ob_handler')) {
    /**
     * @param mixed $_phase Chunk status flag from PHP output buffering.
     */
    function allenhouse_image_alt_ob_handler(string $buffer, int $_phase): string
    {
        return allenhouse_apply_image_alt_to_html($buffer);
    }
}
