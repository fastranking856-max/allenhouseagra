<?php include "includes/apis.php"; ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://allenhouseagra.com/faq" />
    <title>APS Agra FAQs | Trusted Answers for Parents & Students</title>
    <meta name="description" content="Seeking reliable information on APS Agra? Explore our FAQs for parents & students to get the trusted answers you need. ">
    <?php include "includes/head.php" ?>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
</head>
<style>
    .ql-editor {
        height: auto !important;
        padding: 8px !important;
        white-space: normal !important;
    }
</style>
<body>

    <?php include "includes/header.php" ?>
    <?php
 
    $json = $faq_data;
    $data = $json['data'] ?? [];
    $faqHtml = cmsSectionHtml(cmsPageSection($faq_page ?? null, 1));

    $grouped = [];
    foreach ($data as $item) {
        $groupName = $item['questiongroup']['name'];
        $grouped[$groupName][] = $item;
    }

    $questionNumber = 1;
    ?>

    <div class="main relative  mb-[40px] sm:mb-[120px] ">
        <div class="bg-center flex items-center text-center h-[300px] job-opening-bg common-banner">
            <div>
                <h1
                    class="text-[32px] sm:hidden block font-[700] text-white text-center pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    FAQ's
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1
                    class="sm:text-[32px] sm:block hidden font-[700] text-white text-left ml-[7rem] sm:mb-1 hr-line relative leading-9">
                    FAQ's
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
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="faq" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">FAQ's</a>
                    </div>
                </li>
            </ol>
        </div>

        <div class="mt-10 mx-4 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-4">
            <div class="relative">
                <?php if ($faqHtml !== '' && empty($grouped)): ?>
                    <div class="ql-snow">
                        <div class="ql-editor">
                            <?= $faqHtml ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php foreach ($grouped as $groupName => $items): ?>
                    <?php if ($groupName !== 'TOP'): ?>
                        <h2 class="text-[24px] font-[700] text-blue-main text-center mt-5">
                            <?= htmlspecialchars($groupName) ?>
                        </h2>
                    <?php endif; ?>

                    <?php foreach ($items as $item): ?>
                        <h3 class="text-[20px] font-[700] text-gray-600 mt-5">
                            <?= $questionNumber++ . ". " . htmlspecialchars($item['question']) ?>
                        </h3>
                        <div class="ql-snow">
                            <div class="ql-editor">
                                <p class="sm:text-[16px] text-[16px] text-gray-600 font-[400] mt-2">
                                    <?php
                                    $answer = $item['answer'];
                                    echo "Ans: " . $answer;
                                    ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    </div>
    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>

</body>

</html>
