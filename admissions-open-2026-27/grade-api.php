<?php
$grades = include dirname(__DIR__) . '/includes/grade-api.php';
if (!is_array($grades) || $grades === []) {
    echo '<option value="" disabled selected>Select Grade</option>';
    return;
}

echo '<option value="" disabled selected>Select Grade</option>';
foreach ($grades as $grade) {
    $name = trim((string) ($grade['grades'] ?? $grade['name'] ?? ''));
    if ($name === '') {
        continue;
    }
    echo '<option value="' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '">'
        . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '</option>';
}
