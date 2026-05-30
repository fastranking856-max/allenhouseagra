<?php
include "includes/apis.php";

// Get raw CMS data for Robotics Academy
$raw_page = $GLOBALS['api_cache']['robotics_academics_data'] ?? [];
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
    <div><h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">Robotics Academy</h1></div>
    <div class="md:w-[100%]"><h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">Robotics Academy</h1></div>';
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://allenhouseagra.com/robotics" />
    <title>Robotics at Allenhouse Agra | Best Robotics Program in Agra</title>
    <meta name="description" content="Join the leading robotics program at Allenhouse Agra - where students gain future-ready skills through exploration.">
    <?php include "includes/head.php"; ?>
    <style>
        /* Ensure flex container works */
        .flex-container {
            display: flex;
            gap: 2rem;
            align-items: flex-start;
            flex-wrap: wrap;
        }
        .flex-image {
            flex: 0 0 40%;
            max-width: 40%;
        }
        .flex-text {
            flex: 0 0 55%;
            max-width: 55%;
        }
        @media (max-width: 768px) {
            .flex-image, .flex-text {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

<?php include "includes/header.php"; ?>

<div class="main relative mb-[120px]">
    <div class="main relative mb-[40px] sm:mb-[120px]">
        <!-- Hero Banner -->
        <div class="bg-center flex items-center text-center h-[300px] common-banner">
            <div class="w-full px-4">
                <?php echo $banner_html; ?>
            </div>
        </div>

        <!-- Breadcrumb -->
        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse whitespace-nowrap">
                <li class="inline-flex items-center"><a href="/" class="inline-flex items-center text-xs font-medium sm:text-sm text-blue-main">Home</a></li>
                <li><div class="flex items-center"><svg class="w-3 h-3 mx-1 rtl:rotate-180 text-blue-main" ...><path d="m1 9 4-4-4-4"/></svg><p class="text-xs font-medium ms-1 sm:text-sm text-blue-main">Beyond Academics</p></div></li>
                <li><div class="flex items-center"><svg class="w-3 h-3 mx-1 rtl:rotate-180 text-blue-main" ...><path d="m1 9 4-4-4-4"/></svg><a href="robotics" class="text-xs font-medium ms-1 sm:text-sm text-blue-main">Robotics Academy</a></div></li>
            </ol>
        </div>

        <!-- Main Content -->
        <div class="main relative mb-[120px] mx-0 sm:mx-2">
            <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
                <?php if (empty($sections)): ?>
                    <p class="font-[700] text-center text-red-600">Robotics Academy content will be added soon.</p>
                <?php else: ?>
                    <?php foreach ($content_blocks as $block): ?>
                        <div class="relative mt-10">
                            <?php
                            // Two‑column layout (image + text) – check columns first
                            if (!empty($block['columns']) && is_array($block['columns']) && count($block['columns']) >= 2) {
                                $col1 = $block['columns'][0];
                                $col2 = $block['columns'][1];

                                // Determine which column is image and which is text
                                $image_col = null;
                                $text_col = null;
                                if (isset($col1['content_type']) && $col1['content_type'] === 'image') {
                                    $image_col = $col1;
                                    $text_col = $col2;
                                } elseif (isset($col2['content_type']) && $col2['content_type'] === 'image') {
                                    $image_col = $col2;
                                    $text_col = $col1;
                                }

                                if ($image_col && $text_col) {
                                    $img_url = $image_col['image_url'] ?? '';
                                    // Clean malformed URL
                                    $img_url = str_replace('https://apscmsnew.fastranking.cloud/https://', 'https://', $img_url);
                                    ?>
                                    <div class="flex-container">
                                        <div class="flex-image">
                                            <img src="<?= htmlspecialchars($img_url) ?>" alt="Robotics Academy" class="w-full rounded-lg shadow-lg object-cover">
                                        </div>
                                        <div class="flex-text">
                                            <div class="ql-snow">
                                                <div class="ql-editor">
                                                    <?= $text_col['content'] ?? '' ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    // Fallback if columns are not image/text – display both as text
                                    echo '<div class="ql-snow"><div class="ql-editor">';
                                    echo ($col1['content'] ?? '') . ($col2['content'] ?? '');
                                    echo '</div></div>';
                                }
                            }
                            // If no columns, but has content_heading and content
                            elseif (!empty($block['content_heading']) || !empty($block['content'])) {
                                if (!empty($block['content_heading'])) {
                                    echo '<h2 class="text-2xl font-bold text-blue-main mb-4">' . $block['content_heading'] . '</h2>';
                                }
                                if (!empty($block['content'])) {
                                    echo '<div class="ql-snow"><div class="ql-editor">' . $block['content'] . '</div></div>';
                                }
                            }
                            ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
<?php include "includes/foot.php"; ?>
</body>
</html>