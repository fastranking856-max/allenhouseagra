<?php
include "includes/apis.php";

// Get the raw page data from the global cache (set in apis.php)
$raw_page = $GLOBALS['api_cache']['school_brochure_data'] ?? [];
$sections = $raw_page['data']['sections'] ?? [];

$banner_html = '';
$table_html = '';

foreach ($sections as $section) {
    $title = trim($section['title'] ?? '');
    if (stripos($title, 'hero') !== false || stripos($title, 'banner') !== false) {
        $banner_html = $section['content_heading'] ?? '';
    }
    if (stripos($title, 'table') !== false) {
        $table_html = $section['content'] ?? '';
    }
}

// Fallback banner if missing
if (empty($banner_html)) {
    $banner_html = '
    <div>
        <h2 class="text-[32px] sm:hidden block font-[700] text-white text-left mb-5 sm:mb-8 hr-line relative leading-9 pl-4">
            School Brochure
        </h2>
    </div>
    <div class="md:w-[100%]">
        <h2 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
            School Brochure
        </h2>
    </div>';
}

// Fallback message if table still empty
if (empty($table_html)) {
    $table_html = '<p class="text-center text-gray-500 py-8">Brochure documents will be available soon.</p>';
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AllenHouse Agra | School Brochure</title>
    <link rel="canonical" href="https://allenhouseagra.com/school-brochure" />
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
                    <a href="school-brochure" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">School Brochure</a>
                </div>
            </li>
        </ol>
    </div>

    <!-- Table output -->
    <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
        <div class="sm:mt-10 relative">
            <div class="md:w-[100%]">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-10">
                    <?php echo $table_html; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
<?php include "includes/foot.php"; ?>

</body>
</html>