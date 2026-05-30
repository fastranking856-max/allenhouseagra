<?php

require_once __DIR__ . '/environment.php';
require_once dirname(__DIR__) . '/proxy/config.php';
require_once __DIR__ . '/layout-helpers.php';
require_once __DIR__ . '/api-adapters.php';

$api_url = rtrim(API_BASE_URL, '/');
$branchId = (int) BRANCH_ID;

if (!defined('ALLENHOUSE_GALLERY_BRANCH_ID')) {
    define('ALLENHOUSE_GALLERY_BRANCH_ID', $branchId);
}

function fetchMultipleApiData(array $endpoints): array
{
    $cacheFile = dirname(__DIR__) . '/cache/api-bulk.json';
    $cacheTtl = 300;

    if (is_app_local() && is_file($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTtl) {
        $cached = json_decode((string) file_get_contents($cacheFile), true);
        if (is_array($cached)) {
            return $cached;
        }
    }

    $baseUrl = CMS_API_URL;
    $mh = curl_multi_init();
    $curlHandles = [];
    $responses = [];

    foreach ($endpoints as $key => $endpoint) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $baseUrl . $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 12);
        apply_curl_ssl_options($ch);
        curl_multi_add_handle($mh, $ch);
        $curlHandles[$key] = $ch;
    }

    $running = null;
    do {
        $status = curl_multi_exec($mh, $running);
        if ($status > CURLM_OK) {
            break;
        }
        curl_multi_select($mh, 1.0);
    } while ($running > 0);

    foreach ($curlHandles as $key => $ch) {
        $content = curl_multi_getcontent($ch);
        $decoded = json_decode((string) $content, true);
        $responses[$key] = is_array($decoded) ? $decoded : ['status' => 'error', 'data' => []];
        curl_multi_remove_handle($mh, $ch);
        curl_close($ch);
    }

    curl_multi_close($mh);

    if (is_app_local()) {
        $cacheDir = dirname($cacheFile);
        if (!is_dir($cacheDir)) {
            @mkdir($cacheDir, 0777, true);
        }
        @file_put_contents($cacheFile, json_encode($responses));
    }

    return $responses;
}

$endpoints = [
    'home_data' => '/pages/home-page-agra',
    'about_us' => '/pages/about-us-page-agra',
    'our_curriculum_data' => '/pages/our-curriculum-page-agra',
    'our_story_data' => '/pages/our-story-page-agra',
    'pedagogy_data' => '/pages/pedagogy-page-agra',
    'facilities_data' => '/pages/facilities-page-agra',
    'fee_structure_data' => '/pages/fee-structure-page-agra',
    'admission_procedure_data' => '/pages/admission-procedure-page-agra',
    'school_brochure_data' => '/pages/school-brochure-page-agra',
    'bus_route_data' => '/pages/bus-route-page-agra',
    'academic_calendar_data' => '/pages/academic-calendar-page-agra',
    'photo_gallery_page' => '/pages/photo-gallery-page-agra',
    'video_gallery_page' => '/pages/video-gallery-page-agra',
    'print_media_page' => '/pages/print-media-page-agra',
    'entrepreneur_dream_hub_data' => '/pages/entrepreneur-dream-hub-page-agra',
    'careers_page' => '/pages/careers-page-agra',
    'achievements_page' => '/pages/achievements-page-agra',
    'events_page' => '/pages/events-page-agra',
    'transferpolicy_data' => '/pages/transfer-policy-page-agra',
    'book_list_info_data' => '/pages/book-list-info-page-agra',
    'club_page' => '/pages/clubs-page-agra',
    'view_tc_data' => '/pages/transfer-certificate-page-agra',
    'faq_page' => '/pages/faqs-page-agra',
    'oluxi_smart_skills_data' => '/pages/oluxi-smart-skills-page-agra',
    'menu_data' => '/menus/branch/' . $branchId,
    'header_footer_data' => '/public/branches/' . $branchId . '/layout-parts/',
    'scroll_text_data' => '/scrolling-texts/branch/' . $branchId,
    'statistic_data' => '/statistics/branch/' . $branchId,
    'flyer_data' => '/flyers/branch/' . $branchId,
    'photo_gallery_data' => '/galleries/type/gallery/branch/' . $branchId,
    'achievement_gallery_data' => '/galleries/type/achievements/branch/' . $branchId,
    'gallery_data' => '/galleries/branch/' . $branchId,
    'jobs_data' => '/jobs/branch/' . $branchId,
    'blogData' => '/blogs/branch/' . $branchId,
    'footer_link_data' => '/public/link-groups/position/footer/hierarchical?branch_id=' . $branchId,
    'grades' => '/grades/' . SCHOOL_ID,
    'cities' => '/cities/' . SCHOOL_ID,
    'school_sessions' => '/school-sessions',
        'coding_academics_data' => '/pages/coding-academy-page-agra',
        'animation_master_class_data' => '/pages/animation-academy-page-agra',
        'robotics_academics_data' => '/pages/robotics-academy-page-agra',
        'sports_academics_data' => '/pages/sports-academy-page-agra',
];

if (!isset($GLOBALS['api_cache'])) {
    $GLOBALS['api_cache'] = fetchMultipleApiData($endpoints);
error_log('DEBUG header_footer_data: ' . print_r($GLOBALS['api_cache']['header_footer_data'] ?? [], true));
}

$data = $GLOBALS['api_cache'];

$home_data = $data['home_data'] ?? ['status' => 'error', 'data' => []];
$about_us = $data['about_us'] ?? $home_data;
$our_curriculum_page = $data['our_curriculum_data'] ?? cmsEmptyResponse();
$our_story_page = $data['our_story_data'] ?? cmsEmptyResponse();
$pedagogy_page = $data['pedagogy_data'] ?? cmsEmptyResponse();
$facilities_page = $data['facilities_data'] ?? cmsEmptyResponse();
$menu_data = $data['menu_data'] ?? cmsEmptyResponse();
$header_footer_data = $data['header_footer_data'] ?? [];
$scroll_text_data = $data['scroll_text_data'] ?? cmsEmptyResponse();
$statistic_data = $data['statistic_data'] ?? cmsEmptyResponse();
$flyer_data = $data['flyer_data'] ?? cmsEmptyResponse();
$achievement_gallery_raw = $data['achievement_gallery_data'] ?? cmsEmptyResponse();
$gallery_raw = $data['gallery_data'] ?? cmsEmptyResponse();
$photo_gallery_raw = $data['photo_gallery_data'] ?? cmsEmptyResponse();
$jobs_data = $data['jobs_data'] ?? cmsEmptyResponse();
$blogData = $data['blogData'] ?? cmsEmptyResponse();
$footer_link_data = $data['footer_link_data'] ?? cmsEmptyResponse();
$faq_page = $data['faq_page'] ?? cmsEmptyResponse();
$club_page = $data['club_page'] ?? cmsEmptyResponse();
$view_tc_data = $data['view_tc_data'] ?? cmsEmptyResponse();
$coding_academics_data = $data['coding_academics_data'] ?? cmsEmptyResponse();
$animation_master_class_data = $data['animation_master_class_data'] ?? cmsEmptyResponse();
$robotics_academics_data = $data['robotics_academics_data'] ?? cmsEmptyResponse();
$sports_academics_data = $data['sports_academics_data'] ?? cmsEmptyResponse();
$hero__data = cmsHeroBannerLegacy($home_data);
$pop_data = cmsFlyerPopupLegacy($flyer_data);
$cta_data = cmsCtaLegacy($home_data);
$our_ex__data = cmsHomeExcellenceLegacy($home_data);
$ex__data = cmsStatisticsLegacy($statistic_data);
$video_data = cmsVideoLegacy($home_data);
$our_campus = cmsCampusLegacy($home_data);
$i_data = cmsTestimonialImageLegacy($home_data);
$v_data = cmsEmptyResponse();
$philosophy_data = cmsPhilosophyLegacy($home_data);
$ap_data = cmsLegacyContentBlock(cmsPageSection($home_data, 3));

$addressdata = cmsAddressLegacy($header_footer_data);
$contactsdata = cmsContactHeaderLegacy($header_footer_data);
$thmdata = cmsScrollTextLegacy($scroll_text_data);
$socialData = cmsSocialLinksLegacy($header_footer_data);
$app_data = cmsAppDetailsLegacy($header_footer_data);
$whatsapp = cmsWhatsappLegacy($header_footer_data);
$erpsdata = cmsEmptyResponse();
$alupdata = cmsEmptyResponse();

$metaData = cmsMetaFromPages([
    'Home Page' => $home_data,
    'About Us Page' => $about_us,
    'Our Curriculum' => $our_curriculum_page,
    'FAQ' => $faq_page,
    'Contact Us Page' => $home_data,
]);

$our_curriculum_data = cmsLegacyHtmlPageBlock($our_curriculum_page, 1);
$our_story_data = cmsLegacyHtmlPageBlock($our_story_page, 1);

$phc_data = cmsLegacyCarouselBlock(cmsPageSection($pedagogy_page, 2), 'Highlights of the Curriculum');
$ptl_data = cmsLegacyContentBlock(cmsPageSection($pedagogy_page, 3));
$pol_data = cmsLegacyContentBlock(cmsPageSection($pedagogy_page, 5));
$pbc_data = cmsLegacyCarouselBlock(cmsPageSection($pedagogy_page, 7), 'Brilliance Curriculum Model');
$pac_data = cmsLegacyCarouselBlock(cmsPageSection($pedagogy_page, 8), 'Achiever Curriculum Model');

$top_data = cmsLegacyCarouselBlock(cmsPageSection($facilities_page, 1), 'Facilities');
$plc_data = cmsLegacyContentBlock(cmsPageSection($facilities_page, 2));
$wcf_data = cmsLegacyContentBlock(cmsPageSection($facilities_page, 4));
$wcf_two_data = cmsCardSectionsLegacy($facilities_page, [5]);
$three_data = cmsCardSectionsLegacy($facilities_page, [6, 7]);

$fee_structure_data = cmsLegacyHtmlPageBlock($data['fee_structure_data'] ?? null, 1);
$bus_route_data = cmsLegacyHtmlPageBlock($data['bus_route_data'] ?? null, 0);
$book_list_info_data = cmsLegacyHtmlPageBlock($data['book_list_info_data'] ?? null, 1);
$academic_calendar_data = cmsLegacyHtmlPageBlock($data['academic_calendar_data'] ?? null, 1);
$school_brochure_data = cmsLegacyHtmlPageBlock($data['school_brochure_data'] ?? null, 1);
$transferpolicy_data = cmsLegacyHtmlPageBlock($data['transferpolicy_data'] ?? null, 1);
$entrepreneur_dream_hub_data = cmsLegacyContentBlock(cmsPageSection($data['entrepreneur_dream_hub_data'] ?? null, 1));
$oluxi_smart_skills_data = cmsLegacyContentBlock(cmsPageSection($data['oluxi_smart_skills_data'] ?? null, 1));


$achievement_data = cmsGalleryCollectionLegacy($achievement_gallery_raw);
$events_data = cmsGalleryCollectionLegacy($gallery_raw);
$print_media_data = cmsGalleryCollectionLegacy($gallery_raw);
$photo_gallery_data = cmsGalleryCollectionLegacy($photo_gallery_raw);
$club_data = $club_page;

$management_committee_data = cmsEmptyResponse();
$parent_teacher_data = cmsEmptyResponse();
$sexual_harassment_data = cmsEmptyResponse();
$general_information_data = cmsEmptyResponse();
$document_information_data = cmsEmptyResponse();
$contact_data = cmsWrapData([['description' => cmsLayoutMeta($header_footer_data)['footer_about'] ?? '']]);
$faq_data = cmsEmptyResponse();
$all_tc_data = cmsEmptyResponse();
$image_alt_data = cmsEmptyResponse();
$op_data = $philosophy_data;

/**
 * Alt text from CMS/API payloads.
 */
function cms_image_alt($item, string $fallback = ''): string
{
    if (!is_array($item)) {
        return htmlspecialchars($fallback, ENT_QUOTES, 'UTF-8');
    }

    $alt = $item['image_alt']
        ?? $item['image_alt_text']
        ?? $item['media_alt_text']
        ?? $item['alt_text']
        ?? $item['alt']
        ?? $item['title']
        ?? $item['name']
        ?? $fallback;

    return htmlspecialchars((string) $alt, ENT_QUOTES, 'UTF-8');
}

require_once __DIR__ . '/cms-bootstrap.php';
