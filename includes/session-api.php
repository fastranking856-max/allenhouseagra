<?php
require_once __DIR__ . '/environment.php';
require_once dirname(__DIR__) . '/proxy/config.php';

$apiUrl = CMS_API_URL . '/school-sessions';

$ch = curl_init($apiUrl);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 10,
    CURLOPT_CONNECTTIMEOUT => 5,
]);
apply_curl_ssl_options($ch);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($response === false || $httpCode !== 200) {
    return [];
}

$json = json_decode($response, true);
if (!is_array($json)) {
    return [];
}

$items = $json['data']['data'] ?? $json['data'] ?? [];
if (!is_array($items)) {
    return [];
}

return array_values(array_filter(array_map(static function ($item) {
    if (!is_array($item)) {
        return null;
    }
    $session = trim((string) ($item['session'] ?? $item['name'] ?? ''));
    if ($session === '') {
        return null;
    }

    return ['session' => $session];
}, $items)));
