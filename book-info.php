<?php
include "includes/apis.php";

// Get raw page data from global cache (set in apis.php)
$raw_page = $GLOBALS['api_cache']['book_list_info_data'] ?? [];
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
        break;
    }
}

// Fallback banner if missing
if (empty($banner_html)) {
    $banner_html = '
    <div>
        <h2 class="text-[32px] sm:hidden block font-[700] text-white text-left mb-5 sm:mb-8 hr-line relative leading-9 pl-4">
            Book List Info
        </h2>
    </div>
    <div class="md:w-[100%]">
        <h2 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
            Book List Info
        </h2>
    </div>';
}

// If still no table, show fallback message
if (empty($table_html)) {
    $table_html = '<p class="text-center text-gray-500 py-8">Book list information will be available soon.</p>';
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AllenHouse Agra | Book List Info</title>
    <link rel="canonical" href="https://allenhouseagra.com/book-info" />
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
                    <a href="book-info" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Book List Info</a>
                </div>
            </li>
        </ol>
    </div>

    <!-- Main Content: Table from CMS -->
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