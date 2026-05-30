<?php
require_once 'config.php';
require_once dirname(__DIR__) . '/includes/environment.php';

function fetchApiData($endpoint) {
    $url = rtrim(API_BASE_URL, '/') . '/' . ltrim($endpoint, '/');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    apply_curl_ssl_options($ch);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo "cURL Error: " . curl_error($ch);
        return null;
    }
    curl_close($ch);

    return json_decode($response, true);
}