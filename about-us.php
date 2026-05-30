<?php 
include "includes/apis.php";

$sections = $about_us['data']['sections'] ?? [];
$page_title = $about_us['data']['title'] ?? "About Us";
$meta_desc = $about_us['data']['meta_description'] ?? "";
$meta_keys = $about_us['data']['meta_keywords'] ?? "";

// Section helpers
$s_hero      = $sections[0] ?? null;
$s_welcome   = $sections[1] ?? null;
$s_vision    = $sections[2] ?? null;
$s_mission   = $sections[3] ?? null;
$s_principal = $sections[4] ?? null;
$s_carousel1 = $sections[5] ?? null;
$s_carousel2 = $sections[6] ?? null;
$s_carousel3 = $sections[7] ?? null;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://allenhouseagra.com/about-us" />
    <?php include "includes/head.php" ?>
    <title><?= htmlspecialchars($page_title) ?></title>
    <?php if (!empty($meta_desc)): ?>
    <meta name="description" content="<?= htmlspecialchars($meta_desc) ?>">
    <?php endif; ?>
    <?php if (!empty($meta_keys)): ?>
    <meta name="keywords" content="<?= htmlspecialchars($meta_keys) ?>">
    <?php endif; ?>
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "https://allenhouseagra.com/"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "About Us",
      "item": "https://allenhouseagra.com/about-us"
    }
  ]
}
</script>
    <?php include "includes/meta.php" ?>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative top-[10px]">
        <div class="bg-center flex items-center text-center h-[300px] common-banner ">
            <div>
                <h1
                    class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    About Us
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1
                    class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    About Us
                </h1>
            </div>
        </div>
        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="about-us" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">About Us</a>
                    </div>
                </li>
            </ol>
        </div>

        <?php if ($s_welcome): ?>
        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-4 sm:py-5 py-0 sm:p-20 p-0">
            <div class="text-center">
                <?php if (!empty($s_welcome['content_heading'])): ?>
                    <?= $s_welcome['content_heading'] ?>
                <?php endif; ?>
                <?php if (!empty($s_welcome['content'])): ?>
                <div class="ql-snow mt-4">
                    <div class="ql-editor">
                        <?= $s_welcome['content'] ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($s_vision && !empty($s_vision['columns'])): 
            $vis_text  = $s_vision['columns'][0] ?? null;
            $vis_image = $s_vision['columns'][1] ?? null;
        ?>
        <div
            class="mt-[-80px] 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-4 sm:mt-3 bg-center sm:mb-10 mb-0 sm:px-20 p-0 relative">

            <div class="sm:flex gap-10 items-center">
                <div class="pb-0 sm:pt-0 pt-[100px] sm:w-[50%]">
                    <div class="sm:text-left text-center">
                        <?php if (!empty($vis_text['content_heading'])): ?>
                            <?= $vis_text['content_heading'] ?>
                        <?php endif; ?>
                        <?php if (!empty($vis_text['content'])): ?>
                        <div class="ql-snow">
                            <div class="ql-editor">
                                <?= $vis_text['content'] ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="sm:w-[50%] ">
                    <?php if (!empty($vis_image['image_url'])): ?>
                    <img src="<?= htmlspecialchars(cmsAssetUrl($vis_image['image_url'])) ?>" alt="<?= htmlspecialchars($vis_text['title'] ?? 'Vision') ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($s_mission && !empty($s_mission['columns'])): 
            $mis_image = $s_mission['columns'][0] ?? null;
            $mis_text  = $s_mission['columns'][1] ?? null;
        ?>
        <div
            class="mt-[-80px] 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-4 sm:mt-0 bg-center sm:mb-10 mb-0 sm:px-20 p-0 relative">

            <div class="flex sm:flex-row flex-col-reverse  items-center gap-10">
                <div class="sm:w-[50%] ">
                    <?php if (!empty($mis_image['image_url'])): ?>
                    <img src="<?= htmlspecialchars(cmsAssetUrl($mis_image['image_url'])) ?>" alt="<?= htmlspecialchars($mis_text['title'] ?? 'Mission') ?>">
                    <?php endif; ?>
                </div>
                <div class="pb-0 sm:pt-0 pt-[100px] sm:w-[50%]">
                    <div class="sm:text-left text-center">
                        <?php if (!empty($mis_text['content_heading'])): ?>
                            <?= $mis_text['content_heading'] ?>
                        <?php endif; ?>
                        <?php if (!empty($mis_text['content'])): ?>
                        <div class="ql-snow">
                            <div class="ql-editor">
                                <?= $mis_text['content'] ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($s_principal && !empty($s_principal['columns'])): 
            $pr_text  = $s_principal['columns'][0] ?? null;
            $pr_image = $s_principal['columns'][1] ?? null;
        ?>
        <div class="mt-8 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto px-4 sm:px-5">
            <div class="mt-10 relative">
                <div class="sm:flex gap-10">
                    <div class="sm:w-[50%]">
                        <?php if (!empty($pr_text['content_heading'])): ?>
                            <?= $pr_text['content_heading'] ?>
                        <?php endif; ?>
                        <?php if (!empty($pr_text['content'])): ?>
                        <div class="ql-snow">
                            <div class="ql-editor">
                                <?= $pr_text['content'] ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="sm:w-[50%] mt-4">
                        <?php if (!empty($pr_image['image_url'])): ?>
                    <img src="<?= htmlspecialchars(cmsAssetUrl($pr_image['image_url'])) ?>"
                        class="border-[1px] border-gray-100" alt="Principal">
                    <?php endif; ?>
                        <?php if (!empty($pr_image['content'])): ?>
                        <div class="mt-1">
                            <?= $pr_image['content'] ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

      <?php if ($s_carousel1 && !empty($s_carousel1['resolved_content']['items'])): 
    $c1 = $s_carousel1['resolved_content'];
    $c1_items = $c1['items'];
    $c1_desc = $s_carousel1['content'] ?? $c1['content'] ?? '';
    $c1_title = $c1['heading'] ?? '';
?>
<div class="mb-5 ab-cr-bg sm:mt-10 sm:p-4">
    <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto">
        <div class="relative about-carousel1 opne-hide-circle">
            <?php if (!empty($c1_title)): ?>
            <h2 class="text-[30px] font-[700] sm:text-white text-blue-main sm:text-left text-center mt-4 hr-line relative"><?= htmlspecialchars($c1_title) ?></h2>
            <?php endif; ?>
            <div class="overflow-hidden mt-5 mx-4" data-glide-el="track">
                <ul class="glide__slides mt-5 relative w-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                    <?php foreach ($c1_items as $item):
                        $img_url = $item['image_url'];
                        if (strpos($img_url, 'http') !== 0) {
                            $img_url = rtrim(API_BASE_URL, '/') . '/' . ltrim($img_url, '/');
                        }
                    ?>
                    <li class="glide__slide">
                        <img src="<?= htmlspecialchars($img_url) ?>" class="w-full max-w-full m-auto" />
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="absolute left-0 xl:flex hidden items-center justify-between w-full h-0 px-4 top-1/2 hide-circle" data-glide-el="controls">
                <button class="inline-flex items-center relative sm:right-[66px] justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir="<" aria-label="prev slide">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
                <button class="inline-flex items-center relative sm:left-[66px] justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir=">" aria-label="next slide">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
        </div>
        <?php if (!empty($c1_desc)): ?>
        <div class="bg-blue-main px-4 mt-[-140px] pt-[160px] pb-5 text-white">
            <?= $c1_desc ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
       

<?php if ($s_carousel2 && !empty($s_carousel2['resolved_content']['items'])): 
    $c2 = $s_carousel2['resolved_content'];
    $c2_items = $c2['items'];
    $c2_desc = $s_carousel2['content'] ?? '';
    $c2_title = $c2['heading'] ?? '';
?>
<div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto px-4 mb-5">
    <div class="relative about-carousel2 opne-hide-circle">
        <?php if (!empty($c2_title)): ?>
        <h2 class="text-[30px] font-[700] text-blue-main sm:text-left text-center mt-4 hr-line relative">
            <?= htmlspecialchars($c2_title) ?>
        </h2>
        <?php endif; ?>
        <div class="overflow-hidden mt-5" data-glide-el="track">
            <ul class="glide__slides mt-5 relative w-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                <?php foreach ($c2_items as $item):
                    $img_url = $item['image_url'];
                    if (strpos($img_url, 'http') !== 0) {
                        $img_url = rtrim(API_BASE_URL, '/') . '/' . ltrim($img_url, '/');
                    }
                ?>
                <li class="glide__slide">
                    <img src="<?= htmlspecialchars($img_url) ?>" class="w-full max-w-full m-auto" />
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="absolute left-0 xl:flex hidden items-center justify-between w-full h-0 px-4 top-1/2 hide-circle" data-glide-el="controls">
            <button class="inline-flex items-center relative sm:right-[66px] justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir="<" aria-label="prev slide">
                <i class="fa-solid fa-angle-left"></i>
            </button>
            <button class="inline-flex items-center relative sm:left-[66px] justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir=">" aria-label="next slide">
                <i class="fa-solid fa-angle-right"></i>
            </button>
        </div>
    </div>
    <?php if (!empty($c2_desc)): ?>
    <div class="mt-3">
        <?= $c2_desc ?>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>

        <?php if ($s_carousel3 && !empty($s_carousel3['resolved_content']['items'])): 
    $c3 = $s_carousel3['resolved_content'];
    $c3_items = $c3['items'];
    $c3_desc = $s_carousel3['content'] ?? '';
?>
<div class="mb-5 ab-cr-bg pt-5">
    <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto">
        <div class="relative glide-03 opne-hide-circle px-4">
            <div class="overflow-hidden mt-5" data-glide-el="track">
                <ul class="glide__slides mt-5 relative w-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                    <?php foreach ($c3_items as $item):
                        $img_url = $item['image_url'];
                        if (strpos($img_url, 'http') !== 0) {
                            $img_url = rtrim(API_BASE_URL, '/') . '/' . ltrim($img_url, '/');
                        }
                    ?>
                    <li class="glide__slide">
                        <img src="<?= htmlspecialchars($img_url) ?>" class="w-full max-w-full m-auto" />
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="absolute left-0 xl:flex hidden items-center justify-between w-full h-0 px-4 top-1/2 hide-circle" data-glide-el="controls">
                <button class="inline-flex items-center relative sm:right-[66px] justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir="<" aria-label="prev slide">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
                <button class="inline-flex items-center relative sm:left-[66px] justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir=">" aria-label="next slide">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
        </div>
        <?php if (!empty($c3_desc)): ?>
        <div class="bg-blue-main sm:px-0 px-4 sm:mt-5 sm:pt-0 mt-[-140px] pt-[160px] pb-5 text-white">
            <?= $c3_desc ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>

        <div class="bg-center relative mb-10 hidden">
            <div class="relative ab_testimonial sm:pt-5 pt-2 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto px-4 opne-hide-circle">
                <div class="text-center">
                    <h2 class="text-[28px] font-[700] leading-7  text-blue-main">Testimonials</h2>
                </div>
                <div class="overflow-hidden mt-5" data-glide-el="track">
                    <ul
                        class=" mt-5 relative w-full overflow-hidden p-0 pb-5 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                        <li class="mb-4">
                            <div class="text-center">
                                <img src="assets/images/pretti.png" alt=""
                                    class="mb-2 mx-auto rounded-[10px] w-[130px] h-[130px]">
                                <h2 class="font-[700] text-[22px] text-blue-main">Preeti Malhotra</h2>
                                <h3 class="font-[600] text-[18px]">Class 3A</h3>
                            </div>
                            <div class="mt-3">
                                <p class="text-[16px] text-gray-600">
                                    Allenhouse Public School Khalasi Line has consistently supported the development of
                                    my
                                    child's overall personality. The teachers are incredibly supportive,
                                </p>
                                <p class="text-[16px] text-gray-600 moretext">
                                    encouraging, and
                                    caring. My son has made remarkable progress.
                                    I would like to express my gratitude for the ongoing efforts made by the school's
                                    management in embracing innovative teaching methods, learning strategies,
                                    leadership,
                                    and extracurricular activities.
                                    Under the esteemed leadership of Principal Dr. Ruchi Seth ma'am this is truly the
                                    best
                                    school in the city.
                                </p>
                                <a class="moreless-button font-[600] cursor-pointer hover:text-red-600 text-blue-main">Read more</a>
                            </div>
                        </li>
                        <li class="mb-4">
                            <div class="text-center">
                                <img src="assets/images/t2.png" alt=""
                                    class="mb-2 mx-auto rounded-[10px] w-[130px] h-[130px] ">
                                <h2 class="font-[700] text-[22px] text-blue-main">Kapil Raizada & Sanjeevani</h2>
                                <h3 class="font-[600] text-[18px]">Class V</h3>
                            </div>
                            <div class="mt-3">
                                <p class="text-[16px] text-gray-600">
                                    We, as parents, are thrilled to share our outstanding experience with Allen House
                                    School! The team's empathy towards students is truly commendable.
                                </p>
                                <p class="text-[16px] text-gray-600 moretext">
                                    When our child became restless, cranky, and difficult to manage in class, they
                                    skillfully identified the root
                                    cause and addressed it with kindness, understanding, and patience. This approach has
                                    made a profound impact on our child's growth, development, and overall well-being
                                    The school's focus on nurturing each child's unique talent and proficiency is
                                    genuinely
                                    impressive. The engaging and interactive classes have helped our child gain
                                    comprehensive knowledge, confidence, and a love for learning. We are overjoyed to
                                    see
                                    him thrive in various fields, including sports, elocution, and even representing the
                                    school in inter-school events!
                                    We are deeply grateful to the school in all respects
                                    for fostering a supportive, encouraging, and inclusive environment. A special
                                    mention to
                                    the widened vision and involvement of the principal ma'am in nurturing the vision
                                    and
                                    qualities of an individual and getting the best out of each. Keep up the fantastic
                                    work,
                                    Allen House School! Your dedication to shaping young minds and inspiring future
                                    leaders
                                    is truly appreciated!
                                </p>
                                <a class="moreless-button font-[600] cursor-pointer hover:text-red-600 text-blue-main">Read more</a>
                            </div>
                        </li>
                        <li class="mb-4">
                            <div class="text-center">
                                <img src="assets/images/t3.png" alt=""
                                    class="mb-2 mx-auto rounded-[10px] w-[130px] h-[130px] ">
                                <h2 class="font-[700] text-[22px] text-blue-main">Aarush Nigam </h2>
                                <h3 class="font-[600] text-[18px]">Class 8A</h3>
                            </div>
                            <div class="mt-3">
                                <p class="text-[16px] text-gray-600">
                                    Allen House Public School is doing excellent in all the fields especially giving a
                                    lot
                                    of exposure to children. Very nicely planned and organized Academic programme.
                                </p>
                                <p class="text-[16px] text-gray-600 moretext">
                                    Good
                                    efforts by all teachers.
                                    I am very grateful to all teachers, coordinator and Principal.
                                    My child is being groomed very well. I feel that my decision was right in sending my
                                    child to this School. Keep it up! I wish for a great success to Allen House Public
                                    School
                                    Aarush Nigam
                                </p>
                            </div>
                        </li>
                        <li class="mb-4">
                            <div class="text-center">
                                <img src="assets/images/t4.png" alt=""
                                    class="mb-2 mx-auto rounded-[10px] w-[130px] h-[130px] ">
                                <h2 class="font-[700] text-[22px] text-blue-main">Shikhar Singh</h2>
                                <h3 class="font-[600] text-[18px]">Class 8A</h3>
                            </div>
                            <div class="mt-3">
                                <p class="text-[16px] text-gray-600">
                                    Allenhouse Khalasi Lines provides numerous learning opportunities in academics as
                                    well
                                    as in sports. The school faculty is excellent and the teachers are always helpful.
                                </p>
                            </div>
                        </li>
                        <li class="mb-4">
                            <div class="text-center">
                                <img src="assets/images/t5.png" alt=""
                                    class="mb-2 mx-auto rounded-[10px] w-[130px] h-[130px] ">
                                <h2 class="font-[700] text-[22px] text-blue-main">Aarti Jakhodia</h2>
                                <h3 class="font-[600] text-[18px]">Class 6B</h3>
                            </div>
                            <div class="mt-3">
                                <p class="text-[16px] text-gray-600">
                                    I am completely satisfied with the school, its faculty and the extra curriculars
                                    organized regularly. The teachers clear my child's concepts impressively
                                </p>
                                <p class="text-[16px] text-gray-600 moretext">
                                    and he has started participating keenly in sports and other activities.
                                    I have observed positive
                                    improvements and expect to see more results in the near future.
                                </p>
                                <a class="moreless-button font-[600] cursor-pointer hover:text-red-600 text-blue-main">Read more</a>
                            </div>
                        </li>
                        <li class="mb-4">
                            <div class="text-center">
                                <img src="assets/images/t6.png" alt=""
                                    class="mb-2 mx-auto rounded-[10px] w-[130px] h-[130px] ">
                                <h2 class="font-[700] text-[22px] text-blue-main">Mohd. Ashar's Mother</h2>
                                <h3 class="font-[600] text-[18px]">Class 6-C</h3>
                            </div>
                            <div class="mt-3">
                                <p class="text-[16px] text-gray-600">
                                    I'm a proud parent of Mohd. Ashar Class 6-C, I'm really excited to share that my son
                                    has
                                    learnt a lot during the wonderful six years in this prestigious institution.
                                </p>
                                <p class="text-[16px] text-gray-600 moretext">
                                    At
                                    Allenhouse students are encouraged to become independent thinkers and active
                                    learners.
                                    The teachers have a nurturing, professional, and supportive approach, which helps
                                    students achieve good academic results. Apart from academics, the school also lays
                                    emphasis on co-curricular activities which are quintessential for the overall
                                    development of a child. The wide range of activities such as basketball, swimming,
                                    robotics, animation, coding, literary events instill a sense of self confidence and
                                    enthusiasm among children. I'm really glad to see my child as a budding Allenites.
                                </p>
                                <a class="moreless-button font-[600] cursor-pointer hover:text-red-600 text-blue-main">Read more</a>
                            </div>
                        </li>
                        <li class="mb-4">
                            <div class="text-center">
                                <img src="assets/images/t7.png" alt=""
                                    class="mb-2 mx-auto rounded-[10px] w-[130px] h-[130px] ">
                                <h2 class="font-[700] text-[22px] text-blue-main">Karan Agarwal </h2>
                                <h3 class="font-[600] text-[18px]">Class 6-C</h3>
                            </div>
                            <div class="mt-3">
                                <p class="text-[16px] text-gray-600">
                                    I like to take this privilege to congratulate the management and teachers of the
                                    School
                                    for there endless efforts.
                                    A good school changes students in overall development
                                </p>
                                <p class="text-[16px] text-gray-600 moretext">
                                    We thank you for nurturing our childs love for learning
                                    Your commitment to our childs development is invaluable and keeping them safe and
                                    supported at the school.
                                </p>
                                <a class="moreless-button font-[600] cursor-pointer hover:text-red-600 text-blue-main">Read more</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Controls -->
                <div class="absolute left-0 xl:flex hidden items-center justify-between w-full h-0 px-4 top-1/2 hide-circle" data-glide-el="controls">
                    <button class="inline-flex items-center relative sm:right-[66px] justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir="<" aria-label="prev slide">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>
                    <button class="inline-flex items-center relative sm:left-[66px] justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir=">" aria-label="next slide">
                        <i class="fa-solid fa-angle-right"></i>
                    </button>
                </div>
                <div class="absolute bottom-0 flex items-center justify-center w-full gap-2"
                    data-glide-el="controls[nav]">
                    <button class=" group" data-glide-dir="=0" aria-label="goto slide 1"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                    <button class=" group" data-glide-dir="=1" aria-label="goto slide 2"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-non2"></span></button>
                    <button class=" group" data-glide-dir="=2" aria-label="goto slide 3"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                    <button class=" group" data-glide-dir="=3" aria-label="goto slide 4"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                </div>
            </div>
        </div>

        <?php include "includes/footer.php" ?>
    </div>
    <?php include "includes/foot.php" ?>
    <script>
        $('.moreless-button').click(function() {
            const moreText = $(this).siblings('.moretext');

            $('.moretext').not(moreText).slideUp();
            $('.moreless-button').not(this).text('Read more');

            // Toggle the current one
            moreText.slideToggle();

            if ($(this).text() == "Read more") {
                $(this).text("Read less");
            } else {
                $(this).text("Read more");
            }
        });

        var aboutCarousel1 = new Glide('.about-carousel1', {
            type: 'carousel',
            focusAt: 1,
            perView: 4,
            autoplay: 3500,
            animationDuration: 700,
            gap: 24,
            classes: {
                activeNav: '[&>*]:bg-slate-700',
            },
            breakpoints: {
                1024: {
                    perView: 4
                },
                640: {
                    perView: 1
                }
            },
        });
        aboutCarousel1.mount();

        var aboutCarousel2 = new Glide('.about-carousel2', {
            type: 'carousel',
            focusAt: 1,
            perView: 4,
            autoplay: 3500,
            animationDuration: 700,
            gap: 24,
            classes: {
                activeNav: '[&>*]:bg-slate-700',
            },
            breakpoints: {
                1680: {
                    perView: 4
                },
                1024: {
                    perView: 3
                },
                820: {
                    perView: 2
                },
                640: {
                    perView: 1
                }
            },
        });
        aboutCarousel2.mount();

        var ab_testimonial = new Glide('.ab_testimonial', {
            type: 'carousel',
            focusAt: 'center',
            perView: 4,
            autoplay: 3500,
            animationDuration: 700,
            gap: 24,
            classes: {
                activeNav: '[&>*]:bg-slate-700',
            },
            breakpoints: {
                1680: {
                    perView: 4
                },
                1024: {
                    perView: 3
                },
                820: {
                    perView: 2
                },
                640: {
                    perView: 1
                }
            },
        });
        ab_testimonial.mount();

        var glide03 = new Glide('.glide-03', {
            type: 'carousel',
            focusAt: 1,
            perView: 4,
            autoplay: 3500,
            animationDuration: 700,
            gap: 24,
            classes: {
                activeNav: '[&>*]:bg-slate-700',
            },
            breakpoints: {
                1680: {
                    perView: 4
                },
                1024: {
                    perView: 3
                },
                820: {
                    perView: 2
                },
                640: {
                    perView: 1
                }
            },
        });

        glide03.mount();

        var latestNews2 = new Glide('.latestNews2', {
            type: 'carousel',
            focusAt: 1,
            perView: 4,
            autoplay: 3500,
            animationDuration: 700,
            gap: 24,
            classes: {
                activeNav: '[&>*]:bg-slate-700',
            },
            breakpoints: {
                1680: {
                    perView: 4
                },
                1024: {
                    perView: 3
                },
                820: {
                    perView: 2
                },
                640: {
                    perView: 1
                }
            },
        });
        latestNews2.mount();
    </script>
</body>

</html>