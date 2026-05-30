<?php
include "includes/apis.php";

// Get raw CMS data (after endpoint fix and cache cleared)
$raw_page = $GLOBALS['api_cache']['animation_master_class_data'] ?? [];
$sections = $raw_page['data']['sections'] ?? [];

// Extract hero banner and content sections
$hero_banner = null;
$content_blocks = [];
foreach ($sections as $section) {
    $title = trim($section['title'] ?? '');
    if (stripos($title, 'hero') !== false || stripos($title, 'banner') !== false) {
        $hero_banner = $section;
    } else {
        $content_blocks[] = $section;
    }
}

// Banner HTML (fallback if hero missing)
$banner_html = '';
if ($hero_banner && !empty($hero_banner['content_heading'])) {
    $banner_html = $hero_banner['content_heading'];
} else {
    $banner_html = '
    <div><h1 class="text-[32px] sm:text-[48px] font-[700] text-white text-left sm:pl-[7rem] pl-4 mb-5 sm:mb-8 hr-line relative leading-tight">Animation Master Class</h1></div>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://allenhouseagra.com/animation-master-class" />
    <title>Best School for Animation & Creative Learning | APS Agra</title>
    <meta name="description" content="APS Agra, the Best School for Animation, empowers students to imagine, design, and innovate through creative learning.">
    <?php include "includes/head.php"; ?>
</head>
<body>

<?php include "includes/header.php"; ?>

<div class="main relative mb-[40px] sm:mb-[120px]">
    <!-- Banner -->
    <div class="bg-center flex items-center text-center h-[300px] common-banner">
        <div class="w-full px-4">
            <?php echo $banner_html; ?>
        </div>
    </div>

    <!-- Breadcrumb -->
    <div class="flex mx-5 my-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse overflow-x-auto whitespace-nowrap">
            <li class="inline-flex items-center"><a href="/" class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main hover:underline">Home</a></li>
            <li><div class="flex items-center"><svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" ...><path d="m1 9 4-4-4-4"/></svg><a href="#" class="ms-1 sm:text-sm text-xs font-medium text-blue-main hover:underline">Beyond Academics</a></div></li>
            <li aria-current="page"><div class="flex items-center"><svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" ...><path d="m1 9 4-4-4-4"/></svg><span class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Animation Master Class</span></div></li>
        </ol>
    </div>

    <!-- Main Content -->
    <div class="mx-3 sm:mx-auto sm:px-5 max-w-[1280px] 2xl:max-w-[1400px]">
        <div class="mt-8 sm:mt-12">
            <?php if (empty($sections)): ?>
                <p class="text-red-600 text-center font-bold">Animation Master Class content will be added soon.</p>
            <?php else: ?>
                <?php foreach ($content_blocks as $block): ?>
                    <div class="sm:flex gap-9 items-start mb-12">
                        <?php
                        // Two-column layout (image + text)
                        if (!empty($block['columns']) && is_array($block['columns']) && count($block['columns']) >= 2) {
                            $col1 = $block['columns'][0];
                            $col2 = $block['columns'][1];

                            // Image column (usually first)
                            if (isset($col1['content_type']) && $col1['content_type'] === 'image') {
                                $img_url = $col1['image_url'] ?? '';
                                // Clean malformed URL (remove duplicate base)
                                $img_url = str_replace('https://apscmsnew.fastranking.cloud/https://', 'https://', $img_url);
                                ?>
                                <div class="sm:w-[40%] mb-6 sm:mb-0">
                                    <img src="<?= htmlspecialchars($img_url) ?>" 
                                         alt="Animation Master Class" 
                                         class="w-full rounded-lg shadow-lg object-cover">
                                </div>
                                <?php
                            }
                            // Text column (usually second)
                            if (isset($col2['content_type']) && $col2['content_type'] === 'text') {
                                ?>
                                <div class="sm:w-[60%] ql-snow">
                                    <div class="ql-editor prose prose-blue max-w-none">
                                        <?= $col2['content'] ?? '<p class="text-red-600">No description available.</p>' ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        // Fallback: single content block without columns
                        elseif (!empty($block['content'])) {
                            ?>
                            <div class="w-full ql-snow">
                                <div class="ql-editor">
                                    <?= $block['content'] ?>
                                </div>
                            </div>
                            <?php
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