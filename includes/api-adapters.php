<?php

declare(strict_types=1);

function cmsEmptyResponse(): array
{
    return ['status' => 'success', 'data' => []];
}

function cmsWrapData(array $rows): array
{
    return ['status' => 'success', 'data' => $rows];
}

if (!function_exists('cmsJobsApiSucceeded')) {
    function cmsJobsApiSucceeded(?array $response): bool
    {
        if (!is_array($response)) {
            return false;
        }
        if (($response['status'] ?? '') === 'success') {
            return true;
        }
        if (!empty($response['success'])) {
            return true;
        }

        return array_key_exists('data', $response);
    }
}

if (!function_exists('cmsJobsListFromResponse')) {
    /**
     * @return list<array<string, mixed>>
     */
    function cmsJobsListFromResponse(?array $response): array
    {
        if (!is_array($response)) {
            return [];
        }
        $data = $response['data'] ?? null;
        if (!is_array($data)) {
            return [];
        }
        if (array_key_exists('id', $data) || array_key_exists('job_title', $data)) {
            return [$data];
        }

        return array_values(array_filter($data, 'is_array'));
    }
}

if (!function_exists('cmsFindJobInResponse')) {
    /**
     * @return array<string, mixed>|null
     */
    function cmsFindJobInResponse(?array $response, int|string|null $jobId): ?array
    {
        if ($jobId === null || $jobId === '') {
            return null;
        }
        foreach (cmsJobsListFromResponse($response) as $job) {
            if ((string) ($job['id'] ?? '') === (string) $jobId) {
                return $job;
            }
        }

        return null;
    }
}

if (!function_exists('cmsJobDisplayTitle')) {
    function cmsJobDisplayTitle(?array $job): string
    {
        if (!is_array($job)) {
            return '';
        }

        return trim((string) ($job['job_title'] ?? $job['title'] ?? ''));
    }
}

function cmsPlainText(?string $html): string
{
    if ($html === null || trim($html) === '') {
        return '';
    }

    $text = html_entity_decode($html, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $text = strip_tags($text);
    $text = preg_replace('/\s+/u', ' ', $text);

    return trim((string) $text);
}

function cmsParseCampusItem(array $item): array
{
    $html = (string) ($item['description'] ?? '');
    $location = '';
    $phone = '';

    if (preg_match('/data-href="tel:([^"]+)"/i', $html, $matches)) {
        $phone = trim(html_entity_decode($matches[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'));
    } elseif (preg_match('/href="tel:([^"]+)"/i', $html, $matches)) {
        $phone = trim(html_entity_decode($matches[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'));
    } elseif (preg_match('/(\+91[\s\d-]{8,})/', cmsPlainText($html), $matches)) {
        $phone = trim($matches[1]);
    }

    if (preg_match('/<p[^>]*class="[^"]*text-gray-500[^"]*"[^>]*>(.*?)<\/p>/is', $html, $matches)) {
        $location = cmsPlainText($matches[1]);
    } else {
        $plain = cmsPlainText($html);
        if ($phone !== '') {
            $plain = trim(str_replace($phone, '', $plain));
        }
        $location = trim(preg_replace('/^Location icon\s*/i', '', $plain));
    }

    if ($location !== '' && str_contains($location, ',')) {
        [$line1, $line2] = array_map('trim', explode(',', $location, 2));
        return [
            'addressline1' => $line1,
            'addressline2' => $line2,
            'contact' => $phone,
        ];
    }

    return [
        'addressline1' => $location,
        'addressline2' => '',
        'contact' => $phone,
    ];
}

function cmsPageSection(?array $page, int $index): ?array
{
    if (!is_array($page) || !isset($page['data']['sections'][$index])) {
        return null;
    }

    $next = $index + 1;
    $rendered = (int) ($GLOBALS['cms_rendered_section_count'] ?? 0);
    if ($next > $rendered) {
        $GLOBALS['cms_rendered_section_count'] = $next;
    }

    $section = $page['data']['sections'][$index];
    return is_array($section) ? $section : null;
}

function cmsSectionHtml(?array $section): string
{
    if (!is_array($section)) {
        return '';
    }

    foreach (['content', 'content_heading', 'description'] as $key) {
        if (!empty($section[$key]) && is_string($section[$key])) {
            return $section[$key];
        }
    }

    $resolved = $section['resolved_content'] ?? null;
    if (is_array($resolved)) {
        foreach (['content', 'heading', 'description', 'content_text'] as $key) {
            if (!empty($resolved[$key]) && is_string($resolved[$key])) {
                return $resolved[$key];
            }
        }
    }

    return '';
}

function cmsLayoutPart(?array $layoutParts, string $slug): ?array
{
    if (!is_array($layoutParts)) {
        return null;
    }

    foreach ($layoutParts as $part) {
        if (is_array($part) && ($part['slug'] ?? '') === $slug) {
            return $part;
        }
    }

    return null;
}

function cmsLayoutMeta(?array $layoutParts, string $slug = 'header-aps-agra'): array
{
    $part = cmsLayoutPart($layoutParts, $slug);
    $meta = $part['meta_data'] ?? [];

    return is_array($meta) ? $meta : [];
}

function cmsCarouselMedias(?array $section): array
{
    $items = $section['resolved_content']['items'] ?? [];
    if (!is_array($items)) {
        return [];
    }

    $medias = [];
    foreach ($items as $item) {
        if (!is_array($item)) {
            continue;
        }
        $url = $item['image_url'] ?? $item['media_url'] ?? '';
        if ($url === '') {
            continue;
        }
        $medias[] = [
            'urls' => $url,
            'image_url' => $url,
            'title' => $item['title'] ?? '',
            'image_alt' => $item['image_alt'] ?? null,
        ];
    }

    return $medias;
}

function cmsLegacyCarouselBlock(?array $section, string $title = ''): array
{
    if (!is_array($section)) {
        return cmsEmptyResponse();
    }

    $resolved = $section['resolved_content'] ?? [];
    $heading = is_array($resolved) ? ($resolved['heading'] ?? '') : '';

    return cmsWrapData([[
        'title' => $title !== '' ? $title : ($section['title'] ?? ''),
        'details' => cmsSectionHtml($section) !== '' ? cmsSectionHtml($section) : $heading,
        'description' => cmsSectionHtml($section),
        'medias' => cmsCarouselMedias($section),
        'media' => ['urls' => cmsCarouselMedias($section)[0]['urls'] ?? ''],
    ]]);
}

function cmsLegacyContentBlock(?array $section): array
{
    if (!is_array($section)) {
        return cmsEmptyResponse();
    }

    $mediaUrl = '';
    $media = $section['resolved_content']['media'][0] ?? null;
    if (is_array($media)) {
        $mediaUrl = $media['media_url'] ?? $media['media_file'] ?? '';
    }

    $html = cmsSectionHtml($section);
    $plain = cmsPlainText($html);

    return cmsWrapData([[
        'title' => cmsPlainText((string) ($section['title'] ?? '')),
        'details' => $html,
        'description' => $plain,
        'detail' => $plain,
        'media' => ['urls' => $mediaUrl],
    ]]);
}

function cmsLegacyHtmlPageBlock(?array $page, int $sectionIndex = 1): array
{
    return cmsLegacyContentBlock(cmsPageSection($page, $sectionIndex));
}

function cmsHeroBannerLegacy(?array $homePage): array
{
    $section = cmsPageSection($homePage, 0);
    $items = $section['resolved_content']['items'] ?? [];
    if (!is_array($items) || $items === []) {
        return cmsEmptyResponse();
    }

    $desktop = [];
    $mobile = [];
    foreach ($items as $item) {
        if (!is_array($item)) {
            continue;
        }
        $desktopUrl = $item['image_url'] ?? '';
        $mobileUrl = $item['mobile_image_url'] ?? $desktopUrl;
        if ($desktopUrl === '') {
            continue;
        }
        $desktop[] = ['urls' => $desktopUrl] + $item;
        $mobile[] = ['urls' => $mobileUrl] + $item;
    }

    return cmsWrapData([
        ['device' => 'desktop', 'medias' => $desktop],
        ['device' => 'mobile', 'medias' => $mobile],
    ]);
}

function cmsCtaLegacy(?array $homePage): array
{
    $section = cmsPageSection($homePage, 1);
    $media = $section['resolved_content']['media'] ?? [];
    if (!is_array($media)) {
        return cmsEmptyResponse();
    }

    $rows = [];
    foreach ($media as $item) {
        if (!is_array($item)) {
            continue;
        }
        $rows[] = [
            'url' => $item['redirect_url'] ?? $item['page_link'] ?? '#',
            'name' => cmsPlainText($item['heading'] ?? ''),
            'media' => [
                'urls' => $item['media_url'] ?? $item['media_file'] ?? '',
            ],
        ];
    }

    return cmsWrapData($rows);
}

function cmsHomeExcellenceLegacy(?array $homePage): array
{
    $section = cmsPageSection($homePage, 2);
    $items = $section['resolved_content']['items'] ?? [];
    if (!is_array($items)) {
        return cmsEmptyResponse();
    }

    $rows = [];
    foreach ($items as $item) {
        if (!is_array($item)) {
            continue;
        }
        $link = $item['link_url'] ?? '';
        $slug = $link !== '' ? basename(parse_url($link, PHP_URL_PATH) ?: '') : '';
        $rawDesc = $item['description'] ?? '';
        if ($rawDesc !== '' && preg_match('/<h2[^>]*>(.*?)<span[^>]*>(.*?)<\/span>/s', $rawDesc, $m)) {
            $exTitle = trim(strip_tags($m[2]));
            $exSubtitle = '';
        } else {
            $exTitle = cmsPlainText($item['title'] ?? 'Excellence');
            $exSubtitle = '';
        }
        $rows[] = [
            'title' => $exTitle,
            'subtitle' => $exSubtitle,
            'description' => $exSubtitle,
            'slug' => $slug,
            'title_color' => '#B4D7FF',
            'subtitle_color' => 'rgba(255, 255, 255, 0.8)',
            'media' => ['urls' => $item['image_url'] ?? ''],
        ];
    }

    return cmsWrapData($rows);
}

function cmsStatisticsLegacy(?array $statistics): array
{
    $items = $statistics['data'][0]['items'] ?? [];
    if (!is_array($items) || $items === []) {
        return cmsEmptyResponse();
    }

    $map = [
        'years' => 'years',
        'year' => 'years',
        'campus' => 'campus',
        'campuses' => 'campus',
        'students' => 'student',
        'student' => 'student',
        'staff' => 'staff',
        'alumni' => 'alumni',
    ];

    $row = [];
    foreach ($items as $item) {
        if (!is_array($item)) {
            continue;
        }
        $heading = strtolower(trim((string) ($item['heading'] ?? '')));
        $key = $map[$heading] ?? $heading;
        $value = trim((string) ($item['count'] ?? ''));
        $unit = trim((string) ($item['unit'] ?? ''));
        $row[$key] = $value . $unit;
    }

    return cmsWrapData([$row]);
}

function cmsPhilosophyLegacy(?array $homePage): array
{
    $section = cmsPageSection($homePage, 5);
    $items = $section['resolved_content']['items'] ?? [];
    if (!is_array($items)) {
        return cmsEmptyResponse();
    }

    $rows = [];
    foreach ($items as $item) {
        if (!is_array($item)) {
            continue;
        }
        $rows[] = [
            'title' => cmsPlainText($item['title'] ?? ''),
            'description' => cmsPlainText($item['description'] ?? ''),
            'media' => ['urls' => $item['image_url'] ?? ''],
        ];
    }

    return cmsWrapData($rows);
}

function cmsVideoLegacy(?array $homePage): array
{
    $section = cmsPageSection($homePage, 7);
    $resolved = $section['resolved_content'] ?? [];
    if (!is_array($resolved)) {
        return cmsEmptyResponse();
    }

    $url = $resolved['video_url'] ?? '';
    if ($url === '' && !empty($resolved['media'][0]['media_url'])) {
        $url = $resolved['media'][0]['media_url'];
    }

    return cmsWrapData([['url' => $url]]);
}

function cmsCampusLegacy(?array $homePage): array
{
    $section = cmsPageSection($homePage, 8);
    $items = $section['resolved_content']['items'] ?? [];
    if (!is_array($items)) {
        return cmsEmptyResponse();
    }

    $rows = [];
    foreach ($items as $item) {
        if (!is_array($item)) {
            continue;
        }
        $rows[] = [
            'title' => cmsPlainText($item['title'] ?? ''),
            'description' => cmsPlainText($item['description'] ?? ''),
            'url' => $item['link_url'] ?? '#',
            'media' => ['urls' => cmsAssetUrl($item['image_url'] ?? '')],
            'image' => cmsAssetUrl($item['image_url'] ?? ''),
        ];
        $parsed = cmsParseCampusItem($item);
        $rows[count($rows) - 1]['id'] = $item['id'] ?? null;
        $rows[count($rows) - 1]['name'] = cmsPlainText($item['title'] ?? '');
        $rows[count($rows) - 1]['addressline1'] = $parsed['addressline1'];
        $rows[count($rows) - 1]['addressline2'] = $parsed['addressline2'];
        $rows[count($rows) - 1]['contact'] = $parsed['contact'];
        $rows[count($rows) - 1]['weburl'] = $item['link_url'] ?? '#';
    }

    return cmsWrapData($rows);
}

function cmsTestimonialImageLegacy(?array $homePage): array
{
    $section = cmsPageSection($homePage, 10);
    $items = $section['resolved_content']['items'] ?? [];
    if (!is_array($items)) {
        return cmsEmptyResponse();
    }

    $rows = [];
    foreach ($items as $item) {
        if (!is_array($item)) {
            continue;
        }
        $rows[] = [
            'heading' => cmsPlainText($item['title'] ?? ''),
            'name' => cmsPlainText($item['title'] ?? ''),
            'description' => cmsPlainText($item['description'] ?? ''),
            'media' => ['urls' => cmsAssetUrl($item['image_url'] ?? '')],
            'image' => cmsAssetUrl($item['image_url'] ?? ''),
        ];
    }

    return cmsWrapData($rows);
}

function cmsFlyerPopupLegacy(?array $flyers): array
{
    $item = $flyers['data'][0] ?? null;
    if (!is_array($item)) {
        return cmsEmptyResponse();
    }

    return cmsWrapData([[
        'image' => $item['image_url'] ?? $item['image'] ?? '',
        'url' => $item['link_url'] ?? '#',
        'text' => $item['title'] ?? '',
    ]]);
}

function cmsAddressLegacy(?array $layoutParts): array
{
    $meta = cmsLayoutMeta($layoutParts);
    if ($meta === []) {
        return cmsEmptyResponse();
    }

    $phones = $meta['phones'] ?? [];
    $phone1 = is_array($phones) ? ($phones[0] ?? '') : (string) $phones;
    $phone2 = is_array($phones) ? ($phones[1] ?? '') : '';

    return cmsWrapData([[
        'addressline1' => $meta['address_line1'] ?? '',
        'addressline2' => $meta['address_line2'] ?? '',
        'pincode' => $meta['postal_code'] ?? '282007',
        'contact1' => $phone1,
        'contact2' => $phone2,
        'email' => $meta['email'] ?? '',
    ]]);
}

function cmsContactHeaderLegacy(?array $layoutParts): array
{
    $meta = cmsLayoutMeta($layoutParts);

    return cmsWrapData([[
        'phone' => is_array($meta['phones'] ?? null) ? ($meta['phones'][0] ?? '') : ($meta['phones'] ?? ''),
        'email' => $meta['email'] ?? '',
    ]]);
}

function cmsScrollTextLegacy(?array $scrollTexts): array
{
    $rows = [];
    foreach ($scrollTexts['data'] ?? [] as $item) {
        if (!is_array($item)) {
            continue;
        }
        $rows[] = [
            'text' => $item['content'] ?? $item['title'] ?? '',
            'title' => $item['title'] ?? '',
        ];
    }

    return cmsWrapData($rows);
}

function cmsSocialLinksLegacy(?array $layoutParts): array
{
    $meta = cmsLayoutMeta($layoutParts);
    $rows = [];
    $map = [
        ['facebook_url', 'Facebook'],
        ['youtube_url', 'YouTube'],
        ['twitter_url', 'Twitter'],
        ['instagram_url', 'Instagram'],
    ];

    foreach ($map as [$key, $name]) {
        if (!empty($meta[$key])) {
            $rows[] = ['name' => $name, 'url' => $meta[$key]];
        }
    }

    return cmsWrapData($rows);
}

function cmsAppDetailsLegacy(?array $layoutParts): array
{
    $meta = cmsLayoutMeta($layoutParts);

    return cmsWrapData([[
        'description' => $meta['footer_about'] ?? '',
        'android_link' => $meta['android_app_link'] ?? '',
        'ios_link' => $meta['ios_app_link'] ?? '',
    ]]);
}

function cmsWhatsappLegacy(?array $layoutParts): array
{
    $meta = cmsLayoutMeta($layoutParts);
    if (empty($meta['whatsapp_number'])) {
        return cmsEmptyResponse();
    }

    return cmsWrapData([[
        'number' => $meta['whatsapp_number'],
        'text' => $meta['whatsapp_cta_text'] ?? 'WhatsApp',
    ]]);
}

function cmsCardSectionsLegacy(?array $page, array $indexes): array
{
    $rows = [];
    foreach ($indexes as $index) {
        $section = cmsPageSection($page, $index);
        if (!is_array($section)) {
            continue;
        }
        $media = $section['resolved_content']['media'] ?? [];
        if (!is_array($media)) {
            continue;
        }
        foreach ($media as $item) {
            if (!is_array($item)) {
                continue;
            }
            $rows[] = [
                'title' => strip_tags((string) ($item['heading'] ?? $section['title'] ?? '')),
                'description' => $item['content'] ?? cmsSectionHtml($section),
                'media' => ['urls' => $item['media_url'] ?? $item['media_file'] ?? ''],
            ];
        }
    }

    return cmsWrapData($rows);
}

function cmsGalleryCollectionLegacy(?array $galleryResponse): array
{
    $items = $galleryResponse['data'] ?? [];
    if (!is_array($items)) {
        return cmsEmptyResponse();
    }

    $rows = [];
    foreach ($items as $item) {
        if (!is_array($item)) {
            continue;
        }

        $medias = [];
        foreach ($item['media'] ?? [] as $index => $media) {
            if (!is_array($media)) {
                continue;
            }
            $url = $media['media_url'] ?? $media['media_file'] ?? '';
            $medias[] = [
                'urls' => $url,
                'pivot' => ['is_cover' => $index === 0 ? '1' : '0'],
            ];
        }

        $subType = $item['gallery_sub_type']['sub_type_name'] ?? $item['gallery_type'] ?? '';

        $rows[] = [
            'id' => $item['id'] ?? null,
            'title' => $item['heading'] ?? $item['gallery_title'] ?? '',
            'achievementtitle' => $item['heading'] ?? $item['gallery_title'] ?? '',
            'description' => $item['content'] ?? $item['description'] ?? '',
            'achivementdescription' => $item['content'] ?? $item['description'] ?? '',
            'achevementdate' => $item['date'] ?? null,
            'achivementtype' => $subType,
            'gallery_slug' => $item['gallery_slug'] ?? '',
            'medias' => $medias,
            'media' => $medias[0] ?? ['urls' => ''],
        ];
    }

    return cmsWrapData($rows);
}

function cmsMetaFromPages(array $pages): array
{
    $rows = [];
    foreach ($pages as $pageName => $page) {
        if (!is_array($page) || empty($page['data'])) {
            continue;
        }
        $rows[] = [
            'title' => $page['data']['title'] ?? $pageName,
            'description' => $page['data']['meta_description'] ?? '',
            'webpage' => ['name' => $pageName],
        ];
    }

    return cmsWrapData($rows);
}
