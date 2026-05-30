<?php
require_once __DIR__ . '/environment.php';
require_once dirname(__DIR__) . '/proxy/config.php';

$apiUrl = CMS_API_URL . '/cities/' . SCHOOL_ID;

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

if (isset($json['status']) && $json['status'] === 'success' && is_array($json['data'] ?? null)) {
    $items = $json['data'];
} else {
    $items = is_array($json) ? $json : [];
}

$uniqueCities = [];
foreach ($items as $city) {
    if (!is_array($city)) {
        continue;
    }
    $cityName = trim((string) ($city['name'] ?? ''));
    if ($cityName === '') {
        continue;
    }
    $key = strtolower($cityName);
    if (isset($uniqueCities[$key])) {
        continue;
    }
    $uniqueCities[$key] = array_merge($city, ['name' => $cityName]);
}

$result = array_values($uniqueCities);
usort($result, static function (array $a, array $b): int {
    return strnatcasecmp((string) ($a['name'] ?? ''), (string) ($b['name'] ?? ''));
});

return $result;
