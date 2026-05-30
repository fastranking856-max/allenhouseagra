<?php
include_once __DIR__ . '/api.php';
include_once __DIR__ . '/apis.php';

$metaTitle = "Allenhouse Agra - Quality Education for Future Leaders";
$metaDescription = "Description";
$metaItems = $metaData['data'] ?? [];

$currentFile = basename($_SERVER['PHP_SELF'], '.php');

$pageMap = [
    'index' => 'Home Page',
    'contact-us' => 'Contact Us Page',
    'about-us' => 'About Us Page',
    'admission-procedure' => 'Admission - Admission procedure',
    'fee-structure' => 'Admission - Fee structure',
    'blog' => 'Blogs',
    'faq' => 'FAQ',
    'our-curriculum' => 'Our Curriculum'
];

$currentPageName = $pageMap[$currentFile] ?? null;

if ($currentPageName) {
    foreach ($metaItems as $item) {
        if (isset($item['webpage']['name']) && strcasecmp(trim($item['webpage']['name']), trim($currentPageName)) === 0) {
            $metaTitle = $item['title'];
            $metaDescription = $item['description'];
            break;
        }
    }
}

echo "<title>$metaTitle</title>\n";
echo "<meta name=\"description\" content=\"$metaDescription\">\n";
