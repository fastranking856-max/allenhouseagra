<?php
include "includes/apis.php";
$page = "awards";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://allenhouseagra.com/awards" />
    <title>Awards & Recognitions | AllenHouse Agra</title>
    <?php include "includes/head.php" ?>

    <style>
        /* Agra Campus specific branding if different from Ghaziabad */
        .active-tab {
            background-color: #223B71 !important; /* Agra Corporate Blue */
            color: #ffffff !important;
        }
        .award-card {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        .award-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body class="bg-gray-50">

    <?php include "includes/header.php" ?>

    <div class="main relative mb-[40px] sm:mb-[120px]">
        <div class="bg-center flex items-center text-left h-[300px] common-banner">
            <div class="w-full">
                <h1 class="text-[32px] sm:hidden block font-[800] text-white pl-4 mb-5 hr-line relative uppercase">
                    Awards
                </h1>
                <h1 class="sm:text-[32px] sm:block hidden font-[800] text-white text-left ml-[7rem] hr-line relative uppercase">
                    Agra Campus Awards
                </h1>
            </div>
        </div>

        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="/" class="text-xs font-medium text-blue-main uppercase">Home</a>
                </li>
                <svg class="w-3 h-3 text-blue-main mx-1" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                <li class="text-xs font-medium text-blue-main uppercase">Achievements</li>
                <svg class="w-3 h-3 text-blue-main mx-1" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                <li class="text-xs font-medium text-blue-main uppercase">Awards</li>
            </ol>
        </div>

        <div class="mt-8 mx-4 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5">
            <div class="tabs">
                <div class="flex flex-col sm:flex-row items-center gap-4 sm:justify-between border-b pb-4">
                    <ul class="flex gap-2 bg-white p-1 rounded-xl shadow-sm">
                        <li>
                            <a href="javascript:void(0)" class="tab-link active-tab block py-2 px-6 font-bold rounded-lg text-xs uppercase tracking-widest">Hall of Fame</a>
                        </li>
                    </ul>
                    <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-[50%]">
                        <select id="yearFilter" class="bg-white w-full sm:w-auto border border-gray-200 px-5 py-3 outline-none rounded-xl text-sm shadow-sm"><option value="">All Years</option></select>
                        <input type="text" id="agraSearch" class="bg-white w-full border border-gray-200 px-5 py-3 outline-none rounded-xl text-sm shadow-sm focus:ring-2 focus:ring-blue-main/20" placeholder="Search Agra awards..." />
                    </div>
                </div>

                <section class="mt-10">
                    <div id="agraGalleryGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        </div>
                </section>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>

    <script>
        let agraAwards = [];
        let currentYear = '';
        let searchTerm = '';

        async function fetchAgraAwards() {
            try {
                const all = await fetchAllCmsGalleriesByBranch();
                agraAwards = all.filter(isGalleryAwardItem);
                populateGalleryYearSelect(document.getElementById('yearFilter'), agraAwards);
                applyAwardFilters();
            } catch (err) {
                console.error("Agra API Error:", err);
            }
        }

        function applyAwardFilters() {
            let list = filterGalleryItemsByYear(agraAwards, currentYear);
            if (searchTerm.trim()) {
                const term = searchTerm.toLowerCase().trim();
                list = list.filter(function(item) {
                    return (item.achievementtitle || item.title || '').toLowerCase().includes(term);
                });
            }
            renderAgraAwards(list);
        }

        function renderAgraAwards(data) {
            const container = document.getElementById('agraGalleryGrid');
            container.innerHTML = '';

            if (data.length === 0) {
                container.innerHTML = '<div class="col-span-full py-20 text-center text-gray-400">No award records found for AllenHouse Agra.</div>';
                return;
            }

            data.forEach(item => {
                const cover = item.medias?.find(m => m.pivot?.is_cover === "1") || item.medias?.[0] || {};
                const img = cover.urls || 'https://via.placeholder.com/600x400?text=Agra+Award';
                
                const d = new Date(item.achevementdate || item.date);
                const day = d.getDate();
                const month = d.toLocaleString('default', { month: 'short' });
                const year = d.getFullYear();

                const card = `
                <div class="award-card flex flex-col bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden h-full">
                    <div class="relative aspect-video">
                        <img src="${img}" alt="${item.achievementtitle}" class="w-full h-full object-cover" />
                        <div class="absolute bottom-0 right-0 bg-blue-main text-white px-4 py-1 text-[10px] font-bold uppercase tracking-widest">
                            Agra Campus
                        </div>
                    </div>
                    
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex gap-4 mb-4">
                            <div class="w-14 text-center">
                                <div class="bg-blue-main text-white text-[10px] font-bold py-1 rounded-t-lg">${year}</div>
                                <div class="border border-t-0 rounded-b-lg py-2 bg-gray-50">
                                    <div class="text-xl font-black text-blue-main">${day}</div>
                                    <div class="text-[9px] font-bold text-gray-400 uppercase">${month}</div>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-blue-main font-bold text-base uppercase line-clamp-2">${item.achievementtitle}</h3>
                            </div>
                        </div>

                        <div class="mt-auto">
                            <a href="achievement-gallery?id=${item.id}" class="inline-flex items-center gap-2 text-blue-main font-bold text-xs uppercase tracking-widest hover:text-orange-500 transition-colors">
                                Explore Gallery
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3" stroke-width="2"/></svg>
                            </a>
                        </div>
                    </div>
                </div>`;
                container.insertAdjacentHTML('beforeend', card);
            });
        }

        document.getElementById('agraSearch').addEventListener('input', function(e) {
            searchTerm = e.target.value;
            applyAwardFilters();
        });
        document.getElementById('yearFilter').addEventListener('change', function(e) {
            currentYear = e.target.value;
            applyAwardFilters();
        });

        window.addEventListener('DOMContentLoaded', fetchAgraAwards);
    </script>
</body>
</html>
