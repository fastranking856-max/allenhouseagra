<?php
include "includes/apis.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>CBSE School in Kanpur | Allenhouse School, Khalasi Line</title>
     <meta name="description" content="Join the top CBSE school in Kanpur to empower your child with future-ready skills and confidence for lifelong success.">
    <?php include "includes/head.php" ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>

<body style="overflow-x: hidden;">

    <style>
        ul.glide__slides {
            display: flex;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        ul.tabs {
            padding: 0px;
            list-style: none;
        }

        ul.tabs li {
            background: none;
            color: #053B7A;
            display: inline-block;
            padding: 10px 15px;
            cursor: pointer;

            background: #ededed;
        }

        @media (max-width: 640px) {
            ul.tabs li {
                font-size: 14px;
                padding: 8px;
                background: #ededed;
            }

        }

        ul.tabs li.current {
            background: #053B7A;
            color: #fff;
        }

        .tab-content {
            display: none;
            padding-top: 15px;
        }

        .tab-content.current {
            display: block !important;
        }

        .img-popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: transparent;
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .popup-content {
            background: rgba(0, 0, 0, 0.85);
            border-radius: 12px;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            animation: animatepopup 0.3s ease-in-out forwards;

            /* Desktop default */
            width: 50vw;
            height: 90vh;
        }

        .popup-content img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            opacity: 0;
            transform: translateY(-100px);
            animation: animatepopup 0.3s ease-in-out forwards;
            border-radius: 10px;
        }

        /* Responsive for mobile screens */
        @media (max-width: 640px) {
            .popup-content {
                width: 100vw;
                height: 50vh;
            }
        }

        .close-btn {
            width: 35px;
            height: 30px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            position: absolute;
            top: 20px;
            right: 20px;
            cursor: pointer;
        }

        .close-btn .bar {
            height: 4px;
            background: #fff;
            border-radius: 2px;
        }

        .close-btn .bar:nth-child(1) {
            transform: rotate(45deg);
        }

        .close-btn .bar:nth-child(2) {
            transform: translateY(-4px) rotate(-45deg);
        }

        .img-popup.opened {
            display: flex;
        }

        @keyframes animatepopup {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .mySwiper .swiper-pagination-bullet {
            background-color: #053B7A !important;
        }

        .mySwiper .swiper-pagination-bullet-active {
            background-color: #002A5B !important;
        }

        @media (max-width: 640px) {
            .swiper {
                box-shadow: none !important;
            }

            .swiper-slide {
                box-shadow: none !important;
            }

            .swiper-wrapper {
                margin: 0 !important;
            }
        }

        .clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .expanded {
            max-height: 200px;
            overflow-y: auto;
            overflow-x: hidden;
            display: block;
            -webkit-line-clamp: unset;
            white-space: normal;
        }
    </style>

    <?php include "includes/header.php" ?>

    <div id="formOverlay"
        class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center z-[99999] hidden">
        <!-- Custom Modal -->
        <div class="bg-white rounded-xl shadow-2xl p-6 w-full lg:max-w-xl md:max-w-lg sm:max-w-md relative">
            <!-- Dismiss Button -->
            <button id="dismissPopup"
                class="absolute top-4 right-4 text-gray-400 hover:text-red-400 text-2xl font-bold">&times;</button>
         <a href="admission-procedure">
               <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/CIoNHFBVzFkDvwWvDmmr0LIZ2PeQRFdFOHtKDhWE.png" alt="Admission">
          </a>
        </div>
    </div>


    <div class="main relative">
        <div class="mx-3">

            <div class="relative w-full heroSlider opne-hide-circle">
                <div class="overflow-hidden" data-glide-el="track">
                    <ul
                        class="relative w-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                        <li class="relative">
                            <img src="https://res.cloudinary.com/digy74izv/image/upload/v1748074802/APS_KHL_Website_Hero_Banner_mobile_2_e0ufrp.jpg"
                                alt="Experience Excellence" class="sm:w-auto w-[100%] sm:hidden ">
                            <img src="https://res.cloudinary.com/digy74izv/image/upload/v1748074813/APS_KHL_Website_Hero_Banner_2_h6nfcd.jpg"
                                alt="Experience Excellence" class="w-[100%] hidden sm:block">
                            <div class="absolute top-5 left-4 sm:top-[75px] sm:left-[180px] hidden">
                                <h2 class="text-gray-500 sm:text-4xl text-3xl font-[700]">
                                    Experience <br>
                                    <span class="text-[40px] sm:text-[60px] font-[700] text-blue-900">
                                        Excellence</span>
                                </h2>
                            </div>
                        </li>
                        <li class="relative">
                            <img src="https://res.cloudinary.com/digy74izv/image/upload/v1748074803/APS_KHL_Website_Hero_Banner_mobile_3_rouini.jpg"
                                alt="Experience Excellence" class="sm:w-auto w-[100%] sm:hidden ">
                            <img src="https://res.cloudinary.com/digy74izv/image/upload/v1748074803/APS_KHL_Website_Hero_Banner_3_c4xwr5.jpg"
                                alt="Experience Excellence" class="w-[100%] hidden sm:block">
                            <div class="absolute top-5 left-4 sm:top-[75px] sm:left-[180px] hidden">
                                <h2 class="text-gray-500 sm:text-4xl text-3xl font-[700]">
                                    Experience <br>
                                    <span class="text-[40px] sm:text-[60px] font-[700] text-blue-900">
                                        Excellence</span>
                                </h2>
                            </div>
                        </li>
                        <li class="relative">
                            <img src="https://res.cloudinary.com/digy74izv/image/upload/v1748074803/APS_KHL_Website_Hero_Banner_mobile_4_kcyuxm.jpg"
                                alt="Experience Excellence" class="sm:w-auto w-[100%] sm:hidden ">
                            <img src="https://res.cloudinary.com/digy74izv/image/upload/v1748074803/APS_KHL_Website_Hero_Banner_4_wjywsq.jpg"
                                alt="Experience Excellence" class="w-[100%] hidden sm:block">
                            <div class="absolute top-5 left-4 sm:top-[75px] sm:left-[180px] hidden">
                                <h2 class="text-gray-500 sm:text-4xl text-3xl font-[700]">
                                    Experience <br>
                                    <span class="text-[40px] sm:text-[60px] font-[700] text-blue-900">
                                        Excellence</span>
                                </h2>
                            </div>
                        </li>
                        <li class="relative">
                            <img src="https://res.cloudinary.com/digy74izv/image/upload/v1748074802/APS_KHL_Website_Hero_Banner_mobile_1_fvcbbr.jpg"
                                alt="Experience Excellence" class="sm:w-auto w-[100%] sm:hidden ">
                            <img src="https://res.cloudinary.com/digy74izv/image/upload/v1748074810/APS_KHL_Website_Hero_Banner_1_fso5t2.jpg"
                                alt="Experience Excellence" class="w-[100%] hidden sm:block">
                            <div class="absolute top-5 left-4 sm:top-[75px] sm:left-[180px] hidden">
                                <h2 class="text-gray-500 sm:text-4xl text-3xl font-[700]">
                                    Experience <br>
                                    <span class="text-[40px] sm:text-[60px] font-[700] text-blue-900">
                                        Excellence</span>
                                </h2>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="absolute left-0 sm:flex hidden items-center justify-between w-full h-0 px-4 top-1/2 hide-circle"
                    data-glide-el="controls">
                    <button
                        class="inline-flex items-center  justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20"
                        data-glide-dir="<" aria-label="prev slide">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>
                    <button
                        class="inline-flex items-center  justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20"
                        data-glide-dir=">" aria-label="next slide">
                        <i class="fa-solid fa-angle-right"></i>
                    </button>
                </div>

            </div>

            <div class="ralative hidden">
                <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730297499/uvr4w0120yj7kwuxipip.png"
                    alt="Experience Excellence" class="sm:w-auto w-[100%] sm:hidden ">
                <img src="assets/images/hero_bannner.jpg" alt="Experience Excellence" class="w-[100%] hidden sm:block">

                <div class="absolute top-5 sm:top-[50px] sm:left-[80px] left-[30px]">
                    <h2 class="text-gray-500 sm:text-4xl text-3xl font-[700]">
                        Experience <br>
                        <span class="text-[40px] sm:text-[60px] font-[700] text-blue-900">
                            Excellence</span>
                    </h2>
                </div>
            </div>
        </div>


        <div class="mt-5 sm:mt-[60px] 2xl:w-[1080px] lg:w-[824px] md:w-[567px] sm:w-[440px] sm:mx-auto sm:px-5 px-3">
            <div>
                <ul
                    class="grid 2xl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-2 grid-cols-2 items-center gap-5">
                    <li>
                        <a href="https://apskhl.superhouseerp.com/RegistrationTransaction/OnlineRegistration"
                            target="_blank"
                            class="w-full h-[110px] sm:h-auto border border-[#053B7A] rounded-[12px] bg-[#EFF6FF] sm:p-[20px]  transition-all duration-300 transform hover:scale-[1.03] hover:[box-shadow:0_5px_0_rgba(5,59,122,0.4),0_10px_0_rgba(5,59,122,0.3),0_15px_0_rgba(5,59,122,0.2),0_20px_0_rgba(5,59,122,0.1),0_25px_0_rgba(5,59,122,0.05)] flex-col sm:flex-row flex justify-center items-center">
                            <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/PfB2uWoIVzWJhfgHNN02JAsssXQ17I08Ncv3uLY4.png"
                                alt="Online Registration"
                                class="2xl:w-[60px] 2xl:h-[60px] xl:w-[60px] xl:h-[60px] lg:w-[45px] lg:h-[45px] sm:w-[45px] sm:h-[45px]  object-contain">
                            <span
                                class="font-[600] text-[13px] sm:text-[16px] text-[#053B7A] mt-2 sm:mt-0 sm:ml-2 text-center sm:text-left">
                                Online Registration
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="https://apskhl.superhouseerp.com/" target="_blank"
                            class="w-full h-[110px] sm:h-auto border border-[#053B7A] rounded-[12px] bg-[#EFF6FF] sm:p-[20px]  transition-all duration-300 transform hover:scale-[1.03] hover:[box-shadow:0_5px_0_rgba(5,59,122,0.4),0_10px_0_rgba(5,59,122,0.3),0_15px_0_rgba(5,59,122,0.2),0_20px_0_rgba(5,59,122,0.1),0_25px_0_rgba(5,59,122,0.05)] flex-col sm:flex-row flex justify-center items-center">
                            <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/4ihIhq4J8lzHTTJnWrAaQIH7Ihh6iA6Rl1hMDAKS.png"
                                alt="Online Payment"
                                class="2xl:w-[60px] 2xl:h-[60px] xl:w-[60px] xl:h-[60px] lg:w-[45px] lg:h-[45px] sm:w-[45px] sm:h-[45px] object-contain">
                            <span
                                class="font-[600] text-[13px] sm:text-[16px] text-[#053B7A] mt-2 sm:mt-0 sm:ml-2 text-center sm:text-left">
                                Online Payment
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="admission-procedure"
                            class="w-full h-[110px] sm:h-auto border border-[#053B7A] rounded-[12px] bg-[#EFF6FF] sm:p-[20px]  transition-all duration-300 transform hover:scale-[1.03] hover:[box-shadow:0_5px_0_rgba(5,59,122,0.4),0_10px_0_rgba(5,59,122,0.3),0_15px_0_rgba(5,59,122,0.2),0_20px_0_rgba(5,59,122,0.1),0_25px_0_rgba(5,59,122,0.05)] flex-col sm:flex-row flex justify-center items-center">
                            <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/yq1Qdce1UUjo0c3YBsTrLusEOgDKG9PRibW34Pqy.png"
                                alt="Admission Enquiry"
                                class="2xl:w-[60px] 2xl:h-[60px] xl:w-[60px] xl:h-[60px] lg:w-[45px] lg:h-[45px] sm:w-[45px] sm:h-[45px] object-contain">
                            <span
                                class="font-[600] text-[13px] sm:text-[16px] text-[#053B7A] mt-2 sm:mt-0 sm:ml-2 text-center sm:text-left">
                                Admission Enquiry
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="campus-tour"
                            class="w-full h-[110px] sm:h-auto border border-[#053B7A] rounded-[12px] bg-[#EFF6FF] sm:p-[20px]  transition-all duration-300 transform hover:scale-[1.03] hover:[box-shadow:0_5px_0_rgba(5,59,122,0.4),0_10px_0_rgba(5,59,122,0.3),0_15px_0_rgba(5,59,122,0.2),0_20px_0_rgba(5,59,122,0.1),0_25px_0_rgba(5,59,122,0.05)] flex-col sm:flex-row flex justify-center items-center">
                            <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/495NKZO8a0uH4nQAxHbX9zZ4kTlQtzxfnGvVWlOV.png"
                                alt="Campus Tour"
                                class="2xl:w-[60px] 2xl:h-[60px] xl:w-[60px] xl:h-[60px] lg:w-[45px] lg:h-[45px] sm:w-[45px] sm:h-[45px] object-contain">
                            <span
                                class="font-[600] text-[13px] sm:text-[16px] text-[#053B7A] mt-2 sm:mt-0 sm:ml-2 text-center sm:text-left">
                                Campus Tour
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>



        <div
            class="sm:block hidden mt-10 sm:mt-[60px] 2xl:w-[1480px] lg:w-[1224px] md:w-[967px] sm:w-[840px] sm:mx-auto sm:px-5 px-3">
            <div class="grid sm:grid-cols-4 grid-cols-1 gap-5">
                <div class="overflow-hidden">
                    <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                        <div class="top-hide">
                            <div class="absolute z-10 p-3">
                                <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                    style="color: #B4D7FF;">
                                    Excellence <br>
                                    <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                        In Action</span>
                                </h2>
                            </div>
                        </div>
                        <div>
                            <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/nGnUqDMu2i98uM9ceEtg13exFUDiZnBEQjSfODV5.png"
                                class="w-[100%] h-[95%] rounded-[8px]" alt="Excellence In Action">
                        </div>
                        <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open">
                            <div class="relative bottom-[16px]">
                                <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                    style="color: #B4D7FF;">
                                    Excellence <br>
                                    <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                        In Action</span>
                                </h2>
                                <p class="mt-3 text-white">At Allenhouse Schools, excellence is more than a goal; it is a way of life.</p>
                                <button class="w-[100%]"><a href="excellence-in-action"
                                        class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                        More

                                        <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#053B7A"
                                                stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542" stroke="#053B7A"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="overflow-hidden">
                    <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                        <div class="top-hide">
                            <div class="absolute z-10 p-3">
                                <h2
                                    class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] text-white/80">
                                    Celebrating <br>
                                    <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700]"
                                        style="color: #B4D7FF;">
                                        Excellence</span>
                                </h2>
                            </div>
                        </div>
                        <div>
                            <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/tc4lFG0RlfWKqyRLtUczOHGryLrHIOFTY1Lk3fxx.jpg"
                                class="w-[100%]" alt="Celebrating Excellence">
                        </div>
                        <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open">
                            <div class="relative bottom-[16px]">
                                <h2
                                    class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] text-white/80">
                                    Celebrating <br>
                                    <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700]"
                                        style="color: #B4D7FF;">
                                        Excellence</span>
                                </h2>
                                <p class="mt-3 text-white"> At Allenhouse Schools, excellence is not just a value we uphold; it is a way of life.</p>

                                <button class="w-[100%]"><a href=""><a href="celebrating-excellence"
                                            class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                            More

                                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#053B7A"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542"
                                                    stroke="#053B7A" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a></a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden">
                    <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                        <div class="top-hide">
                            <div class="absolute z-10 p-3">
                                <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                    style="color: #B4D7FF;">
                                    Excellence <br>
                                    <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                        In the Spotlight</span>
                                </h2>
                            </div>
                        </div>
                        <div>
                            <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/jmgRHOyFhzhhssPBdAJ74WbxoCJW6AXEEejaS6va.jpg"
                                class="w-[100%]" alt="Excellence In the Spotlight">
                        </div>
                        <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open">
                            <div class="relative bottom-[16px]">
                                <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                    style="color: #B4D7FF;">
                                    Excellence <br>
                                    <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                        In the Spotlight</span>
                                </h2>
                                <p class="mt-3 text-white"> At Allenhouse, the pursuit of excellence is not confined to the classroom.</p>
                                <button class="w-[100%]"><a href="excellence-in-spotlight"
                                        class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                        More

                                        <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#053B7A"
                                                stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542" stroke="#053B7A"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden">
                    <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                        <div class="top-hide">
                            <div class="absolute z-10 p-3">
                                <h2 class=" text-[22px] 2xl:text-[22px] lg:text-[16px] leading-8 font-[700] "
                                    style="color: #B4D7FF;">
                                    Embark on a Journey of<br>
                                    <span class="text-[35px] 2xl:text-[35px] lg:text-[24px] font-[700] text-white/80">
                                        Excellence</span>
                                </h2>
                            </div>
                        </div>
                        <div>
                            <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/IpFpgCDnZsGrbxUumc4ecFxtw45eFXPXnAuRj0tZ.jpg"
                                class="w-[100%]" alt="Embark on a Journey of Excellence">
                        </div>
                        <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open">
                            <div class="relative bottom-[16px]">
                                <h2 class=" text-[22px] 2xl:text-[22px] lg:text-[16px] leading-8 font-[700] "
                                    style="color: #B4D7FF;">
                                    Embark on a Journey of<br>
                                    <span class="text-[35px] 2xl:text-[35px] lg:text-[24px] font-[700] text-white/80">
                                        Excellence</span>
                                </h2>
                                <p class="mt-3 text-white">At Allenhouse Schools, the pursuit of excellence is more than a goal; it is a pledge.</p>
                                <button class="w-[100%]"><a href="embark-on-journey"
                                        class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                        More

                                        <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#053B7A"
                                                stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542" stroke="#053B7A"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="block sm:hidden mt-10 px-0">
            <div class="swiper mySwiper w-full">
                <div class="swiper-wrapper">
                    <!-- SLIDE 1 -->
                    <div class="swiper-slide px-3">
                        <div class="overflow-hidden">
                            <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                                <div class="top-hide">
                                    <div class="absolute z-10 p-3">
                                        <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                            style="color: #B4D7FF;">
                                            Excellence <br>
                                            <span
                                                class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                                In Action</span>
                                        </h2>
                                    </div>
                                </div>
                                <div>
                                    <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/nGnUqDMu2i98uM9ceEtg13exFUDiZnBEQjSfODV5.png"
                                        class="w-[100%] h-[95%] rounded-[8px]" alt="Excellence In Action">
                                </div>
                                <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open">
                                    <div class="relative bottom-[16px]">
                                        <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                            style="color: #B4D7FF;">
                                            Excellence <br>
                                            <span
                                                class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                                In Action</span>
                                        </h2>
                                        <p class="mt-3 text-white">At Allenhouse Schools, excellence is more than a goal; it is a way of life.</p>
                                        <button class="w-[100%]"><a href="excellence-in-action"
                                                class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                                More

                                                <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#053B7A"
                                                        stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542"
                                                        stroke="#053B7A" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg></a>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SLIDE 2 -->
                    <div class="swiper-slide px-3">
                        <div class="overflow-hidden">
                            <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                                <div class="top-hide">
                                    <div class="absolute z-10 p-3">
                                        <h2
                                            class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] text-white/80">
                                            Celebrating <br>
                                            <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700]"
                                                style="color: #B4D7FF;">
                                                Excellence</span>
                                        </h2>
                                    </div>
                                </div>
                                <div>
                                    <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/tc4lFG0RlfWKqyRLtUczOHGryLrHIOFTY1Lk3fxx.jpg"
                                        class="w-[100%]" alt="Celebrating Excellence">
                                </div>
                                <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open">
                                    <div class="relative bottom-[16px]">
                                        <h2
                                            class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] text-white/80">
                                            Celebrating <br>
                                            <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700]"
                                                style="color: #B4D7FF;">
                                                Excellence</span>
                                        </h2>
                                        <p class="mt-3 text-white"> At Allenhouse Schools, excellence is not just a value we
                                            uphold; it is a way of life.</p>
                                        <button class="w-[100%]"><a href="celebrating-excellence"
                                                class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                                More

                                                <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#053B7A"
                                                        stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542"
                                                        stroke="#053B7A" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg></a>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SLIDE 3 -->
                    <div class="swiper-slide px-3">
                        <div class="overflow-hidden">
                            <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                                <div class="top-hide">
                                    <div class="absolute z-10 p-3">
                                        <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                            style="color: #B4D7FF;">
                                            Excellence <br>
                                            <span
                                                class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                                In the Spotlight</span>
                                        </h2>
                                    </div>
                                </div>
                                <div>
                                    <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/jmgRHOyFhzhhssPBdAJ74WbxoCJW6AXEEejaS6va.jpg"
                                        class="w-[100%]" alt="Excellence In the Spotlight">
                                </div>
                                <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open">
                                    <div class="relative bottom-[16px]">
                                        <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                            style="color: #B4D7FF;">
                                            Excellence <br>
                                            <span
                                                class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                                In the Spotlight</span>
                                        </h2>
                                        <p class="mt-3 text-white"> At Allenhouse, the pursuit of excellence is not confined to the classroom.</p>
                                        <button class="w-[100%]"><a href="excellence-in-spotlight"
                                                class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                                More

                                                <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#053B7A"
                                                        stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542"
                                                        stroke="#053B7A" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg></a>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SLIDE 4 -->
                    <div class="swiper-slide px-3">
                        <div class="overflow-hidden">
                            <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                                <div class="top-hide">
                                    <div class="absolute z-10 p-3">
                                        <h2 class=" text-[22px] 2xl:text-[22px] lg:text-[16px] leading-8 font-[700] "
                                            style="color: #B4D7FF;">
                                            Embark on a Journey of<br>
                                            <span
                                                class="text-[35px] 2xl:text-[35px] lg:text-[24px] font-[700] text-white/80">
                                                Excellence</span>
                                        </h2>
                                    </div>
                                </div>
                                <div>
                                    <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/IpFpgCDnZsGrbxUumc4ecFxtw45eFXPXnAuRj0tZ.jpg"
                                        class="w-[100%]" alt="Embark on a Journey of Excellence">
                                </div>
                                <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open">
                                    <div class="relative bottom-[16px]">
                                        <h2 class=" text-[22px] 2xl:text-[22px] lg:text-[16px] leading-8 font-[700] "
                                            style="color: #B4D7FF;">
                                            Embark on a Journey of<br>
                                            <span
                                                class="text-[35px] 2xl:text-[35px] lg:text-[24px] font-[700] text-white/80">
                                                Excellence</span>
                                        </h2>
                                        <p class="mt-3 text-white">At Allenhouse Schools, the pursuit of excellence is more than a goal; it is a pledge.</p>

                                        <button class="w-[100%]"><a href="embark-on-journey"
                                                class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                                More

                                                <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#053B7A"
                                                        stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542"
                                                        stroke="#053B7A" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg></a>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination  mt-4"></div>
            </div>
        </div>



        <div style="background-image: url('https://res.cloudinary.com/dj7wogsju/image/upload/v1745924133/Rectangle_7157_j4cj0a.png');  background-repeat: no-repeat;"
            class="bg-cover">
            <div
                class="mt-10 sm:mt-8 sm:py-16 py-4 2xl:w-[880px] lg:w-[624px] md:w-[467px] sm:w-[340px] sm:mx-auto mx-3">
                <div class="text-center">
                    <h2 class="text-[32px] font-[700] leading-9 text-blue-main  relative">The Allenhouse Approach
                    </h2>
            <?php
              $app_data = $ap_data;
            ?>        
                    <p class="mt-4 text-[#808080] text-[18px]"><?php echo $app_data['data'][0]['description'] ?></p>
                </div>
            </div>
        </div>
    </div>



    <div class="mt-10">

        <div class="bg-[#132959] text-center pt-5 sm:pb-2 pb-5">
            <h2 class="text-[32px] font-[700] leading-9 text-white  relative text-center ">Legacy of Excellence
            </h2>
        </div>
        <?php
        /* $ex__data from apis.php */
        ?>
        <div class="sm:py-8 py-5 bg-feature m-bg-feature ">
            <div class="grid grid-cols-1 sm:grid-cols-5 ">
                <div class="flex justify-center gap-4 items-center sm:py-0 py-6">
                    <span class="sm:w-[50%] w-[35%] inline-block "><img src="assets/images/icons/thump.png" alt="Years"
                            class="w-[50px] 2xl:w-[50px] lg:w-[45px] md:w-[40px]" style="margin: 0 0 0 auto;"></span>
                    <div class="inline-block w-[50%]">
                        <h2 class="text-white font-[700] text-[35px] 2xl:text-[30px] lg:text-[20px] md:text-[20px]"><?php echo $ex__data['data'][0]['years'] ?></h2>
                        <h3 class="text-white font-[700]  text-[22px] 2xl:text-[20px] lg:text-[15px] md:text-[15px] ">
                            Years</h3>
                    </div>
                </div>
                <div class="flex justify-center gap-4 items-center sm:pb-0 pb-10">
                    <span class="sm:w-[50%] w-[35%] inline-block "><img src="assets/images/icons/campus.png"
                            alt="Campus" class="w-[50px] 2xl:w-[50px] lg:w-[45px] md:w-[40px]"
                            style="margin: 0 0 0 auto;"></span>
                    <div class="inline-block w-[50%]">
                        <h2 class="text-white font-[700] text-[35px] 2xl:text-[30px] lg:text-[20px] md:text-[20px] 
                        "><?php echo $ex__data['data'][0]['campus'] ?></h2>
                        <h3 class="text-white font-[700]  text-[22px] 2xl:text-[20px] lg:text-[15px] md:text-[15px]">
                            Campus</h3>
                    </div>
                </div>
                <div class="flex justify-center gap-4 items-center sm:pb-0 pb-10">
                    <span class="sm:w-[50%] w-[35%] inline-block "><img src="assets/images/icons/students.png"
                            alt="Students" class="w-[50px] 2xl:w-[50px] lg:w-[45px] md:w-[40px]"
                            style="margin: 0 0 0 auto;"></span>
                    <div class="inline-block w-[50%]">
                        <h2 class="text-white font-[700] text-[35px] 2xl:text-[30px] lg:text-[20px] md:text-[20px] 
                        "><?php echo $ex__data['data'][0]['student'] ?></h2>
                        <h3 class="text-white font-[700]  text-[22px] 2xl:text-[20px] lg:text-[15px] md:text-[15px]">
                            Students</h3>
                    </div>
                </div>
                <div class="flex justify-center gap-4 items-center sm:pb-0 pb-10">
                    <span class="sm:w-[50%] w-[35%] inline-block "><img src="assets/images/icons/staff.png" alt="Staff"
                            class="w-[50px] 2xl:w-[50px] lg:w-[45px] md:w-[40px]" style="margin: 0 0 0 auto;"></span>
                    <div class="inline-block w-[50%]">
                        <h2 class="text-white font-[700] text-[35px] 2xl:text-[30px] lg:text-[20px] md:text-[20px] 
                        "><?php echo $ex__data['data'][0]['staff'] ?></h2>
                        <h3 class="text-white font-[700]  text-[22px] 2xl:text-[20px] lg:text-[15px] md:text-[15px]">
                            Staff</h3>
                    </div>
                </div>
                <div class="flex justify-center gap-4 items-center ">
                    <span class="sm:w-[50%] w-[35%] inline-block "><img src="assets/images/icons/allumi.png"
                            alt="Alumni" class="w-[50px] 2xl:w-[50px] lg:w-[45px] md:w-[40px]"
                            style="margin: 0 0 0 auto;"></span>
                    <div class="inline-block w-[50%]">
                        <h2 class="text-white font-[700] text-[35px] 2xl:text-[30px] lg:text-[20px] md:text-[20px] ">
                             <?php echo $ex__data['data'][0]['alumni'] ?></h2>
                        <h3 class="text-white font-[700]  text-[22px] 2xl:text-[20px] lg:text-[15px] md:text-[15px]">
                            Alumni</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class=" 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-5 mt-10">
        <div class="text-center">
            <h2 class="text-[32px] font-[700] leading-8 text-blue-main">Our Philosophy <span class="sm:hidden">
                    <br></span> Centres Around
            </h2>
        </div>
        <div class="relative w-full glide-0222 mt-5 opne-hide-circle">
            <div class="overflow-hidden" data-glide-el="track">
                <ul
                    class="relative w-full overflow-hidden  p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
          <?php
              $op_data = $philosophy_data;
              foreach($op_data['data'] as $opdata){
            ?>          
                    <li>
                        <img src="<?php echo $opdata['media']['urls'] ?>"
                            alt="<?php echo $opdata['title'] ?>" class="w-[100%] rounded-[8px]">
                        <div class="mt-4">
                            <h2 class="text-[18px] font-[700] leading-5 text-blue-main"><?php echo $opdata['title'] ?></h2>
                            <p class="text-gray-600 text-[16px] mt-1"><?php echo $opdata['description'] ?></p>
                        </div>
                    </li>
        <?php } ?>            
                    
                </ul>
            </div>
            <!-- Controls -->
            <div class="absolute left-0 sm:flex hidden items-center justify-between w-full h-0 px-4 top-1/2 hide-circle"
                data-glide-el="controls">
                <button
                    class="inline-flex items-center relative sm:right-[66px] justify-center hidden hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20"
                    data-glide-dir="<" aria-label="prev slide">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
                <button
                    class="inline-flex items-center relative sm:left-[66px] justify-center hidden hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20"
                    data-glide-dir=">" aria-label="next slide">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
            <div class="absolute bottom-[-20px] flex items-center justify-center w-full gap-2"
                data-glide-el="controls[nav]">
                <button class=" group" data-glide-dir="=0" aria-label="goto slide 1"><span
                        class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-200 focus:outline-none"></span></button>
                <button class=" group" data-glide-dir="=1" aria-label="goto slide 2"><span
                        class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-200 focus:outline-non2"></span></button>
                <button class=" group" data-glide-dir="=2" aria-label="goto slide 3"><span
                        class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-200 focus:outline-none"></span></button>
                <button class=" group" data-glide-dir="=3" aria-label="goto slide 4"><span
                        class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-200 focus:outline-none"></span></button>
            </div>
        </div>
    </div>
    <style>
        .academic-box {
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .academic-box:hover {
            box-shadow: 5px 5px 15px rgba(17, 39, 89, 0.8);
            /* More visible shadow */
            border-radius: 12px;
        }
    </style>

    <div style="background-image: url('https://res.cloudinary.com/dj7wogsju/image/upload/v1745924133/Rectangle_7157_j4cj0a.png');  background-repeat: no-repeat;"
        class="bg-cover  sm:mt-20 mt-10 pt-5 pb-16">
        <h2 class="text-[28px] sm:text-[30px] font-[700] leading-10  text-blue-main relative text-center"> Future Ready
            Skills </h2>
        <div class="container mx-auto">

            <ul class="grid sm:grid-cols-3 grid-cols-2 sm:gap-5 gap-3 sm:mt-5 mt-10 sm:mx-[80px] sm:px-0 px-3">
                <li class="mx-auto"><a href="robotics" class=""><img
                            class="border-[1px] border-blue-main  academic-box sm:w-[80%] w-[]"
                            src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/4YU1RJsoAcFk8RBsf8MjzVL6butg9UUVT8e97bTH.png"
                            alt="Robotics Academy"></a></li>
                <li class="mx-auto"><a href="sports" class=""><img
                            class="border-[1px] border-blue-main  academic-box sm:w-[80%] w-[]"
                            src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/559cOuwQPnCYCXTI2IICDE9yYKtfHc3WnQ3TjfnV.png"
                            alt="Sports Academy"></a></li>
                <li class="mx-auto"><a href="animation-master-class" class=""><img
                            class="border-[1px] border-blue-main  academic-box sm:w-[80%] w-[]"
                            src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/k08SgzoJXQLILC3TCqyxdamwOArsW34dckASne13.png"
                            alt="Animation Academy"></a></li>
                <li class="mx-auto"><a href="oluxi-smart-class" class=""><img
                            class="border-[1px] border-blue-main  academic-box sm:w-[80%] w-[]"
                            src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/mg187WJxFX1PudaOHFfmIdLP5my6iNPfDqYfJQSJ.png"
                            alt="Oluxi Smart Skills"></a></li>
                <li class="mx-auto"><a href="coding" class=""><img
                            class="border-[1px] border-blue-main  academic-box sm:w-[80%] w-[]"
                            src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/mF2NgCb9CIXWZ1JKmEUGrvifSzHCSOkaQosz58Vg.png"
                            alt="Coding Academy"></a></li>
                <li class="mx-auto"><a class=""><img
                            class="border-[1px] border-blue-main  academic-box sm:w-[80%] w-[]"
                            src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/BC4umV4K66fCPKw7ICiNI2jGGjgq7lQW5pWLT0bb.png"
                            alt="Entrepreneur Dream Hub"></a></li>
            </ul>
        </div>
    </div>

    <div>
        <!-- <h2 class="text-[28px] sm:text-[30px] font-[700] leading-10  text-blue-main relative text-center mt-10">
            Cambridge Curriculum</h2> -->
        <div class="mt-10 sm:flex sm:justify-center sm:items-center sm:mx-[100px] sm:px-0 px-10 gap-20">
            <div class="sm:w-[30%]">
                <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/r7CG61YuqFFYKlDUnAYXBCRLNiA8sQhr1hMnqA6w.png"
                    alt="Cambridge Curriculum">
            </div>

            <div class="sm:w-[40%]">
                <div>
                    <p class="mt-5 text-gray-600">At Allenhouse Public School, we offer Cambridge Curriculum
                    </p>
                    <!-- <ul class="text-sm mt-2 sm:ml-5 text-gray-600" style="list-style:disc;">
                        <li class="mt-1"><strong>English:</strong> Strengthening communication through reading, writing,
                            and
                            speaking. </li>
                        <li class="mt-1"><strong>Mathematics:</strong> Building logical reasoning and problem-solving
                            skills. </li>
                        <li class="mt-1"><strong>Science:</strong> Promoting inquiry and exploration through hands-on
                            learning. </li>
                        <li class="mt-1"><strong>ICT:</strong> Equipping students with essential digital skills. </li>
                        <li class="mt-1"><strong>Global Perspectives:</strong> Cultivating critical thinking and a
                            global outlook. A
                            dynamic curriculum for young, global-ready learners!
                            International Benchmarking </li>
                        <li class="mt-3">Cambridge assessments set the gold standard in education, evaluating learners
                            on deep
                            subject mastery, conceptual clarity, and advanced critical thinking. </li>
                    </ul> -->
                </div>

                <div class="mt-3">
                    <a href="cambridge" class="text-[15px] text-blue-main font-[600]">Read More...</a>
                </div>
            </div>
        </div>
    </div>


    <div class="sm:mt-[100px] mt-10">
        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto ">

            <div class="relative ">
                <div class="o-video mx-auto">
                    <iframe width="560" height="315"
                        src="https://www.youtube.com/embed/2XzZJ0BytiQ?autoplay=1&mute=1&loop=1&playlist=2XzZJ0BytiQ"
                        frameborder="0" allow="autoplay;" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>

    </div>
    </div>


    <div class="sm:mt-12 mt-8 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto relative">
        <div class="absolute top-[-235px] -z-50">
            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307222/Group_53_s3txur.png"
                class="w-[100%] h-[100vh] object-top" alt="Allenhouse Banner">
        </div>
        <div class="mx-5">
            <div class="text-center">
                <h2 class="text-[30px] font-[700] leading-10 text-blue-main relative">Our
                    Campuses</h2>
            </div>

            <div class="relative w-full glide-0333 mt-5 opne-hide-circle">
                <div class="overflow-hidden" data-glide-el="track">
                    <ul
                        class="relative w-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                        <li class="bg-white mb-5 rounded-[10px] "
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/Allenhouse-Rooma.jpg" alt="APS Rooma"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allenhouse Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Kulgaon road, National Highway 2, Chakeri Ward, Kanpur, Uttar Pradesh 208008">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Rooma, Kanpur
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:919235400468"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 9235400468</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">
                                        <a href="https://allenhouserooma.com/Site/Home/40000001_40000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>


                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/Allenhouse-Panki.jpg" alt="APS Panki"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allenhouse Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]" alt="884 B Block, Panki Rd, MIG,
                                                Ratanpur, Colony, Panki, Kanpur, Uttar Pradesh 208020">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Panki, Kanpur
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:918853075656"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 8853075656</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">
                                        <a href="https://allenhousepanki.com/Site/Home/20000001_20000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/Allenhouse-Jhansi.jpg" alt="APS Jhansi"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allenhouse Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt=">Allenhouse Public School Phase I, 1st A Growth  Centre, Bijauli Jhansi, India, 284135">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Bijauli, Jhansi</p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:917380850614"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 7380850614</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">
                                        <a href="https://allenhousejhansi.com/Site/Home/180000001_180000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                            <img src="assets/images/Allenhouse-Lucknow.jpg" alt="APS  Lucknow"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allenhouse Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Allenhouse Public School Plot No. HS01, Sector 6C, Vrindavan Yojna Near Teli Bagh, Lucknow">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Vrindavan Yojna, Lucknow
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a class="text-gray-500 capitalize text-[16px] w-[85%]">+91 9026624548 </a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="https://allenhouselucknow.com/Site/Home/210000001_210000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/Allenhouse-Ghaziabad.jpg" alt="APS Ghaziabad"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allenhouse Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Allenhouse Public School Sector 2A, Vasundhara, Ghaziabad, Uttar Pradesh, 201012">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Vasundhara, Ghaziabad
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:916390907005"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 6390907005</a>

                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="https://allenhouseghaziabad.com/Site/Home/70000001_70000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/Allenhouse-Agra.jpg" alt="APS Agra" class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allenhouse Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Shastripuram, Agra
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="918090155519"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 8090155519</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="https://allenhouseagra.com"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <!-- Allen Kids -->
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/AK-Kakadeo.jpg" alt="AkidKakdeo"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allen
                                    Kids
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Kakadeo, Kanpur
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="917042676336"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 7042676336</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="https://allenhouseagra.com"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                            <img src="assets/images/school/AK-Swaroop-Nagar.jpg" alt="AkidSwaropnagar"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allen Kids </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Swaroop Nagar, Kanpur
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="917800661660"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 7800661660
                                            </a> </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="https://allenhouseagra.com"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/sMSDhJwka0IGe6WCtk97L91LnJUC5xuQr5eOz0M7.png"
                                alt="Akid MukherjiVihar" class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allen Kids
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Mukherji Vihar, Kanpur
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:916390907030"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 6390907030
                                            </a></p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="https://allenhouseagra.com"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/AK-Bareilly.jpg" alt="Akid Bareilly"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allen
                                    Kids
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Veer Savarkar Nagar,
                                            Bareilly
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="919720010109"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 9720010109
                                            </a> </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="https://allenhouseagra.com"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <!-- DPS -->
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPS-Kalyanpur.jpg" alt="DPS Kalyanpur"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Kalyanpur, Kanpur
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:919044055605"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 9044055605
                                            </a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpskalyanpur.com/Site/Home/160000001_160000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPS-Unnao.jpg" alt="DPS Unnao"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Akrampur, Unnao
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="919839513636"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 9839513636</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpsunnao.com/Site/Home/120000001_120000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPS-Indira-Nagar.jpg" alt="DPS Indira Nagar"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Indira Nagar, Lucknow
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:915222717293"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 5222717293</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpsindiranagar.com/Site/Home/230000001_230000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPS-ldeco.jpg" alt="DPS Eldeco"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi
                                    Public School</h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Eldeco Colony, Lucknow
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:917522002115"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 7522002115</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpseldeco.com/Site/Home/150000001_150000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>

                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPS-Gomti-Nagar.jpg" alt="DPS Gomti Nagar Extension"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Gomti Nagar Extn.,
                                            Lucknow
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:917275036866"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 7275036866</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpsgomtinagar.com/Site/Home/250000001_250000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPS-JANKIPURAm.jpg" alt="DPS Jankipuram"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Jankipuram Extn.,
                                            Lucknow
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:918737040977"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 8737040977</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpsjankipuram.com/Site/Home/240000001_240000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPS-Amrapli-Yojna.jpg" alt="DPS Amrapali"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi Public School </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Amrapali Yojna, Dubagga,
                                            Lucknow
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:918707354579"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 8707354579</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpsamrapali.com/Site/Home/270000001_270000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPSBareilly.jpg" alt="DPS Bareilly"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Parsakhera, Bareilly
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:917081444424"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 7081444424</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpsbareilly.com/Site/Home/90000001_90000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPS-Saharanpur.jpg" alt="DPS Saharanpur"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Delhi Road, Saharanpur
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:917088100160"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 7088100160</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpssaharanpur.com/Site/Home/140000001_140000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPS-Gomti-Nagar-Jr-Branch.jpg"
                                alt="DPS Gomti Nagar Junior Branch" class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi Public School Jr.
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307962/fi-rs-map-marker_znpaah.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Gomti Nagar Vistar,
                                            Lucknow
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307956/Vector_6_niwc9i.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:919151112813"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 9151112813</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpsgomtinagar.com/Site/ContactUsNew/250000001_250000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Controls -->
                <div class="absolute left-0 sm:flex hidden items-center justify-between w-full h-0 px-4 top-1/2 hide-circle"
                    data-glide-el="controls">
                    <button
                        class="inline-flex items-center relative sm:right-[66px] justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20"
                        data-glide-dir="<" aria-label="prev slide">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>
                    <button
                        class="inline-flex items-center relative sm:left-[66px] justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20"
                        data-glide-dir=">" aria-label="next slide">
                        <i class="fa-solid fa-angle-right"></i>
                    </button>
                </div>
                <div class="absolute bottom-[-20px] flex items-center justify-center w-full gap-2"
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
    </div>

    <style>
        .swiper-container {
            width: 110%;
            height: auto;
            margin: 0 -88px;
            padding: 40px 0;
        }

        .swiper-slide {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            transform: perspective(1000px) rotateX(2deg) !important;
            animation: curveWave 4s ease-in-out infinite alternate;
        }

        .swiper-slide img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .swiper-wrapper {
            height: auto !important
        }

        @keyframes curveWave {
            0% {
                transform: perspective(800px) rotateX(2deg) rotateY(-2deg);
            }

            100% {
                transform: perspective(800px) rotateX(-2deg) rotateY(2deg);
            }
        }
    </style>


    <div class="relative sm:py-6 py-5 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto mt-10">
        <div class="absolute top-[-235px] -z-50">
            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307222/Group_53_s3txur.png"
                class="w-[100%] h-[100vh] object-top" alt="Allenhouse Banner">
        </div>

        <div class="text-center">
            <h2 class="sm:text-[30px] text-[28px] font-[700] leading-10 text-blue-main relative">Life at Allenhouse</h2>
        </div>

        <div class="mx-5 mt-7">
            <div class="sm:flex gap-3">
                <div class="sm:w-[33.33%]">
                    <div>
                        <a><img src="https://res.cloudinary.com/digy74izv/image/upload/v1748690272/423A0688_1_zpgp7k.png" alt="student 1"
                                class="popup-img rounded-[10px] mb-2 object-cover hover:scale-90 transition delay-300"
                                style="width:100%"></a>
                    </div>
                    <div class="mt-3">
                        <a><img src="https://res.cloudinary.com/digy74izv/image/upload/v1748690272/e_vw3q3p.png" alt="student 2"
                                class="popup-img rounded-[10px] mb-2 object-cover hover:scale-90 transition delay-300"
                                style="width:100%"></a>
                    </div>
                </div>

                <div class="sm:w-[33.33%]">
                    <div>
                        <a><img src="https://res.cloudinary.com/digy74izv/image/upload/v1748690272/0F7A0824_ifi91g.png"
                                alt="student 3"
                                class="popup-img rounded-[10px] object-cover hover:scale-90 transition delay-300"
                                style="width:100%"></a>
                    </div>
                </div>

                <div class="w-[33.33%] sm:block hidden">
                    <div>
                        <a><img src="https://res.cloudinary.com/digy74izv/image/upload/v1748690272/0F7A0772_ultssr.png" alt="student 4"
                                class="popup-img rounded-[10px] mb-2 hover:scale-90 transition delay-300"
                                style="width:100%"></a>
                    </div>
                    <div class="mt-3">
                        <a><img src="assets/images/g11.png" alt="student 5"
                                class="popup-img rounded-[10px] mb-2 hover:scale-90 transition delay-300"
                                style="width:100%"></a>
                    </div>
                    <div>
                        <a><img src="assets/images/g12.png" alt="student 6"
                                class="popup-img rounded-[10px] mb-2 sm:hidden hover:scale-90 transition delay-300"
                                style="width:100%"></a>
                    </div>
                </div>
            </div>

            <div class="mt-[6px] sm:flex gap-3">
                <div>
                    <a><img src="assets/images/g13.png" alt="student 7"
                            class="popup-img rounded-[10px] mb-2 hover:scale-90 transition delay-300"
                            style="width:100%"></a>
                </div>
                <div>
                    <a><img src="https://res.cloudinary.com/digy74izv/image/upload/v1748690272/423A0703_1_jnmmfu.png" alt="student 8"
                            class="popup-img rounded-[10px] mb-2 hover:scale-90 transition delay-300"
                            style="width:100%"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="img-popup">
        <div class="popup-content">
            <img src="" alt="Popup Image">
            <div class="close-btn">
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
    </div>


    <div class="relative sm:mt-20 mt-10" id="testimonials">
        <div class="absolute top-[-235px] -z-50">
            <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307222/Group_53_s3txur.png"
                class="w-[100%] h-[100vh] object-top" alt="Testimonial Shape">
        </div>
        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 px-3">
            <div class="text-center">
                <h2 class="text-[28px] sm:text-[30px] font-[700] leading-10 text-blue-main relative">Testimonials</h2>
            </div>
            <div class="relative  sm:pt-5 pt-2 ">
                <div id="tab-1" class="tab-content current Testimonials">
                    <div class=" overflow-hidden mt-1" data-glide-el="track">
                      <ul class="glide__slides">
                        <?php
                                $s = 1;
                                foreach ($i_data['data'] as $row) {
                            ?> 
                                <li
                                        class=" sm:flex items-start gap-2 mb-4 border-[1px] border-gray-300 p-3 rounded-[8px] bg-blue-main">
                                        <div class="text-center sm:w-[30%] w-[90%]">
                                            <img src="<?php echo $row["media"]["urls"] ?>" alt="Yesha Chawla"
                                                class="mb-2 mx-auto rounded-[10px] w-[130px] h-[130px] ">
                                            <h2 class="font-[700] text-[16px] text-gray-100"><?php echo $row["heading"] ?></h2>
                                        </div>
                                        <div class="sm:w-[60%] w-[90%] sm:mt-0 mt-3  sm:text-left text-center">
                                            <p
                                                class="testimonial-text text-[16px] text-gray-200 text-center sm:text-left clamp-2">
                                                <?php echo $row["description"] ?>
                                            </p>
                                            <button class="moreless-button font-[600] text-white text-sm mt-1">Read
                                                more...</button>
                                        </div>
                                    </li>
                        <?php } ?>  
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative mt-8 mb-10">
            <div class="absolute top-[-235px] -z-50">
                <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730307222/Group_53_s3txur.png"
                    class="w-[100%] h-[100vh] object-top" alt="Testimonial Shape">
            </div>
            <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
                <div class="text-center">
                    <h2 class="text-[28px] sm:text-[32px] font-[700] leading-10  text-blue-main relative">Gallery
                    </h2>
                </div>
                <div class="relative Images sm:pt-5 pt-2  opne-hide-circle">

                    <div class="overflow-hidden mt-1" data-glide-el="track">
                        <ul
                            class="relative w-full overflow-hidden p-0 pb-5 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                            <li class="flex items-start gap-10 mb-4">
                                <div class="flex">
                                    <div><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/ZgUwpzC3W9JnJL9RrBHqP2pdeOTFzqgf8xbQ6KP1.jpg" alt="Image 1"></div>
                                </div>
                            </li>
                            <li class="flex items-start gap-10 mb-4">
                                <div class="flex">
                                    <div><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/rMFku0u9sPJAzG7egXa40O4HNvTnrzsj6fWBcTfO.jpg" alt="Image 2"></div>
                                </div>
                            </li>
                            <li class="flex items-start gap-10 mb-4">
                                <div class="flex">
                                    <div><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/ZU5fpak0zcT0ZUSIjaVhVU0KPN6PdLtq4qjBewPj.jpg" alt="Image 3"></div>
                                </div>
                            </li>
                            <li class="flex items-start gap-10 mb-4">
                                <div class="flex">
                                    <div><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/dRzPQNFenUeQaF39eHY7FMDYC0cYO4CTvIljvYT8.jpg" alt="Image 4"></div>
                                </div>
                            </li>
                            <li class="flex items-start gap-10 mb-4">
                                <div class="flex">
                                    <div><img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/HFkCVmBH2YIQAoxqALcXhWBgy9fFjTo66ltIXgYP.jpg" alt="Image 5"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Controls -->
                    <div class="absolute left-0 hidden sm:flex items-center justify-between w-full h-0 px-4 top-1/2 hide-circle"
                        data-glide-el="controls">
                        <button
                            class="inline-flex items-center relative sm:right-[66px] justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20"
                            data-glide-dir="<" aria-label="prev slide">
                            <i class="fa-solid fa-angle-left"></i>
                        </button>
                        <button
                            class="inline-flex items-center relative sm:left-[66px] justify-center hover:bg-red-500 hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20"
                            data-glide-dir=">" aria-label="next slide">
                            <i class="fa-solid fa-angle-right"></i>
                        </button>
                    </div>

                    <div class="absolute bottom-0 flex items-center justify-center w-full gap-2 hidden"
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
                    <div class="text-center mt-3">
                        <a href="photo-gallery"
                            class="text-[16px]font-[600] rounded-[20px] p-[5px] px-4 border-[1px] border-blue-main  hover:bg-red-500 hover:text-white hover:boder-red-500">View
                            All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>



    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const videos = document.querySelectorAll('#tab-2 video');

            videos.forEach(video => {
                video.addEventListener('play', () => {
                    videos.forEach(otherVideo => {
                        if (otherVideo !== video) {
                            otherVideo.pause();
                        }
                    });
                });
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.2/glide.js"></script>
    <?php include "includes/foot.php" ?>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        //    Start 
        let glide1Initialized = false;
        let glide2Initialized = false;

        function initGlide(selector, perViewCount) {
            return new Glide(selector, {
                type: 'carousel',
                focusAt: 1,
                perView: perViewCount,
                autoplay: 3500,
                animationDuration: 700,
                gap: 10,
                breakpoints: {
                    1680: {
                        perView: perViewCount >= 4 ? 3 : 2
                    },
                    1024: {
                        perView: perViewCount >= 4 ? 2 : 2
                    },
                    820: {
                        perView: 1
                    },
                    640: {
                        perView: 1
                    }
                }
            });
        }

        // Initialize Glide for the first tab (Testimonials - 2 items)
        const glide1 = initGlide('.Testimonials', 2);
        glide1.mount();
        glide1Initialized = true;

        // Tab switch logic
        document.querySelectorAll('.tab-link').forEach(tab => {
            tab.addEventListener('click', function() {
                const tabId = this.getAttribute('data-tab');

                // Update active tab
                document.querySelectorAll('.tab-link').forEach(link => link.classList.remove('current'));
                this.classList.add('current');

                // Toggle tab content
                document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('current'));
                document.getElementById(tabId).classList.add('current');

                // Mount Glide2 when switching to tab-2 for the first time
                if (tabId === 'tab-2' && !glide2Initialized) {
                    const glide2 = initGlide('.Testimonials2', 4); // Show 4 slides
                    glide2.mount();
                    glide2Initialized = true;
                }
            });
        });
    </script>
    <script>
        var glide03 = new Glide('.glide-0333', {
            type: 'carousel',
            focusAt: 'center',
            perView: 3,
            autoplay: 3000,
            animationDuration: 700,
            gap: 24,
            classes: {
                activeNav: '[&>*]:bg-slate-700',
            },
            breakpoints: {
                1024: {
                    perView: 2
                },
                640: {
                    perView: 1
                }
            },
        });

        glide03.mount();

        var glide022 = new Glide('.glide-0222', {
            type: 'carousel',
            focusAt: 'center',
            perView: 3,
            autoplay: 3000,
            animationDuration: 700,
            gap: 24,
            classes: {
                activeNav: '[&>*]:bg-slate-700',
            },
            breakpoints: {
                1024: {
                    perView: 2
                },
                640: {
                    perView: 1
                }
            },
        });
        glide022.mount();

        $(document).ready(function() {
            $('ul.tabs li').click(function() {
                var tab_id = $(this).attr('data-tab');

                $('ul.tabs li').removeClass('current');
                $('.tab-content').removeClass('current');

                $(this).addClass('current');
                $("#" + tab_id).addClass('current');
            });
        });
    </script>
    <script>
        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 4,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            breakpoints: {
                1024: {
                    slidesPerView: 4
                },
                768: {
                    slidesPerView: 2
                },
                480: {
                    slidesPerView: 1
                }
            }
        });
    </script>
    <script>
        $('.moreless-button').click(function() {
            const moreText = $(this).siblings('.moretext');
            moreText.slideToggle();

            if ($(this).text() == "Read less") {
                $(this).text("Read more...");
            } else {
                $(this).text("Read less");
            }
        });
    </script>
    <script>
        var Images = new Glide('.Images', {
            type: 'carousel',
            focusAt: 1,
            perView: 4,
            autoplay: 3500,
            animationDuration: 700,
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
                    perView: 1.2
                }
            },
        });
        Images.mount();

        var Videos = new Glide('.videos', {
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
        Videos.mount();
    </script>
    <script>
        let count = document.querySelectorAll(".count")
        let arr = Array.from(count)
        arr.map(function(item) {
            let startnumber = 0

            function counterup() {
                startnumber++
                item.innerHTML = startnumber

                if (startnumber == item.dataset.number) {
                    clearInterval(stop)
                }
            }

            let stop = setInterval(function() {
                counterup()
            }, .002)

        })
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new Swiper(".mySwiper", {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var imgPopup = $('.img-popup');
            var popupImage = $('.img-popup img');
            var closeBtn = $('.close-btn');

            // Open on image click
            $('.popup-img').on('click', function() {
                var img_src = $(this).attr('src');
                popupImage.attr('src', img_src);
                imgPopup.addClass('opened');
            });

            // Close popup
            imgPopup.on('click', function() {
                imgPopup.removeClass('opened');
                popupImage.attr('src', '');
            });

            closeBtn.on('click', function() {
                imgPopup.removeClass('opened');
                popupImage.attr('src', '');
            });

            popupImage.on('click', function(e) {
                e.stopPropagation();
            });

            // ESC key to close
            $(document).on('keydown', function(e) {
                if (e.key === "Escape") {
                    imgPopup.removeClass('opened');
                    popupImage.attr('src', '');
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll(".moreless-button");

            buttons.forEach(button => {
                button.addEventListener("click", function() {
                    const para = this.previousElementSibling;
                    para.classList.toggle("expanded");
                    para.classList.toggle("clamp-2");

                    this.textContent = para.classList.contains("expanded") ? "Read less" :
                        "Read more...";
                });
            });
        });
    </script>
    <script>
        window.addEventListener('load', () => {
            document.getElementById('formOverlay').classList.remove('hidden');
        });

        document.getElementById('dismissPopup').addEventListener('click', () => {
            document.getElementById('formOverlay').classList.add('hidden');
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabs = document.querySelectorAll(".tab-link");
            const contents = document.querySelectorAll(".tab-content");

            tabs.forEach(tab => {
                tab.addEventListener("click", function() {
                    const tabId = this.getAttribute("data-tab");

                    // Remove 'current' from all tabs and contents
                    tabs.forEach(t => t.classList.remove("current"));
                    contents.forEach(c => c.classList.remove("current"));

                    // Add 'current' to the clicked tab and its content
                    this.classList.add("current");
                    document.getElementById(tabId).classList.add("current");

                    // Stop all videos if switching away from video tab
                    if (tabId !== "tab-2") {
                        const videos = document.querySelectorAll("#tab-2 video");
                        videos.forEach(video => {
                            video.pause();
                            video.currentTime = 0; // Optional: reset to beginning
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
