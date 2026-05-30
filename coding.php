<?php
include "includes/apis.php";

// Helper function to clean malformed image URLs
function cleanImageUrl($url) {
    if (empty($url)) return '';
    // Remove duplicate base URL
    $url = str_replace('https://apscmsnew.fastranking.cloud/https://', 'https://', $url);
    return htmlspecialchars($url);
}

$raw_page = $GLOBALS['api_cache']['coding_academics_data'] ?? [];
$sections = $raw_page['data']['sections'] ?? [];

// Extract hero banner and other sections
$hero_banner = null;
$content_blocks = [];
foreach ($sections as $section) {
    $title = trim($section['title'] ?? '');
    if (stripos($title, 'hero') !== false) {
        $hero_banner = $section;
    } else {
        $content_blocks[] = $section;
    }
}

$banner_html = '';
if ($hero_banner && !empty($hero_banner['content_heading'])) {
    $banner_html = $hero_banner['content_heading'];
} else {
    $banner_html = '
    <div><h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">Coding Academy</h1></div>
    <div class="md:w-[100%]"><h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">Coding Academy</h1></div>';
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://allenhouseagra.com/coding" />
    <title>Allenhouse Agra Coding Academy | Empowering Young Coders</title>
    <meta name="description" content="Ignite young minds at Allenhouse Agra Coding Academy - where students explore, create, and lead with real coding skills.">
    <?php include "includes/head.php"; ?>
</head>
<body>

<?php include "includes/header.php"; ?>

<div class="main relative mb-[120px]">
    <div class="bg-center flex items-center text-center h-[300px] common-banner">
        <?php echo $banner_html; ?>
    </div>

    <div class="flex m-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center"><a href="/" class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main">Home</a></li>
            <li><div class="flex items-center"><svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" ...><path d="m1 9 4-4-4-4"/></svg><p class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Beyond Academics</p></div></li>
            <li><div class="flex items-center"><svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" ...><path d="m1 9 4-4-4-4"/></svg><a href="coding" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Coding Academy</a></div></li>
        </ol>
    </div>

    <div class="main relative sm:top-[20px] mb-[40px] sm:mb-[120px] mx-0 sm:mx-2">
        <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
            <?php if (empty($sections)): ?>
                <p class="font-[700] text-center text-red-600">Coding Academy content will be added soon.</p>
            <?php else: ?>
                <?php foreach ($content_blocks as $block): ?>
                    <div class="mt-10 relative">
                        <?php
                        // Check for two-column layout (image + text)
                        if (!empty($block['columns']) && is_array($block['columns']) && count($block['columns']) >= 2) {
                            $col1 = $block['columns'][0];
                            $col2 = $block['columns'][1];
                            ?>
                            <div class="md:flex gap-9">
                                <?php if (isset($col1['content_type']) && $col1['content_type'] === 'image'): ?>
                                    <div class="md:w-[40%]">
                                        <img src="<?php echo cleanImageUrl($col1['image_url'] ?? ''); ?>" alt="Coding Academy" class="w-[100%]">
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($col2['content_type']) && $col2['content_type'] === 'text'): ?>
                                    <div class="md:w-[60%] md:mt-0 mt-5">
                                        <div class="ql-snow"><div class="ql-editor"><?php echo $col2['content'] ?? ''; ?></div></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php
                        }
                        // Handle other section types (carousel, plain text) if needed
                        elseif (!empty($block['resolved_content']['items'])) {
                            // Carousel rendering (not used in this page yet)
                            echo '<p>Carousel not implemented in this version</p>';
                        }
                        else {
                            if (!empty($block['content_heading'])) echo '<h2 class="text-[28px] font-[700] text-blue-main mb-4">' . $block['content_heading'] . '</h2>';
                            if (!empty($block['content'])) echo '<div class="ql-snow"><div class="ql-editor">' . $block['content'] . '</div></div>';
                        }
                        ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
<?php include "includes/foot.php"; ?>
</body>
</html>