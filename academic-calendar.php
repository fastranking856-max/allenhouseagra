<?php
include "includes/apis.php";

// Enable debug mode with ?debug=1
$debug = isset($_GET['debug']) && $_GET['debug'] == '1';

// Get raw page data from global cache
$raw_page = $GLOBALS['api_cache']['academic_calendar_data'] ?? [];
$page_data = $raw_page['data'] ?? [];

$sections = $page_data['sections'] ?? [];
$page_content = $page_data['content'] ?? '';
$page_description = $page_data['description'] ?? '';

$banner_html = '';
$table_html = '';

// Extract banner from hero/banner section
foreach ($sections as $section) {
    $title = trim($section['title'] ?? '');
    if (stripos($title, 'hero') !== false || stripos($title, 'banner') !== false) {
        $banner_html = $section['content_heading'] ?? '';
    }
    if (stripos($title, 'table') !== false && empty($table_html)) {
        $table_html = $section['content'] ?? '';
    }
}

// If no table found in sections, try the main page content
if (empty($table_html) && !empty($page_content)) {
    if (preg_match('/<table.*?>.*?<\/table>/is', $page_content, $matches)) {
        $table_html = $matches[0];
    } else {
        // Maybe the content is just text/HTML without a table
        $table_html = $page_content;
    }
}

// Try description field
if (empty($table_html) && !empty($page_description)) {
    if (preg_match('/<table.*?>.*?<\/table>/is', $page_description, $matches)) {
        $table_html = $matches[0];
    } else {
        $table_html = $page_description;
    }
}

// Fallback: try to build a table from common academic calendar fields
if (empty($table_html) && !empty($page_data)) {
    $rows = [];
    // Common field names
    $field_map = [
        'Academic Session' => $page_data['academic_session'] ?? $page_data['session'] ?? null,
        'Admissions Period' => $page_data['admission_period'] ?? $page_data['admissions'] ?? null,
        'Vacation Period' => $page_data['vacation_period'] ?? $page_data['vacation'] ?? null,
        'Term 1' => $page_data['term1'] ?? null,
        'Term 2' => $page_data['term2'] ?? null,
        'Examination Dates' => $page_data['exam_dates'] ?? null,
    ];
    foreach ($field_map as $label => $value) {
        if (!empty($value)) {
            $rows[] = ['label' => $label, 'value' => $value];
        }
    }
    if (!empty($rows)) {
        ob_start();
        ?>
        <table class="w-full text-[16px] text-left rtl:text-right text-gray-600 border border-gray-300">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th class="px-6 py-4 border">Event</th>
                    <th class="px-6 py-4 border">Details</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row): ?>
                <tr class="odd:bg-white even:bg-gray-50 border-b">
                    <td class="px-6 py-2 font-medium border"><?php echo htmlspecialchars($row['label']); ?></td>
                    <td class="px-6 py-2 border"><?php echo nl2br(htmlspecialchars($row['value'])); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
        $table_html = ob_get_clean();
    }
}

// Fallback banner if missing
if (empty($banner_html)) {
    $banner_html = '
    <div>
        <h2 class="text-[32px] sm:hidden block font-[700] text-white text-left mb-5 sm:mb-8 hr-line relative leading-9 pl-4">
            Academic Calendar
        </h2>
    </div>
    <div class="md:w-[100%]">
        <h2 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
            Academic Calendar
        </h2>
    </div>';
}

// Debug output (only if ?debug=1)
if ($debug) {
    echo '<div style="background:#f0f0f0; border:2px solid red; padding:20px; margin:20px; z-index:9999; position:relative;">';
    echo '<strong>🔍 Debug: Raw API response for academic_calendar_data</strong><br>';
    echo '<pre>' . htmlspecialchars(print_r($raw_page, true)) . '</pre>';
    echo '</div>';
}

// Final fallback message
if (empty($table_html)) {
    $table_html = '<p class="text-center text-gray-500 py-8">Academic calendar will be available soon.</p>';
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://allenhouseagra.com/academic-calendar" />
    <title>AllenHouse Agra | Academic Calendar</title>
    <?php include "includes/head.php"; ?>
</head>
<body>

<?php include "includes/header.php"; ?>

<div class="main relative mb-[40px] sm:mb-[120px]">
    <!-- Banner -->
    <div class="bg-center flex items-center text-left h-[300px] comman-banner">
        <?php echo $banner_html; ?>
    </div>

    <!-- Breadcrumb -->
    <div class="flex m-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="/" class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main">Home</a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                    </svg>
                    <p class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Admission</p>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                    </svg>
                    <a href="academic-calendar" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Academic Calendar</a>
                </div>
            </li>
        </ol>
    </div>

    <!-- Main Content: Table -->
    <div class="my-10">
        <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
            <div class="overflow-x-auto">
                <?php echo $table_html; ?>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
<?php include "includes/foot.php"; ?>

</body>
</html>