<?php
include "includes/apis.php";
$data = $document_information_data;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AllenHouse Agra | Document and Information</title>
    <?php include "includes/head.php" ?>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative mb-[40px] sm:mb-[120px]">
         <!-- Start -->
         <div class="bg-center flex items-center text-left h-[300px] comman-banner">
            <div>
                <h2 class="text-[32px] sm:hidden block font-[700] text-white text-left mb-5 sm:mb-8 hr-line relative leading-9 pl-4 ">
                 Document and Information
                </h2>
            </div>

            <div class="md:w-[100%]">
                <h2 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                     Document 
                    <span >and Information</span>  
                </h2>
            </div>
         </div>
         <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-blue-main">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="ms-1 text-sm font-medium text-blue-main">Disclosures
                    </p></div>
                </li>
                <li>
              
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="documents-and-information" class="ms-1 text-sm font-medium text-blue-main">Document & Information</a>
                    </div>
                </li>
            </ol>
        </div>
         <!-- End -->
       <div class="main relative sm:top-[20px] mb-[40px] sm:mb-[120px] mx-0 sm:mx-2">
            <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
                <div class="sm:mt-10 relative">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-10">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
                                <tr>
                                    <th scope="col" class="px-6 py-4">
                                        S.No.
                                    </th>
                                    <th scope="col" class="px-6 py-4">
                                        Documents/Information
                                    </th>
                                    <th scope="col" class="px-6 py-4">
                                        Upload Document Link
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $s = 1;  
                                foreach ($data['data'] as $row) {
                                ?>
                                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                                        <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap">
                                            <?php echo $s++; ?>
                                        </th>
                                        <td class="px-6 py-2">
                                            <?php echo htmlspecialchars($row['information']); ?>
                                        </td>
                                        <td class="px-6 py-2">
                                            <a href="<?php echo htmlspecialchars($row['url'] ?? '#'); ?>"
                                                target="_blank"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>

</body>

</html>
