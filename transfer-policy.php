<?php
include "includes/apis.php";

// Get raw page data from global cache
$raw_page = $GLOBALS['api_cache']['transferpolicy_data'] ?? [];
$sections = $raw_page['data']['sections'] ?? [];

$banner_html = '';
$policy_content = '';

foreach ($sections as $section) {
    $title = trim($section['title'] ?? '');
    if (stripos($title, 'hero') !== false || stripos($title, 'banner') !== false) {
        $banner_html = $section['content_heading'] ?? '';
    }
    // Look for a section that contains the policy text (could be 'Content', 'Policy', etc.)
    if (stripos($title, 'content') !== false || stripos($title, 'policy') !== false) {
        $policy_content = $section['content'] ?? '';
        break;
    }
}

// Fallback: if no dedicated content section, try the page's main content
if (empty($policy_content) && !empty($raw_page['data']['content'])) {
    $policy_content = $raw_page['data']['content'];
}

// Fallback banner if missing
if (empty($banner_html)) {
    $banner_html = '
    <div>
        <h2 class="text-[32px] sm:hidden block font-[700] text-white text-left mb-5 sm:mb-8 hr-line relative leading-9 pl-4">
            Transfer Policy
        </h2>
    </div>
    <div class="md:w-[100%]">
        <h2 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
            Transfer Policy
        </h2>
    </div>';
}

// If still no content, show fallback message
if (empty($policy_content)) {
    $policy_content = '<p class="text-gray-600">Transfer policy information will be available soon.</p>';
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AllenHouse Agra | Transfer Policy</title>
    <link rel="canonical" href="https://allenhouseagra.com/transfer-policy" />
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
                    <a href="transfer-policy" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Transfer Policy</a>
                </div>
            </li>
        </ol>
    </div>

    <!-- Policy Content -->
    <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
        <div class="sm:mt-10 relative">
            <div class="md:w-[100%]">
                <div class="mt-5">
                    <div class="sm:text-[16px] text-[16px] text-gray-600 font-[400]">
                        <?php echo $policy_content; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
<?php include "includes/foot.php"; ?>

</body>
</html>