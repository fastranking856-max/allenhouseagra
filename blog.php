<?php
include_once "includes/apis.php";

// Get raw cached API response for blogs
$rawBlogData = $GLOBALS['api_cache']['blogData'] ?? [];
$blogItems = [];

// Extract blog items from the standard paginated response: { data: { data: [...] } } or { data: [...] }
if (isset($rawBlogData['data']['data']) && is_array($rawBlogData['data']['data'])) {
    $blogItems = $rawBlogData['data']['data'];
} elseif (isset($rawBlogData['data']) && is_array($rawBlogData['data'])) {
    $blogItems = $rawBlogData['data'];
} elseif (is_array($rawBlogData) && !empty($rawBlogData)) {
    $blogItems = $rawBlogData;
}

// Debug: Show the extracted items (remove after confirming)
if (isset($_GET['debug']) && $_GET['debug'] == '1') {
    echo '<pre>Extracted Blog Items: ' . print_r($blogItems, true) . '</pre>';
    exit;
}

// Helper functions (same as detail.php)
function getBlogTitle($item) {
    return $item['title'] ?? $item['post_title'] ?? $item['heading'] ?? $item['main_title'] ?? 'Untitled';
}
function getBlogSlug($item) {
    return $item['slug'] ?? $item['blog_slug'] ?? $item['id'] ?? '';
}
function getBlogImage($item) {
    if (!empty($item['media']['urls'])) return $item['media']['urls'];
    if (!empty($item['image_url'])) return $item['image_url'];
    if (!empty($item['media_url'])) return $item['media_url'];
    return '';
}
function getBlogDate($item) {
    $date = $item['created_at'] ?? $item['date'] ?? '';
    if (empty($date)) return '';
    $timestamp = strtotime($date);
    return $timestamp ? date('d F Y', $timestamp) : '';
}
function getBlogDescription($item) {
    return $item['description'] ?? $item['excerpt'] ?? '';
}

// Map each blog to a clean structure
$mappedBlogs = [];
foreach ($blogItems as $item) {
    $mappedBlogs[] = [
        'title'       => getBlogTitle($item),
        'slug'        => getBlogSlug($item),
        'date'        => getBlogDate($item),
        'image_url'   => getBlogImage($item),
        'description' => getBlogDescription($item),
        '_raw'        => $item,
    ];
}
$blogItems = $mappedBlogs;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://allenhouseagra.com/blog" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include "includes/meta.php"; ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://allenhouseagra.com/" },
        { "@type": "ListItem", "position": 2, "name": "Blog", "item": "https://allenhouseagra.com/blog" }
      ]
    }
    </script>
    <?php include "includes/head.php"; ?>
    <style>
        .searchInputWrapper { background:#ECECEC; border-radius:10px; display:flex; align-items:center; }
        .searchInputIcon { margin-left: 12px; color:#777; }
        .searchInput { flex:1; background:transparent; border:none; padding:10px 12px 10px 0; outline:none; }
    </style>
</head>
<body>

<?php include "includes/header.php"; ?>

<div class="main relative sm:top-[20px] mb:[40px] sm:mb-[120px] mx-0 sm:mx-2">
    <div class="mt-8 mx-4 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-4">

        <div class="sm:mt-10 mt-5 relative">
            <h1 class="text-[32px] sm:hidden block font-[700] text-blue-main text-center mb-5 hr-line relative leading-9">Our Latest Blogs</h1>
            <div class="md:w-[100%]">
                <h1 class="sm:text-[32px] sm:block hidden font-[700] text-blue-main text-center sm:mb-1 hr-line relative leading-9">Our Latest Blogs</h1>

                <!-- Search -->
                <div class="mx-auto sm:mt-10 mt-5 md:w-[50%]">
                    <div class="searchInputWrapper">
                        <i class="searchInputIcon fa fa-search"></i>
                        <input class="searchInput" type="text" placeholder="Search">
                    </div>
                </div>

                <div id="noResults" class="text-center text-red-600 text-lg mt-6 hidden">No blog posts found matching your search.</div>

                <div class="grid grid-cols-1 md:grid-cols-3 sm:my-10 my-5 sm:grid-cols-2 mx-auto gap-4 gap-y-10" id="blogList">
                    <?php if (empty($blogItems)): ?>
                        <p class="text-gray-500 col-span-full text-center">No blog posts available at the moment.</p>
                    <?php else: ?>
                        <?php foreach ($blogItems as $blog): ?>
                            <div class="blog-card max-w-sm bg-white border border-gray-200 rounded-[20px] shadow hover:shadow-lg transition-shadow duration-300"
                                 data-title="<?= htmlspecialchars(strtolower($blog['title'])) ?>"
                                 data-date="<?= htmlspecialchars(strtolower($blog['date'])) ?>"
                                 data-description="<?= htmlspecialchars(strtolower(strip_tags($blog['description']))) ?>">
                                <a href="blog/<?= urlencode($blog['slug']) ?>" class="block">
                                    <?php if (!empty($blog['image_url'])): ?>
                                        <img class="rounded-t-[20px] w-full md:h-[250px] object-cover" 
                                             src="<?= htmlspecialchars($blog['image_url']) ?>" 
                                             alt="<?= htmlspecialchars($blog['title']) ?>">
                                    <?php else: ?>
                                        <div class="w-full md:h-[250px] bg-gray-200 rounded-t-[20px] flex items-center justify-center text-gray-400">No image</div>
                                    <?php endif; ?>
                                    <div class="p-4">
                                        <?php if (!empty($blog['date'])): ?>
                                            <div class="text-[14px] text-gray-600"><?= htmlspecialchars($blog['date']) ?></div>
                                        <?php endif; ?>
                                        <div class="font-[700] text-[22px] text-blue-main mt-2"><?= htmlspecialchars($blog['title']) ?></div>
                                        <button class="text-blue-main text-[16px] flex items-center my-3 font-[600] gap-2 hover:cursor-pointer group">
                                            View More
                                            <svg class="opacity-0 group-hover:opacity-100 transition-opacity duration-300" width="16" height="16" viewBox="0 0 14 15" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.65008 3.91156C9.9831 3.91156 10.2531 4.18153 10.2531 4.51456L10.2531 9.63112C10.2531 9.96414 9.9831 10.2341 9.65008 10.2341C9.31705 10.2341 9.04708 9.96414 9.04708 9.63112L9.04708 5.97031L4.10714 10.9103C3.87165 11.1457 3.48986 11.1457 3.25438 10.9103C3.01889 10.6748 3.01889 10.293 3.25438 10.0575L8.19432 5.11755L4.53352 5.11755C4.20049 5.11755 3.93052 4.84758 3.93052 4.51456C3.93052 4.18153 4.20049 3.91156 4.53352 3.91156L9.65008 3.91156Z" fill="#223B71"/>
                                            </svg>
                                        </button>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
<?php include "includes/foot.php"; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.searchInput');
    const blogCards = document.querySelectorAll('.blog-card');
    const noResults = document.getElementById('noResults');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase();
            let matchCount = 0;
            blogCards.forEach(card => {
                const title = card.dataset.title || '';
                const date = card.dataset.date || '';
                const desc = card.dataset.description || '';
                if (title.includes(query) || date.includes(query) || desc.includes(query)) {
                    card.style.display = 'block';
                    matchCount++;
                } else {
                    card.style.display = 'none';
                }
            });
            if (matchCount === 0) {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        });
    }
});
</script>
</body>
</html>