<?php
require_once __DIR__ . '/environment.php';
require_once dirname(__DIR__) . '/proxy/config.php';

$apiUrl = CMS_API_URL . '/grades/' . BRANCH_ID;

$ch = curl_init($apiUrl);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST  => 'GET',
    CURLOPT_HTTPHEADER     => [
        'Content-Type: application/json',
        'Accept: application/json',
    ],
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
if (!is_array($json) || !isset($json['data']) || !is_array($json['data'])) {
    return [];
}

$labels = [];
foreach ($json['data'] as $grade) {
    if (!is_array($grade)) {
        continue;
    }
    $labels[] = $grade['grades'] ?? $grade['name'] ?? '';
}

return array_map(
    static fn (string $label): array => ['grades' => $label, 'name' => $label],
    cms_sort_grade_labels($labels)
);
