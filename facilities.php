<?php
include_once "includes/apis.php";

$sections = $facilities_page['data']['sections'] ?? [];

function getSectionByOrder($sections, $order) {
    foreach ($sections as $sec) {
        if (($sec['order'] ?? 0) == $order) return $sec;
    }
    return null;
}

// -------------------- 1. Hero Carousel (order 2) --------------------
$carouselSec = getSectionByOrder($sections, 2);
$topDescription = $carouselSec['content_heading'] ?? '';
$carouselImages = [];
if ($carouselSec && isset($carouselSec['resolved_content']['items'])) {
    foreach ($carouselSec['resolved_content']['items'] as $item) {
        if (!empty($item['image_url'])) $carouselImages[] = $item['image_url'];
    }
}

// -------------------- 2. Personalised Learning Centre --------------------
$plcHeadingSec = getSectionByOrder($sections, 3);      // heading + intro content
$plcContentSec = getSectionByOrder($sections, 4);      // image + right column text

// Heading (from section 3)
$plcHeading = $plcHeadingSec['content_heading'] ?? '<h2>Personalised Learning Centre</h2>';

// Introductory text below heading (from section 3's 'content' field)
$plcIntroText = $plcHeadingSec['content'] ?? '';

// Image (from section 4, image column)
$plcImage = '';
// Right column text (from section 4, text column) – this goes inside the blue area
$plcRightColumnText = '';

if ($plcContentSec && isset($plcContentSec['columns'])) {
    foreach ($plcContentSec['columns'] as $col) {
        if (($col['content_type'] ?? '') === 'image') {
            $plcImage = $col['image_url'] ?? '';
        }
        if (($col['content_type'] ?? '') === 'text') {
            $plcRightColumnText = $col['content'] ?? '';
        }
    }
}

// Fallbacks (in case content is missing)
if (empty($plcIntroText)) $plcIntroText = '<p class="text-gray-600">Personalised Learning Centre introductory text coming soon.</p>';
if (empty($plcRightColumnText)) $plcRightColumnText = '<p class="text-white">Additional information will appear here.</p>';

// -------------------- 3. Facility Cards (orders 6,7,8) --------------------
function extractCardsFromCardSection($section) {
    $cards = [];
    if (!$section || !isset($section['resolved_content']['media'])) return $cards;
    foreach ($section['resolved_content']['media'] as $media) {
        $headingHtml = $media['heading'] ?? '';
        preg_match('/<strong>(.*?)<\/strong>/', $headingHtml, $matches);
        $title = trim($matches[1] ?? strip_tags($headingHtml));
        $cards[] = [
            'title'       => $title,
            'description' => $media['content'] ?? '',
            'image'       => $media['media_url'] ?? ''
        ];
    }
    return $cards;
}

$cardSet1 = extractCardsFromCardSection(getSectionByOrder($sections, 6));
$cardSet2 = extractCardsFromCardSection(getSectionByOrder($sections, 7));
$cardSet3 = extractCardsFromCardSection(getSectionByOrder($sections, 8));

// Build legacy arrays for existing HTML
$top_data = [
    'data' => [[
        'detail'      => strip_tags($topDescription),
        'description' => $topDescription,
        'medias'      => array_map(fn($url) => ['urls' => $url], $carouselImages)
    ]]
];

$plc_data = [
    'data' => [[
        'details'     => $plcHeading,
        'media'       => ['urls' => $plcImage],
        'description' => $plcRightColumnText  // For the blue right column
    ]]
];

// Also pass intro text separately to use below heading
$plcIntroForTemplate = $plcIntroText;

$wcf_data = ['data' => []];
foreach ($cardSet1 as $c) {
    $wcf_data['data'][] = [
        'titles'      => $c['title'],
        'description' => strip_tags($c['description']),
        'media'       => ['urls' => $c['image']]
    ];
}

$wcf_two_data = ['data' => []];
foreach ($cardSet2 as $c) {
    $wcf_two_data['data'][] = [
        'titles'      => $c['title'],
        'description' => strip_tags($c['description']),
        'media'       => ['urls' => $c['image']]
    ];
}

$three_data = ['data' => []];
foreach ($cardSet3 as $c) {
    $three_data['data'][] = [
        'titles'      => $c['title'],
        'description' => strip_tags($c['description']),
        'media'       => ['urls' => $c['image']]
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php"; ?>
    <link rel="canonical" href="https://allenhouseagra.com/facilities" />
    <title>State-of-the-Art Facilities | Allenhouse Public School, Agra</title>
    <meta name="description" content="At Allenhouse School Agra, state-of-the-art facilities create an inspiring environment where students thrive every day.">
</head>
<body>
    <?php include "includes/header.php"; ?>

    <div class="main relative mx-0">
        <!-- Banner and Breadcrumb (same as before) -->
        <div class="bg-center flex items-center text-left h-[300px] comman-banner">
            <div><h2 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">Facilities</h2></div>
            <div><h2 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">Facilities</h2></div>
        </div>
          <div class="flex m-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse" style="list-style: none;">
                    <li class="inline-flex items-center">
                        <a href="/" class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main">
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="facilities" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">
                                Facilities
                            </a>
                        </div>
                    </li>
                </ol>
            </div>

        <!-- Top description -->
        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] mx-auto px-3 sm:px-5">
            <p class="mt-5 text-gray-600 text-[16px]"><?= strip_tags($topDescription, '<p><br><strong>') ?: 'No details available.' ?></p>
        </div>

        <!-- Carousel -->
        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] mx-auto px-3 sm:px-5 mt-3 mb-10">
            <div class="glide-01 relative">
                <div data-glide-el="track" class="overflow-hidden">
                    <ul class="whitespace-no-wrap flex flex-no-wrap">
                        <?php foreach ($carouselImages as $img): ?>
                            <li><img src="<?= htmlspecialchars($img) ?>" class="w-full" alt="Facility"></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="absolute left-0 flex justify-between w-full px-4 top-1/2">
                    <button data-glide-dir="<" class="bg-white/20 rounded-full w-8 h-8">‹</button>
                    <button data-glide-dir=">" class="bg-white/20 rounded-full w-8 h-8">›</button>
                </div>
            </div>
            <div class="mt-4 ql-snow"><div class="ql-editor"><?= $topDescription ?></div></div>
        </div>

        <!-- Personalised Learning Centre -->
        <div class="mt-8 relative">
            <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
                <div class="text-center mx-3">
                    <?= $plcHeading ?>
                    <!-- Intro text from section 3's 'content' field (below heading) -->
                    <div class="ql-snow">
                        <div class="ql-editor">
                            <?= $plcIntroForTemplate ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 ab-cr-bg sm:py-10">
                <div class="relative sm:flex 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
                    <div class="mx-3 sm:w-[50%]">
                        <img src="<?= htmlspecialchars($plcImage) ?>" alt="Personalised Learning Centre">
                    </div>
                    <div class="bg-blue-main sm:mt-0 mt-[-100px] sm:w-[50%]">
                        <style>.whitee p { color: #fff !important; }</style>
                        <div class="2xl:pt-[120px] lg:pt-0 md:pt-1 pt-[120px] mx-3 pb-5 whitee">
                            <!-- Right column text from section 4's text column -->
                            <?= $plcRightColumnText ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Facilities heading and cards (same as before) -->
        <div class="mt-8 text-center">
            <h2 class="text-[28px] font-bold uppercase text-blue-main">Facilities</h2>
            <p class="text-gray-600">Allenhouse Schools boast state-of-the-art facilities designed to support a comprehensive and engaging educational experience. Our campus includes:</p>
        </div>

        <!-- First card set (order 6) -->
        <div class="container mx-auto px-3 sm:px-5 mt-5">
            <div class="grid sm:grid-cols-4 gap-3">
                <?php foreach ($wcf_data['data'] as $card): ?>
                    <div>
                        <img src="<?= htmlspecialchars($card['media']['urls'] ?? '') ?>" class="w-full">
                        <p class="facility-text text-gray-600 mt-2"><strong><?= htmlspecialchars($card['titles'] ?? '') ?>:</strong> <?= htmlspecialchars($card['description'] ?? '') ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Second card set (order 7) – blue background -->
        <div class="mt-5 bg-blue-main sm:py-12">
            <div class="container mx-auto px-3 sm:px-5 grid sm:grid-cols-4 gap-3">
                <?php foreach ($wcf_two_data['data'] as $card): ?>
                    <div>
                        <img src="<?= htmlspecialchars($card['media']['urls'] ?? '') ?>" class="w-full">
                        <p class="facility-text text-white mt-2"><?= htmlspecialchars($card['description'] ?? '') ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Third card set (order 8) -->
        <div class="container mx-auto px-3 sm:px-5 mt-5 mb-8">
            <div class="grid sm:grid-cols-4 gap-3">
                <?php foreach ($three_data['data'] as $card): ?>
                    <div>
                        <img src="<?= htmlspecialchars($card['media']['urls'] ?? '') ?>" class="w-full">
                        <div class="facility-text text-gray-600 mt-2"><?= htmlspecialchars($card['description'] ?? '') ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php"; ?>
    <?php include "includes/foot.php"; ?>

    <script>
        new Glide('.glide-01', { type: 'carousel', perView: 3, autoplay: 3500, breakpoints: { 1024: { perView: 2 }, 640: { perView: 1 } } }).mount();

        document.querySelectorAll(".facility-text").forEach(p => {
            let fullText = p.innerText.trim(), words = fullText.split(/\s+/);
            if (words.length > 12) {
                let short = words.slice(0,12).join(" ")+"...", expanded=false;
                let btn = document.createElement("span");
                btn.className = "text-blue-600 cursor-pointer block mt-1";
                btn.textContent = "Read More...";
                btn.onclick = () => {
                    expanded = !expanded;
                    p.innerText = expanded ? fullText : short;
                    btn.textContent = expanded ? "Read Less" : "Read More...";
                    p.appendChild(btn);
                };
                p.innerText = short;
                p.appendChild(btn);
            }
        });
    </script>
</body>
</html>