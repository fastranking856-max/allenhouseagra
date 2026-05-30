<?php

declare(strict_types=1);

if (!function_exists('cmsAssetUrl')) {
    function cmsAssetUrl(?string $path): string
    {
        if ($path === null || $path === '') {
            return '';
        }

        // Strip duplicate API_BASE_URL prefix (API sometimes returns
        // "https://apscmsnew.fastranking.cloud/https://myschool-assets.s3...")
        $prefix = rtrim(API_BASE_URL, '/') . '/';
        if (strpos($path, $prefix) === 0) {
            $rest = substr($path, strlen($prefix));
            if (preg_match('#^https?://#i', $rest)) {
                return $rest;
            }
        }

        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        return rtrim(API_BASE_URL, '/') . '/' . ltrim($path, '/');
    }
}

if (!function_exists('cmsLayoutPartByType')) {
    function cmsLayoutPartByType(?array $layoutParts, string $type): ?array
    {
        if (!is_array($layoutParts)) {
            return null;
        }

        foreach ($layoutParts as $part) {
            if (is_array($part) && ($part['type'] ?? '') === $type) {
                return $part;
            }
        }

        return null;
    }
}

if (!function_exists('cmsFooterLinkGroup')) {
    function cmsFooterLinkGroup(?array $footerLinkData, string $slug): ?array
    {
        if (!is_array($footerLinkData)) {
            return null;
        }

        foreach ($footerLinkData['data'] ?? [] as $group) {
            if (is_array($group) && ($group['slug'] ?? '') === $slug) {
                return $group;
            }
        }

        return null;
    }
}

if (!function_exists('cmsMenuUrl')) {
    function cmsMenuUrl(?string $url): string
    {
        $url = trim((string) $url);
        if ($url === '') {
            return '#';
        }
        if (str_starts_with($url, 'mailto:') || str_starts_with($url, 'tel:')) {
            return $url;
        }

        if (preg_match('#^https?://#i', $url)) {
            if (is_app_local()) {
                $path = parse_url($url, PHP_URL_PATH) ?: '';
                $host = strtolower(parse_url($url, PHP_URL_HOST) ?: '');
                if (
                    $path !== '' &&
                    (
                        $host === 'allenhouseagra.com'
                        || $host === 'www.allenhouseagra.com'
                        || $host === 'localhost'
                        || $host === '127.0.0.1'
                    )
                ) {
                    return site_base_url() . ltrim($path, '/');
                }
            }

            return $url;
        }

        if ($url === '/') {
            return site_base_url();
        }

        return site_base_url() . ltrim($url, '/');
    }
}

if (!function_exists('renderAgraMenu')) {
    function renderAgraMenu(array $items, bool $isSub = false): void
    {
        if ($items === []) {
            return;
        }

        echo $isSub ? '<ul class="dps-menu-open">' : '<ul class="NavMenu MobileNav" id="NavMenu">';

        foreach ($items as $item) {
            if (!is_array($item)) {
                continue;
            }

            $children = $item['descendants'] ?? $item['children'] ?? [];
            $hasChildren = is_array($children) && $children !== [];
            $name = preg_replace('/\s*Page$/i', '', (string) ($item['name'] ?? ''));
            $target = htmlspecialchars((string) ($item['target'] ?? '_self'), ENT_QUOTES, 'UTF-8');
            $fullUrl = cmsMenuUrl($item['url'] ?? '');

            echo '<li>';

            if ($hasChildren) {
                echo '<a class="hover:text-red-500 dps-menu-toggle flex items-center gap-2 group">';
                echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                echo '<svg width="8" height="5" viewBox="0 0 8 5" xmlns="http://www.w3.org/2000/svg" class="transition fill-white lg:fill-black group-hover:fill-red-500"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.699203 0.281451C0.825931 0.154761 0.997788 0.0835904 1.17698 0.0835904C1.35617 0.0835904 1.52803 0.154761 1.65476 0.281451L3.88011 2.5068L6.10546 0.281451C6.1678 0.216906 6.24237 0.165424 6.32482 0.130007C6.40727 0.0945895 6.49594 0.0759472 6.58567 0.0751674C6.6754 0.0743877 6.76439 0.091486 6.84744 0.125465C6.93049 0.159444 7.00595 0.209623 7.0694 0.273074C7.13285 0.336525 7.18303 0.411978 7.21701 0.495029C7.25099 0.57808 7.26808 0.667067 7.2673 0.756797C7.26652 0.846527 7.24788 0.935203 7.21246 1.01765C7.17705 1.1001 7.12557 1.17467 7.06102 1.23701L4.35789 3.94014C4.23116 4.06683 4.0593 4.138 3.88011 4.138C3.70092 4.138 3.52906 4.06683 3.40233 3.94014L0.699203 1.23701C0.572513 1.11028 0.501343 0.938422 0.501343 0.759229C0.501343 0.580035 0.572513 0.408179 0.699203 0.281451Z"/></svg>';
                echo '</a>';
                renderAgraMenu($children, true);
            } else {
                echo '<a href="' . htmlspecialchars($fullUrl, ENT_QUOTES, 'UTF-8') . '" target="' . $target . '" class="hover:text-red-500">';
                echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                echo '</a>';
            }

            echo '</li>';
        }

        echo '</ul>';
    }
}

if (!function_exists('renderAgraFooterLinks')) {
    function renderAgraFooterLinks(array $links, string $linkClass = ''): void
    {
        if ($links === []) {
            return;
        }

        echo '<ul class="grid grid-cols-1 gap-2 mt-2">';
        foreach ($links as $link) {
            if (!is_array($link) || empty($link['title'])) {
                continue;
            }
            $href = cmsMenuUrl($link['url'] ?? '#');
            $target = htmlspecialchars((string) ($link['target'] ?? '_self'), ENT_QUOTES, 'UTF-8');
            echo '<li><a href="' . htmlspecialchars($href, ENT_QUOTES, 'UTF-8') . '" target="' . $target . '" class="' . htmlspecialchars($linkClass, ENT_QUOTES, 'UTF-8') . '">';
            echo htmlspecialchars((string) $link['title'], ENT_QUOTES, 'UTF-8');
            echo '</a></li>';
        }
        echo '</ul>';
    }
}
