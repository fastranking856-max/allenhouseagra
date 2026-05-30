<?php
include "includes/apis.php";

// Get raw CMS data for Oluxi Smart Skills
$raw_page = $GLOBALS['api_cache']['oluxi_smart_skills_data'] ?? [];
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
    <div><h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">Oluxi Smart Skills</h1></div>
    <div class="md:w-[100%]"><h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">Oluxi Smart Skills</h1></div>';
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php"; ?>
    <link rel="canonical" href="https://allenhouseagra.com/oluxi-smart-class" />
    <title>Student Empowerment Program | Oluxi at APS Agra</title>
    <meta name="description" content="Oluxi Smart Skills program at Allenhouse Public School Agra boosts student empowerment through real-world life skills.">
</head>
<body>

<?php include "includes/header.php"; ?>

<div class="main relative">
    <div class="main relative mb-[40px] sm:mb-[120px]">
        <!-- Hero Banner -->
        <div class="bg-center flex items-center text-center h-[300px] common-banner">
            <div class="w-full px-4">
                <?php echo $banner_html; ?>
            </div>
        </div>

        <!-- Breadcrumb -->
        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse overflow-x-auto whitespace-nowrap">
                <li class="inline-flex items-center"><a href="/" class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main">Home</a></li>
                <li><div class="flex items-center"><svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" ...><path d="m1 9 4-4-4-4"/></svg><p class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Beyond Academics</p></div></li>
                <li><div class="flex items-center"><svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" ...><path d="m1 9 4-4-4-4"/></svg><a href="oluxi-smart-class" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Oluxi Smart Skills</a></div></li>
            </ol>
        </div>

        <!-- Main Content -->
        <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
            <?php if (empty($sections)): ?>
                <p class="font-[700] text-center text-red-600">Oluxi Smart Skills content will be added soon.</p>
            <?php else: ?>
                <?php foreach ($content_blocks as $block): ?>
                    <div class="mt-10 relative">
                        <?php
                        // Two‑column layout (image + text)
                        if (!empty($block['columns']) && is_array($block['columns']) && count($block['columns']) >= 2) {
                            $col1 = $block['columns'][0];
                            $col2 = $block['columns'][1];

                            // Image column (usually first)
                            if (isset($col1['content_type']) && $col1['content_type'] === 'image') {
                                $img_url = $col1['image_url'] ?? '';
                                // Clean malformed URL
                                $img_url = str_replace('https://apscmsnew.fastranking.cloud/https://', 'https://', $img_url);
                                ?>
                                <div class="md:w-[40%] mb-6 md:mb-0">
                                    <img src="<?= htmlspecialchars($img_url) ?>" alt="Oluxi Smart Skills" class="w-[100%] rounded-lg shadow-lg">
                                </div>
                                <?php
                            }
                            // Text column
                            if (isset($col2['content_type']) && $col2['content_type'] === 'text') {
                                ?>
                                <div class="md:w-[60%] mt-5 md:mt-0">
                                    <div class="ql-snow">
                                        <div class="ql-editor">
                                            <?= $col2['content'] ?? '' ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        // Fallback: plain content block
                        elseif (!empty($block['content'])) {
                            echo '<div class="ql-snow"><div class="ql-editor">' . $block['content'] . '</div></div>';
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