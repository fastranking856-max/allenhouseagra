<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/api.php';
require_once __DIR__ . '/image-alt.php';
include_once __DIR__ . '/apis.php';
require_once __DIR__ . '/layout-helpers.php';

$currentPage = basename($_SERVER['PHP_SELF'], '.php');
$pageDataMap = [
    'index' => $home_data,
    'about-us' => $about_us,
    'our-curriculum' => $our_curriculum_page ?? $our_curriculum_data,
    'our-story' => $our_story_page ?? $our_story_data,
    'pedagogy' => $pedagogy_page ?? cmsEmptyResponse(),
    'facilities' => $facilities_page ?? cmsEmptyResponse(),
    'faq' => $faq_page ?? $faq_data,
    'contact-us' => $contact_data,
    'fee-structure' => $data['fee_structure_data'] ?? cmsEmptyResponse(),
    'transfer-policy' => $data['transferpolicy_data'] ?? cmsEmptyResponse(),
    'clubs' => $club_page ?? cmsEmptyResponse(),
];
$pageData = $pageDataMap[$currentPage] ?? null;

require_once __DIR__ . '/cms-bootstrap.php';

$headerPart = cmsLayoutPart($header_footer_data, 'header-aps-agra')
    ?? cmsLayoutPartByType($header_footer_data, 'header')
    ?? [];
$footerPart = cmsLayoutPart($header_footer_data, 'footer-aps-agra')
    ?? cmsLayoutPartByType($header_footer_data, 'footer')
    ?? [];

$headerMeta = is_array($headerPart['meta_data'] ?? null)
    ? $headerPart['meta_data']
    : cmsLayoutMeta($header_footer_data, 'header-aps-agra');
$footerMeta = is_array($footerPart['meta_data'] ?? null)
    ? $footerPart['meta_data']
    : cmsLayoutMeta($header_footer_data, 'footer-aps-agra');

$navItems = cmsNavItems();

$scrollText = cmsPlainText($scroll_text_data['data'][0]['content'] ?? '');

$headerPhone = trim((string) ($headerMeta['phones'] ?? ''));
$logoUrl = cmsAssetUrl($headerMeta['logo_url'] ?? '');
$primaryCtaText = trim((string) ($headerMeta['primary_cta_text'] ?? ''));
$primaryCtaUrl = cmsMenuUrl($headerMeta['primary_cta_url'] ?? '');
$secondaryCtaText = trim((string) ($headerMeta['secondary_cta_text'] ?? ''));
$secondaryCtaUrl = cmsMenuUrl($headerMeta['secondary_cta_url'] ?? '');

$mrdata = $thmdata;
$data = $erpsdata;
?>
<style>
@keyframes slideInfinite {
    0% { transform: translateX(100%); }
    100% { transform: translateX(-100%); }
}
.animate-slide {
    animation: slideInfinite 20s linear infinite;
}
.animate-slide:hover {
    animation-play-state: paused;
}
.bg-blue-main .agra-top-header-ctas {
    list-style: none;
    padding-left: 0;
    margin: 0;
}
</style>

<?php include __DIR__ . '/enquiry-popup.php'; ?>

<div class="bg-blue-main p-2 px-4 lg:px-10 lg:flex hidden justify-between items-center text-[12px]">
    <div>
        <?php if ($headerPhone !== ''): ?>
        <a href="tel:<?= htmlspecialchars(preg_replace('/\s+/', '', $headerPhone)) ?>" class="gap-1 flex items-center text-white transition-all whitespace-nowrap">
            <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.7875 19.5793C15.8778 19.5793 13.991 19.1631 12.1271 18.3308C10.2632 17.4985 8.56736 16.3181 7.03958 14.7897C5.51181 13.2613 4.33175 11.5655 3.49942 9.7022C2.66708 7.83892 2.25061 5.95212 2.25 4.04178C2.25 3.76678 2.34167 3.53762 2.525 3.35428C2.70833 3.17095 2.9375 3.07928 3.2125 3.07928H6.925C7.13889 3.07928 7.32986 3.15201 7.49792 3.29745C7.66597 3.4429 7.76528 3.61462 7.79583 3.81262L8.39167 7.02095C8.42222 7.2654 8.41458 7.47165 8.36875 7.6397C8.32292 7.80776 8.23889 7.9529 8.11667 8.07512L5.89375 10.321C6.19931 10.8862 6.562 11.4323 6.98183 11.959C7.40167 12.4858 7.86397 12.994 8.36875 13.4835C8.84236 13.9571 9.33889 14.3965 9.85833 14.8016C10.3778 15.2068 10.9278 15.5771 11.5083 15.9126L13.6625 13.7585C13.8 13.621 13.9797 13.518 14.2015 13.4495C14.4233 13.3811 14.6409 13.3618 14.8542 13.3918L18.0167 14.0335C18.2306 14.0946 18.4062 14.2055 18.5438 14.3662C18.6812 14.5269 18.75 14.7063 18.75 14.9043V18.6168C18.75 18.8918 18.6583 19.121 18.475 19.3043C18.2917 19.4876 18.0625 19.5793 17.7875 19.5793Z" fill="white"/>
            </svg>
            <?= htmlspecialchars($headerPhone) ?>
        </a>
        <?php endif; ?>
    </div>
    <div class="overflow-hidden sm:w-[60%]">
        <p class="flex items-center justify-between animate-slide sm:gap-0 gap-10 text-white">
            <?= htmlspecialchars($scrollText) ?>
        </p>
    </div>
    <div class="hidden sm:block">
        <ul class="agra-top-header-ctas flex items-center gap-4 sm:w-[30%] list-none pl-0 m-0">
            <?php if ($primaryCtaUrl !== ''): ?>
            <li>
                <a href="<?= htmlspecialchars($primaryCtaUrl) ?>" class="gap-1 flex items-center text-white transition-all whitespace-nowrap group" target="_blank" rel="noopener">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M15.5 12.3293L11.5 8.32928M15.5 12.3293L11.5 16.3293M15.5 12.3293H5.5M10.5 21.3293C11.6819 21.3293 12.8522 21.0965 13.9442 20.6442C15.0361 20.1919 16.0282 19.529 16.864 18.6932C17.6997 17.8575 18.3626 16.8654 18.8149 15.7734C19.2672 14.6815 19.5 13.5112 19.5 12.3293C19.5 11.1474 19.2672 9.97706 18.8149 8.88513C18.3626 7.7932 17.6997 6.80105 16.864 5.96532C16.0282 5.1296 15.0361 4.46666 13.9442 4.01437C12.8522 3.56208 11.6819 3.32928 10.5 3.32928" class="transition-all group-hover:stroke-red-500" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <?= htmlspecialchars($primaryCtaText) ?>
                </a>
            </li>
            <?php endif; ?>
            <?php if ($secondaryCtaUrl !== '' && $secondaryCtaUrl !== '#'): ?>
            <li>
                <a href="<?= htmlspecialchars($secondaryCtaUrl) ?>" class="gap-1 flex items-center text-white transition-all whitespace-nowrap group">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M16.5 2.32928V4.32928M7.5 22.3293V20.3293C7.5 19.7989 7.71071 19.2901 8.08579 18.9151C8.46086 18.54 8.96957 18.3293 9.5 18.3293H15.5C16.0304 18.3293 16.5391 18.54 16.9142 18.9151C17.2893 19.2901 17.5 19.7989 17.5 20.3293V22.3293M8.5 2.32928V4.32928" class="stroke-white transition-all group-hover:stroke-red-500" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.5 14.3293C14.1569 14.3293 15.5 12.9861 15.5 11.3293C15.5 9.67243 14.1569 8.32928 12.5 8.32928C10.8431 8.32928 9.5 9.67243 9.5 11.3293C9.5 12.9861 10.8431 14.3293 12.5 14.3293Z" class="stroke-white transition-all group-hover:stroke-red-500" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.5 4.32928H5.5C4.39543 4.32928 3.5 5.22472 3.5 6.32928V20.3293C3.5 21.4339 4.39543 22.3293 5.5 22.3293H19.5C20.6046 22.3293 21.5 21.4339 21.5 20.3293V6.32928C21.5 5.22472 20.6046 4.32928 19.5 4.32928Z" class="stroke-white transition-all group-hover:stroke-red-500" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <?= htmlspecialchars($secondaryCtaText) ?>
                </a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</div>

<div class="bg-blue-main lg:hidden text-[10px] p-2">
    <div class="flex justify-between items-center">
        <?php if ($headerPhone !== ''): ?>
        <a href="tel:<?= htmlspecialchars(preg_replace('/\s+/', '', $headerPhone)) ?>" class="gap-1 flex items-center text-white whitespace-nowrap">
            <?= htmlspecialchars($headerPhone) ?>
        </a>
        <?php endif; ?>
        <ul class="agra-top-header-ctas flex items-center gap-2 list-none pl-0 m-0">
            <?php if ($primaryCtaUrl !== ''): ?>
            <li><a href="<?= htmlspecialchars($primaryCtaUrl) ?>" class="text-white" target="_blank" rel="noopener"><?= htmlspecialchars($primaryCtaText) ?></a></li>
            <?php endif; ?>
            <?php if ($secondaryCtaUrl !== '' && $secondaryCtaUrl !== '#'): ?>
            <li><a href="<?= htmlspecialchars($secondaryCtaUrl) ?>" class="text-white"><?= htmlspecialchars($secondaryCtaText) ?></a></li>
            <?php endif; ?>
        </ul>
    </div>
    <?php if ($scrollText !== ''): ?>
    <div class="overflow-hidden text-[10px] mt-1">
        <p class="animate-slide text-white"><?= htmlspecialchars($scrollText) ?></p>
    </div>
    <?php endif; ?>
</div>

<header class="desktop-header stick-header">
    <nav>
        <div class="logo">
            <a href="<?= site_base_url() ?>"><img src="<?= htmlspecialchars($logoUrl) ?>" class="w-44" alt="<?= cms_image_alt($headerMeta, 'Allenhouse Agra') ?>"></a>
        </div>
        <label for="menubrop" class="bartoggle lg:hidden">≡</label>
        <div class="onMobileEffect" id="onMobileEffect" style="transform: translateX(-100%);">
            <input type="checkbox" id="menubrop">
            <div class="NavMenuLogo bg-white py-5 justify-between px-2 flex">
                <a href="<?= site_base_url() ?>">
                    <img src="<?= htmlspecialchars($logoUrl) ?>" class="w-[200px]" alt="<?= cms_image_alt($headerMeta, 'Allenhouse Agra') ?>">
                </a>
                <button id="closeMenu" type="button" aria-label="Close menu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
                        <path fill="#f11e1e" d="M16 2C8.2 2 2 8.2 2 16s6.2 14 14 14s14-6.2 14-14S23.8 2 16 2m5.4 21L16 17.6L10.6 23L9 21.4l5.4-5.4L9 10.6L10.6 9l5.4 5.4L21.4 9l1.6 1.6l-5.4 5.4l5.4 5.4z"/>
                    </svg>
                </button>
            </div>
        </div>
        <?php renderAgraMenu($navItems); ?>
        <div class="sm:ml-12 sm:mt-[-1px] mt-5 ml-5 desktopEnquiry">
            <button type="button" onclick="openPopup()" id="openPopup" class="px-4 py-2 bg-blue-main text-white">Enquiry Form</button>
        </div>
    </nav>
</header>

<script>
function openPopup() {
    var popup = document.getElementById('popupForm');
    if (popup) {
        popup.classList.remove('hidden');
    }
}
function closePopup() {
    var popup = document.getElementById('popupForm');
    if (popup) {
        popup.classList.add('hidden');
    }
}
</script>