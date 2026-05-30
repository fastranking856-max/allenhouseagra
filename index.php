<?php
include "includes/apis.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function safe_include($file) {
    if (!file_exists($file)) {
        echo "<b style='color:red'>Missing include:</b> $file<br>";
        return;
    }
    include $file;
}

function getApiAltText($item, $defaultText = 'Image') {
    $possibleFields = ['image_alt_text', 'image_alt', 'media_alt_text', 'alt_text', 'alt', 'title', 'name', 'heading'];
    foreach ($possibleFields as $field) {
        if (isset($item[$field]) && !empty(trim($item[$field]))) {
            return trim($item[$field]);
        }
    }
    if (isset($item['media']) && is_array($item['media'])) {
        foreach ($possibleFields as $field) {
            if (isset($item['media'][$field]) && !empty(trim($item['media'][$field]))) {
                return trim($item['media'][$field]);
            }
        }
    }
    if (isset($item['media']['urls'])) return generateAltFromUrl($item['media']['urls'], $defaultText);
    if (isset($item['urls'])) return generateAltFromUrl($item['urls'], $defaultText);
    if (isset($item['image'])) return generateAltFromUrl($item['image'], $defaultText);
    return $defaultText;
}
function generateAltFromUrl($url, $defaultText = 'Image') {
    if (empty($url)) return $defaultText;
    $filename = basename($url);
    $filename = pathinfo($filename, PATHINFO_FILENAME);
    $alt = preg_replace('/[-_][0-9]+/', ' ', $filename);
    $alt = str_replace(['-', '_'], ' ', $alt);
    $alt = preg_replace('/\s+/', ' ', $alt);
    $alt = ucwords(trim($alt));
    return !empty($alt) && strlen($alt) > 1 ? $alt : $defaultText;
}
?>   
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://allenhouseagra.com" />
    <?php include "includes/meta.php"; ?>
    <?php include "includes/head.php" ; ?>
    <style>
        /* existing styles (unchanged) */
        .excellance-glide .glide__slides { display: flex !important; transition: transform 0.4s ease; }
        .excellance-glide .glide__slide { flex: 0 0 calc(25% - 15px) !important; margin-right: 20px !important; }
        .excellance-glide .glide__slide:last-child { margin-right: 0 !important; }
        @media (max-width: 1280px) { .excellance-glide .glide__slide { flex: 0 0 calc(33.33% - 14px) !important; } }
        @media (max-width: 950px) { .excellance-glide .glide__slide { flex: 0 0 calc(50% - 10px) !important; } }
        @media (max-width: 640px) { .excellance-glide .glide__slide { flex: 0 0 100% !important; margin-right: 0 !important; } }
        .glide-0222 .glide__slide { width: calc(33.333% - 16px) !important; margin-right: 24px !important; }
        .glide-0222 .glide__slide:last-child { margin-right: 0 !important; }
        @media (max-width: 1024px) { .glide-0222 .glide__slide { width: calc(50% - 12px) !important; } }
        @media (max-width: 640px) { .glide-0222 .glide__slide { width: 100% !important; margin-right: 0 !important; } }
        .future-ready-list { list-style: none; padding-left: 0; }
        ul.glide__slides { display: flex; padding: 0; margin: 0; list-style: none; }
        ul.tabs { padding: 0px; list-style: none; }
        ul.tabs li { background: none; color: #053B7A; display: inline-block; padding: 10px 15px; cursor: pointer; background: #ededed; }
        @media (max-width: 640px) { ul.tabs li { font-size: 14px; padding: 8px; background: #ededed; } }
        ul.tabs li.current { background: #053B7A; color: #fff; }
        .tab-content { display: none; padding-top: 15px; }
        .tab-content.current { display: block !important; }
        .img-popup { position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: transparent; display: none; justify-content: center; align-items: center; z-index: 9999; }
        .popup-content { background: rgba(0, 0, 0, 0.85); border-radius: 12px; padding: 20px; display: flex; justify-content: center; align-items: center; position: relative; animation: animatepopup 0.3s ease-in-out forwards; width: 50vw; height: 90vh; }
        .popup-content img { max-width: 100%; max-height: 100%; object-fit: contain; opacity: 0; transform: translateY(-100px); animation: animatepopup 0.3s ease-in-out forwards; border-radius: 10px; }
        @media (max-width: 640px) { .popup-content { width: 100vw; height: 50vh; } }
        .close-btn { width: 35px; height: 30px; display: flex; justify-content: center; flex-direction: column; position: absolute; top: 20px; right: 20px; cursor: pointer; }
        .close-btn .bar { height: 4px; background: #fff; border-radius: 2px; }
        .close-btn .bar:nth-child(1) { transform: rotate(45deg); }
        .close-btn .bar:nth-child(2) { transform: translateY(-4px) rotate(-45deg); }
        .img-popup.opened { display: flex; }
        @keyframes animatepopup { to { opacity: 1; transform: translateY(0); } }
        .mySwiper .swiper-pagination-bullet { background-color: #053B7A !important; }
        .mySwiper .swiper-pagination-bullet-active { background-color: #002A5B !important; }
        @media (max-width: 640px) { .swiper { box-shadow: none !important; } .swiper-slide { box-shadow: none !important; } .swiper-wrapper { margin: 0 !important; } }
        .clamp-2 { display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; transition: max-height 0.3s ease; }
        .expanded { max-height: 200px; overflow-y: auto; overflow-x: hidden; display: block; -webkit-line-clamp: unset; white-space: normal; }
        /* Excellence carousel – using Glide with exact layout */
        .excellance-glide .card-top-peudo {
            overflow: hidden;
            border-radius: 8px;
            cursor: pointer;
        }
        .excellance-glide .top-hide {
            transition: transform 0.3s ease;
        }
        .excellance-glide .card-top-peudo:hover .top-hide {
            transform: translateY(-100%);
            opacity: 0;
        }
        .excellance-glide .bottom-card-content {
            transition: transform 0.3s ease;
            transform: translateY(100%);
        }
        .excellance-glide .card-top-peudo:hover .bottom-card-content {
            transform: translateY(0);
        }
        .excellance-glide .top-hide .absolute {
            background: linear-gradient(180deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0) 100%);
            width: 100%;
            left: 0;
            top: 0;
            pointer-events: none;
        }
    </style>
    <?php include "includes/header.php" ?>
    <?php
    $showPopup = false;
    if (isset($pop_data) && isset($pop_data['data']) && is_array($pop_data['data']) &&
        isset($pop_data['data'][0]) && is_array($pop_data['data'][0]) &&
        !empty(trim((string)($pop_data['data'][0]['image'] ?? '')))
    ) {
        $image = $pop_data['data'][0]['image'];
        $url   = $pop_data['data'][0]['url'] ?? '#';
        $text  = $pop_data['data'][0]['text'] ?? '';
        $showPopup = true;
    } else {
        $image = ''; $url = '#'; $text = '';
    }
    ?>
    <?php if ($showPopup): ?>
    <div id="formOverlay" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center z-[99999] hidden">
        <div class="bg-white rounded-xl shadow-2xl p-6 w-full lg:max-w-xl md:max-w-lg sm:max-w-md relative">
            <button id="dismissPopup" class="absolute top-4 right-4 text-gray-400 hover:text-red-400 text-2xl font-bold">&times;</button>
            <a href="<?php echo htmlspecialchars($url); ?>">
                <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars(getApiAltText(['image' => $image, 'text' => $text], 'Popup advertisement')); ?>">
            </a>
        </div>
    </div>
    <?php endif; ?>

    <div class="main relative">
        <div class="mx-3">
            <!-- Hero Slider -->
            <div class="relative w-full heroSlider opne-hide-circle">
                <div class="overflow-hidden" data-glide-el="track">
                    <ul class="relative w-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap">
                        <?php
                        $desktop_banners = []; $mobile_banners = [];
                        foreach ($hero__data['data'] as $deviceBanner) {
                            if ($deviceBanner['device'] === 'desktop') $desktop_banners = $deviceBanner['medias'];
                            elseif ($deviceBanner['device'] === 'mobile') $mobile_banners = $deviceBanner['medias'];
                        }
                        $banner_count = min(count($desktop_banners), count($mobile_banners));
                        for ($i = 0; $i < $banner_count; $i++): ?>
                            <li class="relative">
                                <img src="<?= htmlspecialchars($mobile_banners[$i]['urls']) ?>" alt="<?= htmlspecialchars(getApiAltText($mobile_banners[$i], 'Hero banner mobile')) ?>" class="sm:w-auto w-full sm:hidden">
                                <img src="<?= htmlspecialchars($desktop_banners[$i]['urls'] ?? '') ?>" alt="<?= htmlspecialchars(getApiAltText($desktop_banners[$i], 'Hero banner desktop')) ?>" class="w-full hidden sm:block">
                            </li>
                        <?php endfor; ?>
                    </ul>
                </div>
                <div class="absolute left-0 xl:flex hidden items-center justify-between w-full h-0 px-4 top-1/2 hide-circle" data-glide-el="controls">
                    <button class="inline-flex items-center justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir="<" aria-label="prev slide"><i class="fa-solid fa-angle-left"></i></button>
                    <button class="inline-flex items-center justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir=">" aria-label="next slide"><i class="fa-solid fa-angle-right"></i></button>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="mt-5 sm:mt-[60px] 2xl:w-[1080px] lg:w-[824px] md:w-[567px] sm:w-[440px] sm:mx-auto sm:px-5 px-3">
                <div>
                    <ul class="grid 2xl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-2 grid-cols-2 items-center gap-5">
                        <?php foreach ($cta_data['data'] as $data): ?>
                        <li>
                            <a href="<?php echo htmlspecialchars($data['url']) ?>" target="_blank"
                                class="w-full h-[110px] sm:h-auto border border-[#053B7A] rounded-[12px] bg-[#EFF6FF] sm:p-[20px] transition-all duration-300 transform hover:scale-[1.03] hover:[box-shadow:0_5px_0_rgba(5,59,122,0.4),0_10px_0_rgba(5,59,122,0.3),0_15px_0_rgba(5,59,122,0.2),0_20px_0_rgba(5,59,122,0.1),0_25px_0_rgba(5,59,122,0.05)] flex-col sm:flex-row flex justify-center items-center">
                                <img src="<?php echo htmlspecialchars($data['media']['urls']) ?>" alt="<?php echo htmlspecialchars(getApiAltText($data, $data['name'] ?? 'CTA icon')) ?>" class="2xl:w-[60px] 2xl:h-[60px] xl:w-[60px] xl:h-[60px] lg:w-[45px] lg:h-[45px] sm:w-[45px] sm:h-[45px] object-contain">
                                <span class="font-[600] text-[13px] sm:text-[16px] text-[#053B7A] mt-2 sm:mt-0 sm:ml-2 text-center sm:text-left"><?php echo htmlspecialchars($data['name']) ?></span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- ================= EXCELLENCE SECTION (order 3) – EXACT LAYOUT ================= -->
            <?php
            $excellenceSection = null;
            foreach ($home_data['data']['sections'] as $section) {
                if (($section['order'] ?? 0) == 3) {
                    $excellenceSection = $section;
                    break;
                }
            }
            $excellenceItems = $excellenceSection['resolved_content']['items'] ?? [];
            ?>
            <?php if (!empty($excellenceItems)): ?>
            <div class="mt-10 sm:mt-[60px] sm:mx-auto sm:px-5 px-3 excellance-container">
                <div class="relative w-full excellance-glide opne-hide-circle">
                    <div class="overflow-hidden" data-glide-el="track">
                        <ul class="relative w-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap">
                            <?php foreach ($excellenceItems as $item):
                                $imageUrl = $item['image_url'] ?? '';
                                $linkUrl = $item['link_url'] ?? '#';
                                $description = $item['description'] ?? '';
                                // Extract heading parts (first line before <br> or <span>)
                                preg_match('/<h2[^>]*>(.*?)<\/h2>/is', $description, $titleMatch);
                                $fullTitle = strip_tags($titleMatch[1] ?? '');
                                $titleParts = explode('<br', $fullTitle);
                                $firstLine = trim($titleParts[0] ?? '');
                                $secondLine = isset($titleParts[1]) ? trim(strip_tags($titleParts[1])) : '';
                                $cleanDesc = preg_replace('/<h2[^>]*>.*?<\/h2>/is', '', $description);
                                $cleanDesc = strip_tags($cleanDesc, '<p><br><strong>');
                                $cleanDesc = trim($cleanDesc);
                            ?>
                            <li class="relative w-full card-top-peudo rounded-[8px] cursor-pointer" style="width: 320px; margin-right: 10px;">
                                <div class="top-hide">
                                    <div class="absolute z-10 p-3" style="left: 0; top: 0; width: 100%; background: linear-gradient(180deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0) 100%);">
                                        <h2 class="text-[25px] 2xl:text-[28px] lg:text-[22px] leading-8 font-[700]" style="color: #B4D7FF;">
                                            <?= htmlspecialchars($firstLine) ?><br>
                                            <span class="text-[20px] 2xl:text-[20px] lg:text-[16px] font-[600]" style="color: rgba(255, 255, 255, 0.8);">
                                                <?= htmlspecialchars($secondLine) ?>
                                            </span>
                                        </h2>
                                    </div>
                                </div>
                                <div>
                                    <img src="<?= htmlspecialchars($imageUrl) ?>" class="w-[100%] h-[95%] rounded-[8px]" alt="<?= htmlspecialchars($fullTitle) ?>">
                                </div>
                                <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open" style="width: 100%; left: 0; background: rgba(5, 59, 122, 0.95); border-radius: 0 0 8px 8px;">
                                    <div class="relative bottom-[16px]">
                                        <h2 class="text-[28px] 2xl:text-[32px] lg:text-[22px] leading-7 font-[700]" style="color: #B4D7FF;">
                                            <?= htmlspecialchars($firstLine) ?><br>
                                            <span class="text-[20px] 2xl:text-[20px] lg:text-[16px] font-[600]" style="color: rgba(255, 255, 255, 0.8);">
                                                <?= htmlspecialchars($secondLine) ?>
                                            </span>
                                        </h2>
                                        <p class="mt-3 text-white"><?= $cleanDesc ?></p>
                                        <button class="w-[100%] relative bottom-[15px]">
                                            <a href="<?= htmlspecialchars($linkUrl) ?>" class="rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">
                                                Read More
                                                <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#053B7A" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542" stroke="#053B7A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- Controls -->
                    <div class="absolute left-0 xl:flex hidden items-center justify-between w-full h-0 px-4 top-1/2 hide-circle" data-glide-el="controls">
                        <button class="inline-flex items-center justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir="<" aria-label="prev slide"><i class="fa-solid fa-angle-left"></i></button>
                        <button class="inline-flex items-center justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir=">" aria-label="next slide"><i class="fa-solid fa-angle-right"></i></button>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <!-- ================= END EXCELLENCE SECTION ================= -->

            <!-- The Allenhouse Approach -->
            <?php if (!empty($ap_data['data'][0]['description'] ?? '')): ?>
            <div style="background-image: url('https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/NEg8GvmpkpIMpsvOF33ni6DGlQiEsGhKb8BpEOo4.png'); background-repeat: no-repeat;" class="bg-cover" role="img" aria-label="The Allenhouse Approach background">
                <div class="mt-10 sm:mt-8 sm:py-16 py-4 2xl:w-[880px] lg:w-[624px] md:w-[467px] sm:w-[340px] sm:mx-auto mx-3">
                    <div class="text-center">
                        <h2 class="text-[32px] font-[700] leading-9 text-blue-main relative">The Allenhouse Approach</h2>
                        <p class="mt-4 text-[#808080] text-[18px]"><?php echo htmlspecialchars($ap_data['data'][0]['description']); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- Legacy of Excellence -->
        <div class="mt-10">
            <div class="bg-[#132959] text-center pt-5 sm:pb-2 pb-5">
                <h2 class="text-[32px] font-[700] leading-9 text-white relative text-center">Legacy of Excellence</h2>
            </div>
            <div class="sm:py-8 py-5 bg-feature m-bg-feature">
                <div class="legacyExcellence">
                    <div class="flex justify-center gap-4 items-center sdfsd sm:py-0 py-6">
                        <span class="sm:w-[50%] w-[35%] inline-block"><img src="assets/images/icons/thump.png" alt="Years of excellence thumb icon" class="w-[50px] 2xl:w-[50px] lg:w-[45px] md:w-[40px]" style="margin: 0 0 0 auto;"></span>
                        <div class="inline-block w-[50%]">
                            <h2 class="text-white font-[700] text-[35px] 2xl:text-[30px] lg:text-[20px] md:text-[20px]"><?php echo htmlspecialchars($ex__data['data'][0]['years'] ?? '') ?></h2>
                            <h3 class="text-white font-[700] text-[22px] 2xl:text-[20px] lg:text-[15px] md:text-[15px]">Years</h3>
                        </div>
                    </div>
                    <div class="flex justify-center gap-4 items-center sm:pb-0 pb-10 sdfsd">
                        <span class="sm:w-[50%] w-[35%] inline-block"><img src="assets/images/icons/campus.png" alt="Campus location icon" class="w-[50px] 2xl:w-[50px] lg:w-[45px] md:w-[40px]" style="margin: 0 0 0 auto;"></span>
                        <div class="inline-block w-[50%]">
                            <h2 class="text-white font-[700] text-[35px] 2xl:text-[30px] lg:text-[20px] md:text-[20px]"><?php echo htmlspecialchars($ex__data['data'][0]['campus'] ?? '') ?></h2>
                            <h3 class="text-white font-[700] text-[22px] 2xl:text-[20px] lg:text-[15px] md:text-[15px]">Campus</h3>
                        </div>
                    </div>
                    <div class="flex justify-center gap-4 items-center sm:pb-0 pb-10 sdfsd">
                        <span class="sm:w-[50%] w-[35%] inline-block"><img src="assets/images/icons/students.png" alt="Students count icon" class="w-[50px] 2xl:w-[50px] lg:w-[45px] md:w-[40px]" style="margin: 0 0 0 auto;"></span>
                        <div class="inline-block w-[50%]">
                            <h2 class="text-white font-[700] text-[35px] 2xl:text-[30px] lg:text-[20px] md:text-[20px]"><?php echo htmlspecialchars($ex__data['data'][0]['student'] ?? '') ?></h2>
                            <h3 class="text-white font-[700] text-[22px] 2xl:text-[20px] lg:text-[15px] md:text-[15px]">Students</h3>
                        </div>
                    </div>
                    <div class="flex justify-center gap-4 items-center sm:pb-0 pb-10 sdfsd">
                        <span class="sm:w-[50%] w-[35%] inline-block"><img src="assets/images/icons/staff.png" alt="Staff members icon" class="w-[50px] 2xl:w-[50px] lg:w-[45px] md:w-[40px]" style="margin: 0 0 0 auto;"></span>
                        <div class="inline-block w-[50%]">
                            <h2 class="text-white font-[700] text-[35px] 2xl:text-[30px] lg:text-[20px] md:text-[20px]"><?php echo htmlspecialchars($ex__data['data'][0]['staff'] ?? '') ?></h2>
                            <h3 class="text-white font-[700] text-[22px] 2xl:text-[20px] lg:text-[15px] md:text-[15px]">Staff</h3>
                        </div>
                    </div>
                    <div class="flex justify-center gap-4 items-center sdfsd">
                        <span class="sm:w-[50%] w-[35%] inline-block"><img src="assets/images/icons/allumi.png" alt="Alumni network icon" class="w-[50px] 2xl:w-[50px] lg:w-[45px] md:w-[40px]" style="margin: 0 0 0 auto;"></span>
                        <div class="inline-block w-[50%]">
                            <h2 class="text-white font-[700] text-[35px] 2xl:text-[30px] lg:text-[20px] md:text-[20px]"><?php echo htmlspecialchars($ex__data['data'][0]['alumni'] ?? '') ?></h2>
                            <h3 class="text-white font-[700] text-[22px] 2xl:text-[20px] lg:text-[15px] md:text-[15px]">Alumni</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Our Philosophy -->
        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-5 mt-10">
            <div class="text-center">
                <h2 class="text-[32px] font-[700] leading-8 text-blue-main">Our Philosophy <span class="sm:hidden"><br></span> Centres Around</h2>
            </div>
            <div class="relative w-full glide-0222 mt-5 opne-hide-circle">
                <div class="overflow-hidden" data-glide-el="track">
                    <ul class="glide__slides">
                        <?php foreach ($philosophy_data['data'] as $ppdata): ?>
                        <li class="glide__slide">
                            <img src="<?php echo htmlspecialchars($ppdata['media']['urls']); ?>" alt="<?php echo htmlspecialchars(getApiAltText($ppdata, $ppdata['title'] ?? 'Philosophy image')) ?>" class="w-[100%] rounded-[8px]">
                            <div class="mt-4">
                                <h2 class="text-[18px] font-[700] leading-5 text-blue-main"><?php echo htmlspecialchars($ppdata['title'] ?? '') ?></h2>
                                <p class="text-gray-600 text-[16px] mt-1"><?php echo htmlspecialchars($ppdata['description'] ?? ''); ?></p>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="absolute left-0 xl:flex hidden items-center justify-between w-full h-0 px-4 top-1/2 hide-circle" data-glide-el="controls">
                    <button class="inline-flex items-center relative sm:right-[66px] justify-center hidden hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir="<" aria-label="prev slide"><i class="fa-solid fa-angle-left"></i></button>
                    <button class="inline-flex items-center relative sm:left-[66px] justify-center hidden hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir=">" aria-label="next slide"><i class="fa-solid fa-angle-right"></i></button>
                </div>
                <div class="absolute bottom-[-20px] flex items-center justify-center w-full gap-2" data-glide-el="controls[nav]">
                    <button class="group" data-glide-dir="=0" aria-label="goto slide 1"><span class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-200 focus:outline-none"></span></button>
                    <button class="group" data-glide-dir="=1" aria-label="goto slide 2"><span class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-200 focus:outline-non2"></span></button>
                    <button class="group" data-glide-dir="=2" aria-label="goto slide 3"><span class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-200 focus:outline-none"></span></button>
                    <button class="group" data-glide-dir="=3" aria-label="goto slide 4"><span class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-200 focus:outline-none"></span></button>
                </div>
            </div>
        </div>

        <style>.academic-box { border-radius: 12px; transition: all 0.3s ease; } .academic-box:hover { box-shadow: 5px 5px 15px rgba(17, 39, 89, 0.8); border-radius: 12px; }</style>

        <!-- Future Ready Skills -->
        <div style="background-image: url('https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/NEg8GvmpkpIMpsvOF33ni6DGlQiEsGhKb8BpEOo4.png'); background-repeat: no-repeat;" class="bg-cover sm:mt-20 mt-10 pt-5 pb-16" role="img" aria-label="Future Ready Skills background">
            <h2 class="text-[28px] sm:text-[30px] font-[700] leading-10 text-blue-main relative text-center">Future Ready Skills</h2>
            <div class="container mx-auto">
                <ul class="grid sm:grid-cols-3 grid-cols-2 sm:gap-5 gap-3 sm:mt-5 mt-10 sm:mx-[80px] sm:px-0 px-3 future-ready-list">
                    <li class="mx-auto"><a href="robotics"><img class="border-[1px] border-blue-main academic-box sm:w-[80%] w-[]" src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/4YU1RJsoAcFk8RBsf8MjzVL6butg9UUVT8e97bTH.png" alt="Robotics Academy"></a></li>
                    <li class="mx-auto"><a href="sports"><img class="border-[1px] border-blue-main academic-box sm:w-[80%] w-[]" src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/559cOuwQPnCYCXTI2IICDE9yYKtfHc3WnQ3TjfnV.png" alt="Sports Academy"></a></li>
                    <li class="mx-auto"><a href="animation-master-class"><img class="border-[1px] border-blue-main academic-box sm:w-[80%] w-[]" src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/k08SgzoJXQLILC3TCqyxdamwOArsW34dckASne13.png" alt="Animation Academy"></a></li>
                    <li class="mx-auto"><a href="oluxi-smart-class"><img class="border-[1px] border-blue-main academic-box sm:w-[80%] w-[]" src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/mg187WJxFX1PudaOHFfmIdLP5my6iNPfDqYfJQSJ.png" alt="Oluxi Smart Skills"></a></li>
                    <li class="mx-auto"><a href="coding"><img class="border-[1px] border-blue-main academic-box sm:w-[80%] w-[]" src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/mF2NgCb9CIXWZ1JKmEUGrvifSzHCSOkaQosz58Vg.png" alt="Coding Academy"></a></li>
                    <li class="mx-auto"><a><img class="border-[1px] border-blue-main academic-box sm:w-[80%] w-[]" src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/BC4umV4K66fCPKw7ICiNI2jGGjgq7lQW5pWLT0bb.png" alt="Entrepreneur Dream Hub"></a></li>
                </ul>
            </div>
        </div>

        <!-- Video Section -->
        <div class="sm:mt-[100px] mt-10">
            <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto">
                <?php
                $videoUrl = $video_data["data"][0]['url'] ?? '';
                function getYouTubeId($url) { preg_match('%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $matches); return $matches[1] ?? ''; }
                $videoId = getYouTubeId($videoUrl);
                ?>
                <div class="relative">
                    <div class="o-video mx-auto">
                        <?php if ($videoId): ?>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $videoId; ?>?autoplay=1&mute=1&loop=1&playlist=<?php echo $videoId; ?>" frameborder="0" allow="autoplay;" allowfullscreen title="Allenhouse School promotional video"></iframe>
                        <?php else: ?>
                        <p>Video not available</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Our Campuses -->
        <div class="sm:mt-12 mt-8 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto relative">
            <div class="mx-5">
                <div class="text-center"><h2 class="text-[30px] font-[700] leading-10 text-blue-main relative">Our Campuses</h2></div>
                <div class="relative w-full glide-0333 mt-5 opne-hide-circle">
                    <div class="overflow-hidden" data-glide-el="track">
                        <ul class="relative w-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap" style="list-style: none; padding-left: 0;">
                            <?php foreach ($our_campus['data'] as $data): if (isset($data['id']) && $data['id'] == 22) continue; ?>
                            <li class="bg-white mb-5 rounded-[10px]" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                                <img src="<?php echo htmlspecialchars($data['media']['urls'] ?? '') ?>" alt="<?php echo htmlspecialchars(getApiAltText($data, $data['name'] ?? 'Campus image')) ?>" class="w-[100%] rounded-[10px]">
                                <div class="mx-3 mt-4 mb-5">
                                    <h2 class="text-[22px] font-[700] leading-8 text-blue-main"><?php echo htmlspecialchars($data['name'] ?? '') ?></h2>
                                    <div class="mt-3">
                                        <div class="flex gap-3"><span class="mt-1"><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/Uk9fc8u92eMqkV3meFQNiUoRYB2DxzNi4d5T17Id.png" class="w-[20px] h-[20px]" alt="Location icon"></span><p class="text-gray-500 capitalize text-[16px] w-[85%]"><?php echo htmlspecialchars($data['addressline1'] ?? '') ?>, <?php echo htmlspecialchars($data['addressline2'] ?? '') ?></p></div>
                                        <div class="flex gap-3 mt-2 items-center"><span><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/oJ6mhPYvNt2N9dgrQ8zY1IeW1ds6f8l9E9yvAiDS.png" class="w-[20px] h-[20px]" alt="Phone icon"></span><p><a href="tel:<?php echo htmlspecialchars($data['contact'] ?? '') ?>" class="text-gray-500 capitalize text-[16px] w-[85%]"><?php echo htmlspecialchars($data['contact'] ?? '') ?></a></p></div>
                                        <button class="w-full rounded-full text-white bg-blue-main mt-5"><a href="<?php echo htmlspecialchars($data['weburl'] ?? '#') ?>" class="flex items-center gap-2 p-2 justify-center">Visit Website<svg width="15" height="10" viewBox="0 0 15 10" fill="none"><path d="M1.36914 4.71826L13.1123 4.71826" stroke="white" stroke-width="1.5" stroke-linecap="round"/><path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a></button>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="absolute left-0 xl:flex hidden items-center justify-between w-full h-0 px-4 top-1/2 hide-circle" data-glide-el="controls">
                        <button class="inline-flex items-center relative sm:right-[66px] justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir="<" aria-label="prev slide"><i class="fa-solid fa-angle-left"></i></button>
                        <button class="inline-flex items-center relative sm:left-[66px] justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir=">" aria-label="next slide"><i class="fa-solid fa-angle-right"></i></button>
                    </div>
                    <div class="absolute bottom-[-20px] flex items-center justify-center w-full gap-2" data-glide-el="controls[nav]">
                        <button class="group" data-glide-dir="=0" aria-label="goto slide 1"><span class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                        <button class="group" data-glide-dir="=1" aria-label="goto slide 2"><span class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-non2"></span></button>
                        <button class="group" data-glide-dir="=2" aria-label="goto slide 3"><span class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                        <button class="group" data-glide-dir="=3" aria-label="goto slide 4"><span class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Life at Allenhouse -->
        <div class="relative sm:py-6 py-5 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto mt-10">
            <div class="text-center"><h2 class="sm:text-[30px] text-[28px] font-[700] leading-10 text-blue-main relative">Life at Allenhouse</h2></div>
            <div class="mx-5 mt-7">
                <div class="sm:flex gap-3">
                    <div class="sm:w-[33.33%]">
                        <div><a><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/ynPFPfl3GXvcicMPXvJ39X5SOh1cyonMAG28Wub0.jpg" alt="Students celebrating at school event" class="popup-img rounded-[10px] mb-2 object-cover hover:scale-90 transition delay-300" style="width:100%"></a></div>
                        <div class="mt-3"><a><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/krdPNxr1wWyZnwn53flQE6rFWSRUK72IgBS9lJj3.jpg" alt="Students participating in group activity" class="popup-img rounded-[10px] mb-2 object-cover hover:scale-90 transition delay-300" style="width:100%"></a></div>
                    </div>
                    <div class="sm:w-[33.33%]"><div><a><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/OKPsVTXF6nEjPLgBX6YFBXBgNtSunOgdCfJCdR2s.jpg" alt="Student showcasing talent on stage" class="popup-img rounded-[10px] object-cover hover:scale-90 transition delay-300" style="width:100%"></a></div></div>
                    <div class="w-[33.33%] sm:block hidden">
                        <div><a><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/1zeERnHit0T6VX4XKSNWZyytrMYa9Y7JwW0bFEWm.jpg" alt="Students in classroom learning" class="popup-img rounded-[10px] mb-2 hover:scale-90 transition delay-300" style="width:100%"></a></div>
                        <div class="mt-3"><a><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/ONWpGkKwLPUWmFmOiv1BFXa9CDGZcA4WUEm2qYb2.jpg" alt="Students outdoor sports activity" class="popup-img rounded-[10px] mb-2 hover:scale-90 transition delay-300" style="width:100%"></a></div>
                    </div>
                </div>
                <div class="mt-[6px] sm:flex gap-3">
                    <div><a><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/q7K0sWsMK6FqiCuE2iSZahKkLu0FcA1jZkrZn6pt.jpg" alt="Students art and craft activity" class="popup-img rounded-[10px] mb-2 hover:scale-90 transition delay-300" style="width:100%"></a></div>
                    <div><a><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/V8y45JlO6puUZraUNqNZlmnQKmZ0c4hiLKhMW5CL.jpg" alt="Students cultural performance" class="popup-img rounded-[10px] mb-2 hover:scale-90 transition delay-300" style="width:100%"></a></div>
                </div>
            </div>
        </div>

        <div class="img-popup"><div class="popup-content"><img src="" alt="Popup Image"><div class="close-btn"><div class="bar"></div><div class="bar"></div></div></div></div>

        <!-- Testimonials -->
        <div class="relative sm:mt-20 mt-10" id="testimonials">
            <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 px-3">
                <div class="text-center"><h2 class="text-[28px] sm:text-[30px] font-[700] leading-10 text-blue-main relative">Testimonials</h2></div>
                <div class="relative sm:pt-5 pt-2">
                    <div id="tab-1" class="tab-content current Testimonials">
                        <div class="overflow-hidden mt-1 relative glide Testimonials">
                            <div data-glide-el="track">
                                <ul class="glide__slides">
                                    <?php foreach ($i_data['data'] as $row): ?>
                                    <li class="sm:flex items-start gap-2 mb-4 border-[1px] border-gray-300 p-3 rounded-[8px] bg-blue-main">
                                        <div class="text-center sm:w-[30%] w-[90%]">
                                            <img src="<?php echo htmlspecialchars($row["media"]["urls"] ?? '') ?>" alt="<?php echo htmlspecialchars(getApiAltText($row, $row['heading'] ?? 'Testimonial image')) ?>" class="mb-2 mx-auto rounded-[10px] w-[130px] h-[130px]">
                                            <h2 class="font-[700] text-[16px] text-gray-100"><?php echo htmlspecialchars($row["heading"] ?? '') ?></h2>
                                        </div>
                                        <div class="sm:w-[60%] w-[90%] sm:mt-0 mt-3 sm:text-left text-center">
                                            <p class="testimonial-text text-[16px] text-gray-200 text-center sm:text-left clamp-2"><?php echo htmlspecialchars($row['description'] ?? ''); ?></p>
                                            <button class="moreless-button font-[600] text-white text-sm mt-1">Read more...</button>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="glide__arrows" data-glide-el="controls">
                                <button class="glide__arrow glide__arrow--left absolute left-2 top-1/2 -translate-y-1/2 bg-white border border-black text-black hover:bg-red-500 w-10 h-10 flex items-center justify-center rounded-full shadow-md" data-glide-dir="<" aria-label="Previous testimonial">&#10094;</button>
                                <button class="glide__arrow glide__arrow--right absolute right-2 top-1/2 -translate-y-1/2 bg-white border border-black text-black hover:bg-red-500 w-10 h-10 flex items-center justify-center rounded-full shadow-md" data-glide-dir=">" aria-label="Next testimonial">&#10095;</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gallery -->
                <div class="relative mt-8 mb-10">
                    <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
                        <div class="text-center"><h2 class="text-[28px] sm:text-[32px] font-[700] leading-10 text-blue-main relative">Gallery</h2></div>
                        <div class="relative Images sm:pt-5 pt-2 opne-hide-circle">
                            <div class="overflow-hidden mt-1" data-glide-el="track">
                                <ul class="relative w-full overflow-hidden p-0 pb-5 whitespace-no-wrap flex flex-no-wrap">
                                    <li class="flex items-start gap-10 mb-4"><div class="flex"><div><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/K204FbZXICURhjqHpZcgLWLQWCuJq7ZiiIHdZzWV.jpg" alt="School event gallery image 1"></div></div></li>
                                    <li class="flex items-start gap-10 mb-4"><div class="flex"><div><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/KswpMP32T2jODqTGo1HgkXKin22uvG9eW9IBdJX5.jpg" alt="School event gallery image 2"></div></div></li>
                                    <li class="flex items-start gap-10 mb-4"><div class="flex"><div><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/aEjbjUqxm8HLPc2kO80tWzOReF0UfmgaXG0VnmaS.jpg" alt="School event gallery image 3"></div></div></li>
                                    <li class="flex items-start gap-10 mb-4"><div class="flex"><div><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/vKKTA3tHKbWTgBckNr6bKqkHFrc8EiWkpou9LAvc.jpg" alt="School event gallery image 4"></div></div></li>
                                    <li class="flex items-start gap-10 mb-4"><div class="flex"><div><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/KpQscihWAF0c05RNIRZo6TvHAe0TKxw235OTaMkd.jpg" alt="School event gallery image 5"></div></div></li>
                                </ul>
                            </div>
                            <div class="absolute left-0 hidden xl:flex items-center justify-between w-full h-0 px-4 top-1/2 hide-circle" data-glide-el="controls">
                                <button class="inline-flex items-center relative sm:right-[66px] justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir="<" aria-label="prev slide"><i class="fa-solid fa-angle-left"></i></button>
                                <button class="inline-flex items-center relative sm:left-[66px] justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir=">" aria-label="next slide"><i class="fa-solid fa-angle-right"></i></button>
                            </div>
                            <div class="absolute bottom-0 flex items-center justify-center w-full gap-2 hidden" data-glide-el="controls[nav]">
                                <button class="group" data-glide-dir="=0" aria-label="goto slide 1"><span class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                                <button class="group" data-glide-dir="=1" aria-label="goto slide 2"><span class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-non2"></span></button>
                                <button class="group" data-glide-dir="=2" aria-label="goto slide 3"><span class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                                <button class="group" data-glide-dir="=3" aria-label="goto slide 4"><span class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                            </div>
                            <div class="text-center mt-3"><a href="photo-gallery" class="text-[16px]font-[600] rounded-[20px] p-[5px] px-4 border-[1px] border-blue-main hover:bg-red-500 hover:text-white hover:boder-red-500">View All</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "includes/footer.php"; ?>

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.2/glide.js"></script>
        <?php include "includes/foot.php"; ?>

        <script>
            // Glide carousels (testimonials, philosophy, campuses, and Excellence)
            let glide1Initialized = false, glide2Initialized = false;
            function initGlide(selector) { if (!document.querySelector(selector)) return null; return new Glide(selector, { type: 'carousel', focusAt: 1, perView: 2, autoplay: 3500, animationDuration: 700, gap: 10, breakpoints: { 1680: { perView: 2 }, 1024: { perView: 2 }, 820: { perView: 2 }, 640: { perView: 1 } } }); }
            const glide1 = initGlide('.Testimonials');
            if (glide1) { glide1.mount(); glide1Initialized = true; }
            document.querySelectorAll('.tab-link').forEach(tab => { tab.addEventListener('click', function() { const tabId = this.getAttribute('data-tab'); document.querySelectorAll('.tab-link').forEach(link => link.classList.remove('current')); this.classList.add('current'); document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('current')); document.getElementById(tabId).classList.add('current'); if (tabId === 'tab-2' && !glide2Initialized) { const glide2 = initGlide('.Testimonials2'); glide2.mount(); glide2Initialized = true; } }); });
            const glide033 = document.querySelector('.glide-0333'); if (glide033 && typeof Glide !== 'undefined') new Glide('.glide-0333', { type: 'carousel', perView: 3, gap: 24, breakpoints: { 1024: { perView: 2 }, 640: { perView: 1 } } }).mount();
            const glide022 = document.querySelector('.glide-0222'); if (glide022 && typeof Glide !== 'undefined') new Glide('.glide-0222', { type: 'carousel', perView: 3, gap: 24, breakpoints: { 1024: { perView: 2 }, 640: { perView: 1 } } }).mount();
            // Excellence Glide carousel (exactly as in working snippet)
            const excellanceGlide = document.querySelector('.excellance-glide');
            if (excellanceGlide && typeof Glide !== 'undefined') {
                new Glide('.excellance-glide', {
                    type: 'carousel',
                    perView: 4,
                    gap: 20,
                    breakpoints: { 1280: { perView: 3 }, 950: { perView: 2 }, 640: { perView: 1 } }
                }).mount();
            }

            // Other scripts (moreless, popup, etc.)
            document.querySelectorAll('.moreless-button').forEach(btn => {
                btn.addEventListener('click', function() {
                    const para = this.previousElementSibling;
                    para.classList.toggle('expanded');
                    para.classList.toggle('clamp-2');
                    this.textContent = para.classList.contains('expanded') ? "Read less" : "Read more...";
                });
            });
            $(document).ready(function() { var imgPopup = $('.img-popup'), popupImage = $('.img-popup img'), closeBtn = $('.close-btn'); $('.popup-img').on('click', function() { var img_src = $(this).attr('src'); popupImage.attr('src', img_src); imgPopup.addClass('opened'); }); imgPopup.on('click', function() { imgPopup.removeClass('opened'); popupImage.attr('src', ''); }); closeBtn.on('click', function() { imgPopup.removeClass('opened'); popupImage.attr('src', ''); }); popupImage.on('click', function(e) { e.stopPropagation(); }); $(document).on('keydown', function(e) { if (e.key === "Escape") { imgPopup.removeClass('opened'); popupImage.attr('src', ''); } }); });
            window.addEventListener('load', () => { const popup = document.getElementById('formOverlay'); if (popup) { setTimeout(() => popup.classList.remove('hidden'), 500); } });
            const dismiss = document.getElementById('dismissPopup'); if (dismiss) { dismiss.addEventListener('click', () => { const popup = document.getElementById('formOverlay'); if (popup) popup.classList.add('hidden'); }); }
        </script>
    </body>
</html>