<?php
$cities = include dirname(__DIR__) . '/includes/get-city.php';
if (!is_array($cities) || $cities === []) {
    echo '<option value="" disabled selected>Select City</option>';
    return;
}

echo '<option value="" disabled selected>Select City</option>';
foreach ($cities as $city) {
    $cityName = trim((string) ($city['name'] ?? ''));
    if ($cityName === '') {
        continue;
    }
    echo '<option value="' . htmlspecialchars($cityName, ENT_QUOTES, 'UTF-8') . '">'
        . htmlspecialchars($cityName, ENT_QUOTES, 'UTF-8') . '</option>';
}
