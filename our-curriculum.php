<?php
$page = "our-curriculum";
include "includes/apis.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://allenhouseagra.com/our-curriculum" />
    <?php include "includes/meta.php"; ?>
    <?php include "includes/head.php" ?>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <div class="main relative mb-[40px] sm:mb-[120px]">

            <div class="bg-center flex items-center text-center h-[300px] comman-banner">
                <div>
                    <h2 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                        Our Curriculum
                    </h2>
                </div>
                <div class="md:w-[100%]">
                    <h2 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                        Our <span>&nbsp;</span>Curriculum
                    </h2>
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
                            <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="our-curriculum" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">
                                Our Curriculum
                            </a>
                        </div>
                    </li>
                </ol>
            </div>

            <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
                <div class="mt-10 relative">
                    <?php
                    // $our_curriculum_data already processed hai apis.php mein
                    // cmsLegacyHtmlPageBlock section index 1 = second section (content wala)
                    if (!empty($our_curriculum_data['description'])) {
                        echo $our_curriculum_data['description'];
                    } elseif (!empty($our_curriculum_data['content'])) {
                        echo $our_curriculum_data['content'];
                    } else {
                        // Fallback: raw sections se directly fetch karo
                        $sections = $our_curriculum_page['data']['sections'] ?? [];
                        foreach ($sections as $section) {
                            if (!empty($section['content'])) {
                                echo $section['content'];
                            }
                        }
                    }
                    ?>
                </div>
            </div>

        </div>

        <?php include "includes/footer.php" ?>
        <?php include "includes/foot.php" ?>

    </div>
</body>

</html>