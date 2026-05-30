<?php
include "includes/apis.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://allenhouseagra.com/video-gallery" />
    <title>AllenHouse Agra | Video Gallery</title>
    <?php include "includes/head.php"; ?>
    <style>
        /* Ensure active tab also gets hover effect */
        .tab-link.active:hover {
            background-color: #1e293b; /* Tailwind bg-slate-700 */
            color: white;
        }
    </style>
</head>
<body>

<?php include "includes/header.php"; ?>

<div class="main relative mb-[120px]">
    <div class="main relative mb-[40px] sm:mb-[120px]">
        <div class="bg-center flex items-center text-center h-[300px] common-banner">
            <div>
                <h2 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    Video Gallery
                </h2>
            </div>
            <div class="md:w-[100%]">
                <h2 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    Video Gallery
                </h2>
            </div>
        </div>

        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-xs font-medium sm:text-sm text-blue-main">Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 rtl:rotate-180 text-blue-main" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <p class="text-xs font-medium ms-1 sm:text-sm text-blue-main">Media & Events</p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 rtl:rotate-180 text-blue-main" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="video-gallery" class="text-xs font-medium ms-1 sm:text-sm text-blue-main">Video Gallery</a>
                    </div>
                </li>
            </ol>
        </div>

        <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
            <div class="relative mt-10">
                <div class="tabs sm:mt-10">
                    <div class="flex gap-2 items-center sm:justify-between">
                        <ul class="flex gap-2 border-b sm:gap-4 bg-gray-50 rounded-xl">
                            <li class="flex-1">
                                <a href="#" data-filter="title" class="tab-link active block text-center py-2.5 px-2 sm:text-[16px] text-[10px] sm:py-3 sm:px-5 font-semibold  transition-colors hover:bg-slate-700 hover:text-white">Title</a>
                            </li>
                            <li class="flex-1">
                                <a href="#" data-filter="category" class="tab-link block text-center py-2.5 sm:py-3 px-2 sm:px-5 sm:text-[16px] text-[10px] font-semibold  transition-colors hover:bg-slate-700 hover:text-white">Category</a>
                            </li>
                            <li class="flex-1">
                                <a href="#" data-filter="year" class="tab-link block text-center py-2.5 sm:py-3 px-2 sm:px-5 sm:text-[16px] text-[10px] font-semibold  transition-colors hover:bg-slate-700 hover:text-white">Year</a>
                            </li>
                        </ul>
                        <select id="yearFilter" class="bg-gray-100 border-none px-4 py-2 rounded-lg text-sm"><option value="">All Years</option></select>
                        <input type="text" id="searchInput" class="bg-gray-100 w-[50%] border-b text-gray-900 sm:text-[16px] text-[10px] outline-none focus:ring-0 block px-5 py-2 rounded-lg" placeholder="Search" />
                    </div>

                    <div id="videoGrid" class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-3 mt-5"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
<?php include "includes/foot.php"; ?>


<script>
let allVideos = [];
let currentFilter = 'title';
let currentSearch = '';
let currentYear = '';

function getYouTubeEmbedUrl(url) {
    if (!url) return null;
    let match = url.match(/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\s&]+)/);
    if (match) return `https://www.youtube.com/embed/${match[1]}`;
    match = url.match(/youtube\.com\/shorts\/([^\s?]+)/);
    if (match) return `https://www.youtube.com/embed/${match[1]}`;
    if (url.includes('/embed/')) return url;
    return null;
}

function escapeHtml(str) {
    if (!str) return '';
    return str.replace(/[&<>]/g, function(m) {
        if (m === '&') return '&amp;';
        if (m === '<') return '&lt;';
        if (m === '>') return '&gt;';
        return m;
    });
}

function renderVideos(videos) {
    const container = document.getElementById('videoGrid');
    if (!container) return;
    if (videos.length === 0) {
        container.innerHTML = '<p class="text-center text-gray-500 col-span-full">No videos found.</p>';
        return;
    }
    let html = '';
    for (const item of videos) {
        const videoUrl = (item.medias && item.medias[0] && item.medias[0].urls) || '';
        if (!videoUrl) {
            continue;
        }
        const embedUrl = getYouTubeEmbedUrl(videoUrl);
        if (!embedUrl) {
            console.warn('Skipping render: invalid YouTube URL', videoUrl);
            continue;
        }
        const date = new Date(item.date);
        if (isNaN(date.getTime())) {
            console.warn('Skipping render: invalid date', item.date);
            continue;
        }
        const day = date.getDate();
        const month = date.toLocaleString('default', { month: 'short' });
        const year = date.getFullYear();

        html += `
            <div class="w-full mx-auto bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
                <iframe class="w-full rounded-t-lg" height="240" src="${embedUrl}" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen></iframe>
                <div class="relative flex flex-col justify-between p-1 sm:p-4">
                    <div class="flex gap-4">
                        <div class="w-[30%]">
                            <div class="bg-blue-main text-white text-center rounded-t-lg p-1 font-bold text-[18px]">${year}</div>
                            <div class="text-center font-bold text-[24px] text-[#D9A414] rounded-b-lg border border-gray-300">
                                ${day}<br><span class="text-[#223B71] text-[14px]">${month}</span>
                            </div>
                        </div>
                        <div class="w-[70%]">
                            <div class="text-blue-main text-[1rem] font-bold m-2 line-clamp-2">${escapeHtml(item.title || '')}</div>
                            <hr>
                            <div class="flex gap-2 text-[9px] text-[#3B3B3B] m-2">
                                <div>Category: <strong>${escapeHtml(item.type || item.galleryType || 'General')}</strong></div>
                                <div>Video(s): <strong>${item.medias?.length || 1}</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
    container.innerHTML = html;
    console.log(`Rendered ${videos.length} videos.`);
}

function filterAndRender() {
    let filtered = filterGalleryItemsByYear(allVideos, currentYear);
    if (currentSearch.trim() !== '') {
        const term = currentSearch.toLowerCase();
        filtered = filtered.filter(video => {
            if (currentFilter === 'title') {
                return (video.title || '').toLowerCase().includes(term);
            } else if (currentFilter === 'category') {
                return (video.type || video.galleryType || '').toLowerCase().includes(term);
            } else if (currentFilter === 'year') {
                return String(galleryItemYear(video) || '').includes(term);
            }
            return true;
        });
    }
    renderVideos(filtered);
}

async function loadVideoGalleries() {
    try {
        allVideos = await fetchCmsGalleriesSubType(CMS_GALLERY_SUBTYPE.video);
        populateGalleryYearSelect(document.getElementById('yearFilter'), allVideos);
        filterAndRender();
    } catch (error) {
        console.error('Error loading video galleries:', error);
        document.getElementById('videoGrid').innerHTML = '<p class="text-center text-red-500 col-span-full">Failed to load videos. Please try again later.</p>';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    loadVideoGalleries();

    const yearSelect = document.getElementById('yearFilter');
    if (yearSelect) {
        yearSelect.addEventListener('change', (e) => {
            currentYear = e.target.value;
            filterAndRender();
        });
    }
    
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            currentSearch = e.target.value;
            filterAndRender();
        });
    }
    
    const tabLinks = document.querySelectorAll('.tab-link');
    tabLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const filter = link.getAttribute('data-filter');
            if (filter) {
                currentFilter = filter;
                tabLinks.forEach(l => l.classList.remove('bg-slate-700', 'text-white'));
                link.classList.add('bg-slate-700', 'text-white');
                filterAndRender();
            }
        });
        if (link.getAttribute('data-filter') === 'title') {
            link.classList.add('bg-slate-700', 'text-white');
        }
    });
});
</script>
</body>
</html>