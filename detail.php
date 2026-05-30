<?php
include "includes/apis.php";

$blogSlug = $_GET['slug'] ?? null;

if (!$blogSlug) {
    echo "No blog slug provided.";
    exit;
}

// ✅ FIX: Get raw blog data from the same cache structure that works for other pages
$rawBlogData = $GLOBALS['api_cache']['blogData'] ?? [];
$allBlogs = [];

// ✅ Multiple extraction paths to handle any nested structure
if (isset($rawBlogData['data']['data']) && is_array($rawBlogData['data']['data'])) {
    $allBlogs = $rawBlogData['data']['data'];
} elseif (isset($rawBlogData['data']) && is_array($rawBlogData['data'])) {
    $allBlogs = $rawBlogData['data'];
} elseif (is_array($rawBlogData)) {
    $allBlogs = $rawBlogData;
}

// ✅ Find current blog by slug
$currentBlog = null;
foreach ($allBlogs as $blog) {
    $slug = $blog['slug'] ?? $blog['blog_slug'] ?? '';
    if ($slug === $blogSlug) {
        $currentBlog = $blog;
        break;
    }
}

if (!$currentBlog) {
    echo "Blog not found.";
    exit;
}

// ✅ Helper functions for safe extraction
function getBlogTitle($blog) {
    // Try different possible title keys
    return $blog['title'] ?? $blog['post_title'] ?? $blog['heading'] ?? $blog['main_title'] ?? 'Untitled';
}

function getBlogImage($blog) {
    if (!empty($blog['media']['urls'])) return $blog['media']['urls'];
    if (!empty($blog['image_url'])) return $blog['image_url'];
    return '';
}

function formatBlogDate($dateString) {
    if (empty($dateString)) return '';
    $timestamp = strtotime($dateString);
    return $timestamp ? date('d F Y', $timestamp) : '';
}

// ✅ Get other blogs (excluding current, and only those with valid titles)
$otherBlogs = [];
foreach ($allBlogs as $blog) {
    $slug = $blog['slug'] ?? $blog['blog_slug'] ?? '';
    if ($slug === $blogSlug) continue;
    if (empty(getBlogTitle($blog))) continue;
    $otherBlogs[] = $blog;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://allenhouseagra.com/blog/<?= urlencode($blogSlug) ?>">
    <title><?= htmlspecialchars($currentBlog['meta_title'] ?? getBlogTitle($currentBlog)) ?></title>
    <meta name="description" content="<?= htmlspecialchars($currentBlog['meta_description'] ?? strip_tags($currentBlog['description'] ?? '')) ?>">
    <?php include "includes/head.php"; ?>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    <style>
        .ql-editor { height: auto !important; padding: 0 !important; white-space: normal !important; }
        .capitalize { text-transform: capitalize; }
        .ql-editor img { max-width: 100%; height: auto; }
    </style>
</head>
<body>

<?php include "includes/header.php"; ?>

<div class="main relative sm:top-[20px] mb:[40px] sm:mb-[120px] mx-0 sm:mx-2">
    <div class="mt-8 mx-4 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-4">

        <!-- Category -->
        <div class="text-blue-main text-[12px] tracking-[2px]">
            CATEGORY:
            <?php if (!empty($currentBlog['categories']) && is_array($currentBlog['categories'])): ?>
                <?php $total = count($currentBlog['categories']); ?>
                <?php foreach ($currentBlog['categories'] as $idx => $cat): ?>
                    <strong class="capitalize"><?= htmlspecialchars($cat['categoryname'] ?? '') ?></strong><?= $idx < $total-1 ? ' ,' : '' ?>
                <?php endforeach; ?>
            <?php else: ?>
                <strong>General</strong>
            <?php endif; ?>
        </div>

        <!-- ✅ Title - now uses safe function -->
        <h1 class="sm:text-[52px] md:leading-[55px] leading-[33px] mb-[10px] text-[28px] font-[600] sm:font-[700] text-blue-main">
            <?= htmlspecialchars(getBlogTitle($currentBlog)) ?>
        </h1>

        <!-- Date -->
        <div class="text-[#172B4D] mb-1">
            Published on <strong><?= formatBlogDate($currentBlog['created_at'] ?? $currentBlog['date'] ?? '') ?></strong>
        </div>

        <!-- Tags -->
        <div class="text-[#172B4D] mb-1">
            Tags:
            <strong>
                <?php if (!empty($currentBlog['tag']) && is_array($currentBlog['tag'])): ?>
                    <?= htmlspecialchars(implode(', ', array_column($currentBlog['tag'], 'tagname'))) ?>
                <?php else: ?>
                    No tags
                <?php endif; ?>
            </strong>
        </div>

        <!-- Featured Image -->
        <?php $featuredImage = getBlogImage($currentBlog); ?>
        <?php if ($featuredImage): ?>
            <img src="<?= htmlspecialchars($featuredImage) ?>" alt="Blog Image" class="w-[100%] rounded-lg mb-4 object-cover">
        <?php endif; ?>

        <!-- Main Content -->
        <div class="sm:flex sm:mt-10 mt-5 gap-5">
            <div class="sm:w-[100%]">
                <div class="ql-snow">
                    <div class="ql-editor">
                        <?= $currentBlog['description'] ?? '' ?>
                    </div>
                </div>

                <!-- Additional details -->
                <?php if (!empty($currentBlog['blogdetails']) && is_array($currentBlog['blogdetails'])): ?>
                    <?php foreach ($currentBlog['blogdetails'] as $detail): ?>
                        <h2 class="text-xl font-semibold mt-6 mb-2 text-blue-main"><?= htmlspecialchars($detail['title'] ?? '') ?></h2>
                        <?php if (!empty($detail['media']['urls'])): ?>
                            <img src="<?= htmlspecialchars($detail['media']['urls']) ?>" alt="Detail Image" class="w-full rounded mb-4">
                        <?php endif; ?>
                        <div class="ql-snow">
                            <div class="ql-editor">
                                <?= $detail['description'] ?? '' ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Other Blogs Carousel -->
<?php if (!empty($otherBlogs)): ?>
<div class="bg-[#F9F9F9] mt-5 sm:mt-10">
    <h1 class="sm:text-[36px] text-[24px] block font-[700] text-[#053B7A] text-center hr-line relative leading-9 p-5 sm:p-10">
        Other Blogs
    </h1>
    <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-4">
        <div class="relative w-full glide-11">
            <div class="overflow-hidden" data-glide-el="track">
                <ul class="relative w-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap">
                    <?php foreach ($otherBlogs as $blog): 
                        $blogTitle = htmlspecialchars(getBlogTitle($blog));
                        $blogSlugForLink = htmlspecialchars($blog['slug'] ?? $blog['blog_slug'] ?? '');
                        $blogDate = formatBlogDate($blog['created_at'] ?? $blog['date'] ?? '');
                        $blogImage = getBlogImage($blog);
                        $blogDesc = htmlspecialchars(substr(strip_tags($blog['description'] ?? ''), 0, 140));
                    ?>
                        <li class="p-4 pb-8">
                            <div class="max-w-sm bg-white border border-gray-200 rounded-[20px] shadow hover:shadow-lg transition-shadow duration-300">
                                <?php if ($blogImage): ?>
                                    <img class="rounded-t-[20px] w-full h-48 object-cover" src="<?= $blogImage ?>" alt="<?= $blogTitle ?>">
                                <?php endif; ?>
                                <div class="p-4">
                                    <div class="text-[14px] text-gray-600"><?= $blogDate ?></div>
                                    <div class="font-[700] text-[18px] text-blue-main mt-2"><?= $blogTitle ?></div>
                                  
                                    <a href="blog/<?= urlencode($blogSlugForLink) ?>">
                                        <button class="text-blue-main text-[16px] flex items-center my-3 font-[600] gap-2 group">
                                            <span>View More</span>
                                            <svg width="16" height="16" viewBox="0 0 14 15" fill="none" class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.65008 3.91156C9.9831 3.91156 10.2531 4.18153 10.2531 4.51456L10.2531 9.63112C10.2531 9.96414 9.9831 10.2341 9.65008 10.2341C9.31705 10.2341 9.04708 9.96414 9.04708 9.63112L9.04708 5.97031L4.10714 10.9103C3.87165 11.1457 3.48986 11.1457 3.25438 10.9103C3.01889 10.6748 3.01889 10.293 3.25438 10.0575L8.19432 5.11755L4.53352 5.11755C4.20049 5.11755 3.93052 4.84758 3.93052 4.51456C3.93052 4.18153 4.20049 3.91156 4.53352 3.91156L9.65008 3.91156Z" fill="#223B71"/>
                                            </svg>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="absolute left-0 hidden sm:flex items-center justify-between w-full h-0 px-4 top-1/2 transform -translate-y-1/2" data-glide-el="controls">
                <button class="inline-flex items-center relative sm:right-[66px] justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir="<">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
                <button class="inline-flex items-center relative sm:left-[66px] justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir=">">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
    <div class="text-center text-gray-500 py-10">No other blogs available at the moment.</div>
<?php endif; ?>

<?php include "includes/footer.php"; ?>
<?php include "includes/foot.php"; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.2/glide.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var slides = document.querySelectorAll('.glide-11 .glide__slide, .glide-11 [data-glide-el="track"] li');
        if (slides.length > 0) {
            var glide03 = new Glide('.glide-11', {
                type: 'carousel',
                focusAt: 'center',
                perView: 3,
                autoplay: 3000,
                animationDuration: 700,
                gap: 24,
                breakpoints: { 1024: { perView: 2 }, 640: { perView: 1 } }
            });
            glide03.mount();
        }
    });
</script>
</body>
</html>