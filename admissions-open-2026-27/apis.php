<?php
require_once dirname(__DIR__) . '/includes/environment.php';
require_once dirname(__DIR__) . '/proxy/config.php';

function fetchMultipleApiData($endpoints)
{
    $baseUrl = CMS_API_URL;
    $mh = curl_multi_init();
    $curlHandles = [];
    $responses = [];

    foreach ($endpoints as $key => $endpoint) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $baseUrl . $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 8);
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
    return $responses;
}

$sid = (string) SCHOOL_ID;
$endpoints = [
    'hero_banner'   => '/landing-page-hero-banner/' . $sid,
    'hero_text'     => '/landing-page-hero-banner-text/' . $sid,
    'about_us'      => '/landing-page-about-us/' . $sid,
    'shaping_data'  => '/landing-page-future-ready-skills/' . $sid,
    'advance_data'  => '/landing-page-advance-academic-model/' . $sid,
    'why_data'      => '/landing-page-why-do-family-choose/' . $sid,
    'century_data'  => '/landing-page-21-century-skill/' . $sid,
    'social_data'   => '/landing-page-social-media/' . $sid,
    'legacy_data'   => '/landing-page-legacy-of-excellence/' . $sid,
    'testimonial_data' => '/landing-page-parents-insights/' . $sid,
    'address_data'  => '/landing-page-footer-address/' . $sid,
    'cta_data'      => '/landing-page-cta/' . $sid,
    'achievement_data' => '/landing-page-allenhouse-achievement/' . $sid,
    'life_data' => '/anding-page-life-at-allenhouse/' . $sid,
    'whatsapp' => '/whatsapp/' . $sid,
    'brochure' => '/school-brochure/' . $sid,
    'fee' => '/fee-structure/' . $sid,
    'world_class' => '/landing-page-our-achievers/' . $sid,
];

$data = fetchMultipleApiData($endpoints);
$hero_banner   = $data['hero_banner'];
$hero_text     = $data['hero_text'];
$about_us      = $data['about_us'];
$shaping_data = $data['shaping_data'];
$advance_data  = $data['advance_data'];
$why_data = $data['why_data'];
$century_data = $data['century_data'];
$social_data = $data['social_data'];
$legacy_data = $data['legacy_data'];
$testimonial_data = $data['testimonial_data'];
$address_data = $data['address_data'];
$cta_data = $data['cta_data'];
$achievement_data = $data['achievement_data'];
$life_data = $data['life_data'];
$whatsapp = $data['whatsapp'];
$brochure = $data['brochure'];
$fee = $data['fee'];
$world_class = $data['world_class'];
