<?php
include_once "includes/apis.php";



$rawSections = $pedagogy_page['data']['sections'] ?? [];

// ── Index 0: Hero ─────────────────────────────────────────────────────────────
$heroHeading = $rawSections[0]['content_heading'] ?? '';

// ── Index 1: Pre-Primary ──────────────────────────────────────────────────────
// content_heading has embedded stale carousel — DO NOT echo it fully
// Extract only the text div (before the carousel div) using regex
$prePrimaryFullHtml = $rawSections[1]['content_heading'] ?? '';
$prePrimaryTextHtml = '';
// The text block is a <div class="relative text-left..."> before the carousel div
if (preg_match('/<div[^>]*class="[^"]*relative text-left[^"]*"[^>]*>(.*?)<\/div>\s*<div[^>]*class="[^"]*mt-10/s', $prePrimaryFullHtml, $m)) {
    $prePrimaryTextHtml = '<div class="relative text-left sm:text-center sm:mx-3 z-9">' . $m[1] . '</div>';
}
// Fallback: show content field
if (empty($prePrimaryTextHtml)) {
    $prePrimaryTextHtml = $rawSections[1]['content'] ?? '';
}
// Fresh carousel items
$prePrimaryItems = $rawSections[1]['resolved_content']['items'] ?? [];

// ── Index 2: Highlights ───────────────────────────────────────────────────────
// Same issue — content_heading has embedded stale carousel
// Extract only the heading+text div (before carousel)
$highlightsFullHtml = $rawSections[2]['content_heading'] ?? '';
$highlightsTextHtml = '';
// Extract the <div class="text-center"> wrapper content (h2 + description text)
// Stop before the glide carousel div
if (preg_match('/(<div[^>]*class="[^"]*text-center[^"]*"[^>]*>.*?<\/div>)\s*<div[^>]*class="[^"]*glide/s', $highlightsFullHtml, $m)) {
    $highlightsTextHtml = $m[1];
}
if (empty($highlightsTextHtml)) {
    // Fallback: just grab the h2
    if (preg_match('/(<h2[^>]*>.*?<\/h2>)/s', $highlightsFullHtml, $m)) {
        $highlightsTextHtml = $m[1];
    }
}
// Fresh carousel items — use $phc_data which already processed resolved_content.items
$highlightsMedias = $phc_data['data'][0]['medias'] ?? [];



// Extract data from order 4 (heading + intro text) and order 5 (columns)
$teachingHeading = $rawSections[3]['content_heading'] ?? '';      // from order 4
$teachingIntro   = $rawSections[3]['content'] ?? '';              // 👈 this is the missing content
$teachingCols    = $rawSections[4]['columns'] ?? [];              // order 5
$tImgCol = null;
$tTextCol = null;
foreach ($teachingCols as $col) {
    if (($col['content_type'] ?? '') === 'image') $tImgCol = $col;
    if (($col['content_type'] ?? '') === 'text')  $tTextCol = $col;
}
$teachingBlueText = $tTextCol['content'] ?? '';

// online library

$onlineHeading = $rawSections[5]['content_heading'] ?? '';
$onlineIntro   = $rawSections[5]['content'] ?? '';  // from order 6
$onlineCols    = $rawSections[6]['columns'] ?? [];
$oImgCol = null;
$oTextCol = null;
foreach ($onlineCols as $col) {
    if (($col['content_type'] ?? '') === 'image') $oImgCol = $col;
    if (($col['content_type'] ?? '') === 'text')  $oTextCol = $col;
}
$onlineBlueText = $oTextCol['content'] ?? '';


// ── Index 7: Brilliance ───────────────────────────────────────────────────────
$brillianceHeading = $rawSections[7]['content_heading'] ?? '';
$brillianceMedias  = $pbc_data['data'][0]['medias'] ?? [];

// ── Index 8: Achiever ─────────────────────────────────────────────────────────
$achieverHeading = $rawSections[8]['content_heading'] ?? '';
$achieverMedias  = $pac_data['data'][0]['medias'] ?? [];

// ── Banner ────────────────────────────────────────────────────────────────────
$banner_html = !empty($heroHeading) ? $heroHeading : '
    <div><h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 hr-line relative leading-9">Pedagogy</h1></div>
    <div class="md:w-[100%]"><h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">Pedagogy</h1></div>';

// ── Carousel renderer — clean fresh HTML, no stale Glide state ───────────────
function renderCarousel(array $items, string $glideClass, string $imageClass = 'w-full h-auto'): string {
    if (empty($items)) return '';
    ob_start();
    ?>
    <div class="glide relative w-full bg-white rounded <?php echo htmlspecialchars($glideClass); ?> opne-hide-circle">
        <div class="glide__track overflow-hidden" data-glide-el="track">
            <ul class="glide__slides">
                <?php foreach ($items as $item):
                    $src = $item['urls'] ?? $item['image_url'] ?? '';
                    if (empty($src)) continue;
                    $alt = $item['image_alt'] ?? $item['title'] ?? '';
                ?>
                <li class="glide__slide">
                    <img src="<?php echo htmlspecialchars($src); ?>"
                         alt="<?php echo htmlspecialchars($alt); ?>"
                         class="<?php echo $imageClass; ?>"
                         loading="lazy">
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="absolute left-0 items-center justify-between w-full h-0 px-4 xl:flex top-1/2 transform -translate-y-1/2 hide-circle" data-glide-el="controls">
            <button class="inline-flex items-center justify-center w-8 h-8 transition duration-300 border rounded-full hover:bg-red-500 hover:text-white lg:w-10 lg:h-10 text-slate-700 border-slate-700 focus-visible:outline-none bg-white/20" data-glide-dir="<">
                <i class="fa-solid fa-angle-left"></i>
            </button>
            <button class="inline-flex items-center justify-center w-8 h-8 transition duration-300 border rounded-full hover:bg-red-500 hover:text-white lg:w-10 lg:h-10 text-slate-700 border-slate-700 focus-visible:outline-none bg-white/20" data-glide-dir=">">
                <i class="fa-solid fa-angle-right"></i>
            </button>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

// Build pre-primary medias array from resolved_content items
$prePrimaryMedias = [];
foreach ($prePrimaryItems as $item) {
    $url = $item['image_url'] ?? '';
    if ($url === '') continue;
    $prePrimaryMedias[] = ['urls' => $url, 'title' => $item['title'] ?? '', 'image_alt' => $item['image_alt'] ?? ''];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php"; ?>
    <link rel="canonical" href="https://allenhouseagra.com/pedagogy" />
    <title>Holistic Education Approach | Allenhouse School, Agra</title>
    <meta name="description" content="At Allenhouse Agra, we teach children, not just subjects. Our holistic education approach shapes leaders and good humans.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.core.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.theme.min.css">
</head>
<body>

<?php include "includes/header.php"; ?>

<div class="main relative mb-[40px]">

    <!-- Hero Banner -->
    <div class="bg-center flex items-center text-center h-[300px] comman-banner">
        <?php echo $banner_html; ?>
    </div>

    <!-- Breadcrumb -->
    <div class="flex m-5" aria-label="Breadcrumb">
        <ol class="flex items-center" style="list-style: none;">
            <li><a href="/" class="text-xs font-medium sm:text-sm text-blue-main">Home</a></li>
            <li class="flex items-center">
                <svg class="w-3 h-3 mx-1 text-blue-main" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                <p class="text-xs font-medium ms-1 sm:text-sm text-blue-main">Academics</p>
            </li>
            <li class="flex items-center">
                <svg class="w-3 h-3 mx-1 text-blue-main" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                <a href="pedagogy" class="text-xs font-medium ms-1 sm:text-sm text-blue-main">Pedagogy</a>
            </li>
        </ol>
    </div>

    <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3 mx-3 mt-3 mb-10">

        <!-- ══ Pre-Primary, Primary School ══════════════════════════════════ -->
        <div class="relative mt-5">
            <?php if (!empty($prePrimaryTextHtml)): ?>
                <?php echo $prePrimaryTextHtml; ?>
            <?php endif; ?>

            <?php if (!empty($prePrimaryMedias)): ?>
                <div class="mt-10 bg-center">
                    <?php echo renderCarousel($prePrimaryMedias, 'glide-01', 'w-[100%]'); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($rawSections[1]['content'])): ?>
                <div class="mt-4">
                    <?php echo $rawSections[1]['content']; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- ══ Highlights of the Curriculum ═════════════════════════════════ -->
        <div class="relative mt-8 bg-center">
            <?php if (!empty($highlightsTextHtml)): ?>
                <div class="text-center">
                    <?php echo $highlightsTextHtml; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($highlightsMedias)): ?>
                <?php echo renderCarousel($highlightsMedias, 'glide-02', 'mx-auto mb-2 w-full'); ?>
            <?php endif; ?>
        </div>
            </div>

        <!-- ══ Teaching and Learning ═════════════════════════════════════════ -->
       <div class="mt-8 sm:mt-10">
    <?php if (!empty($teachingHeading)): ?>
        <div class="text-center mx-3">
            <?php echo $teachingHeading; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($teachingIntro)): ?>
        <div class="mx-3 mt-4 text-center text-gray-700 ql-snow 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto">
            <div class="ql-editor" style="padding:0;"><?php echo $teachingIntro; ?></div>
        </div>
    <?php endif; ?>

    <?php if ($tImgCol): ?>
    <div class="relative mt-5 ab-cr-bg sm:py-10">
        <div class="relative 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3 md:flex gap-4">
            <div class="mx-3 md:w-[50%]">
                <img src="<?php echo htmlspecialchars($tImgCol['image_url'] ?? ''); ?>"
                     alt="Teaching and Learning"
                     class="w-full" loading="lazy">
            </div>
            <?php if (!empty($teachingBlueText)): ?>
            <div class="bg-blue-main sm:mt-0 mt-[-100px] md:w-[50%]">
                <div class="2xl:pt-[120px] lg:pt-1 md:pt-1 pt-[120px] mx-3 pb-5">
                    <div class="text-white text-[16px] ql-snow">
                        <div class="ql-editor" style="padding:0;"><?php echo $teachingBlueText; ?></div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
</div>

        <!-- ══ Online Library ════════════════════════════════════════════════ -->
        <div class="relative mt-8 sm:mt-10">
    <?php if (!empty($onlineHeading)): ?>
        <div class="text-center mx-3">
            <?php echo $onlineHeading; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($onlineIntro)): ?>
        <div class="mx-3 mt-4 text-center text-gray-700 ql-snow 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto">
            <div class="ql-editor" style="padding:0;"><?php echo $onlineIntro; ?></div>
        </div>
    <?php endif; ?>

    <?php if ($oImgCol): ?>
    <div class="mt-5 ab-cr-bg sm:py-10">
        <div class="relative 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3 sm:flex gap-5 sm:flex-row-reverse">
            <div class="mx-3 sm:w-[50%]">
                <img src="<?php echo htmlspecialchars($oImgCol['image_url'] ?? ''); ?>"
                     alt="Online Library"
                     class="w-full" loading="lazy">
            </div>
            <?php if (!empty($onlineBlueText)): ?>
            <div class="bg-blue-main sm:mt-0 mt-[-100px] sm:w-[50%]">
                <div class="2xl:pt-[120px] lg:pt-1 md:pt-1 pt-[120px] mx-3 pb-5">
                    <div class="text-white text-[16px] ql-snow">
                        <div class="ql-editor" style="padding:0;"><?php echo $onlineBlueText; ?></div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
</div>



<div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3 mx-3 mt-3 mb-10">

        <!-- ══ Brilliance Curriculum Model ══════════════════════════════════ -->
        <div class="relative mx-3 mt-8 sm:mt-10 sm:mx-0">
            <?php if (!empty($brillianceHeading)): ?>
                <div class="text-center">
                    <?php echo $brillianceHeading; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($brillianceMedias)): ?>
                <?php echo renderCarousel($brillianceMedias, 'glide-03', 'w-full'); ?>
            <?php endif; ?>
        </div>

        <!-- ══ Achiever Curriculum Model ═════════════════════════════════════ -->
        <div class="relative mx-3 mt-8 mb-5 sm:mx-0">
            <?php if (!empty($achieverHeading)): ?>
                <div class="text-center">
                    <?php echo $achieverHeading; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($achieverMedias)): ?>
                <?php echo renderCarousel($achieverMedias, 'glide-04', 'w-full'); ?>
            <?php endif; ?>
        </div>
            </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
<?php include "includes/foot.php"; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/glide.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Glide === 'undefined') {
        console.error('Glide.js not loaded');
        return;
    }

    var configs = [
        { sel: '.glide-01', perView: 3,   gap: 2,  bp: { 1024: 2, 640: 1 } },
        { sel: '.glide-02', perView: 3.5, gap: 24, bp: { 1024: 2, 640: 1 } },
        { sel: '.glide-03', perView: 4,   gap: 24, bp: { 1024: 4, 640: 1 } },
        { sel: '.glide-04', perView: 4,   gap: 24, bp: { 1024: 4, 640: 1 } }
    ];

    configs.forEach(function(c) {
        var el = document.querySelector(c.sel);
        if (!el) return;

        var slides = el.querySelectorAll('.glide__slide:not(.glide__slide--clone)');
        if (!slides.length) { console.warn('No slides: ' + c.sel); return; }

        try {
            new Glide(c.sel, {
                type: 'carousel',
                autoplay: 3500,
                perView: c.perView,
                gap: c.gap,
                breakpoints: {
                    1024: { perView: c.bp[1024] },
                    640:  { perView: c.bp[640]  }
                }
            }).mount();
        } catch(e) {
            console.error('Glide error: ' + c.sel, e);
        }
    });
});
</script>

</body>
</html>