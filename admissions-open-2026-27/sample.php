<?php
include "apis.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allenhouse Agra | Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" type="image/x-icon"
    href="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/ZORSdJXNGlZAVQJ4ZNWZsMEVZ1thgvBkL8JeOSXH.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="robots" content="noindex, nofollow" />
</head>
<style>
#successMessage {
  transition: opacity 0.3s ease;
}

    #scroll {
        position: fixed;
        right: 10px;
        bottom: 30px;
        cursor: pointer;
        width: 50px;
        height: 50px;
        background: #fff;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        text-indent: -9999px;
        display: none;
        -webkit-border-radius: 60px;
        -moz-border-radius: 60px;
        border-radius: 60px;
        cursor: pointer;
        z-index: 99999;
    }

    #scroll span {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-left: -8px;
        margin-top: -12px;
        height: 0;
        width: 0;
        border: 8px solid transparent;
        border-bottom-color: #000;
    }

    .topper-card::after {
        content: '';
        height: 70%;
        width: 100%;
        background-color: #053B7A;
        opacity: 1;
        position: absolute;
        bottom: 0;
    }

    @keyframes blinkShadow {

        0%,
        100% {
            box-shadow: 0 0 0 0 rgba(227, 30, 36, 0.5);
        }

        50% {
            box-shadow: 0 0 12px 6px rgba(227, 30, 36, 0.8);
        }
    }

    .blink-button {
        animation: blinkShadow 1s infinite;
    }
</style>
<div id="esuccessPopup" class="relative fixed  bg-green-500 text-white px-4 py-2 rounded mb-5 hidden"
    style="z-index:9999; position: fixed; right: 0; top: 20%;">
    Form submitted successfully!
</div>

<body style="overflow-x: hidden">
    <div class="main" style="overflow-x: hidden;">
        <header class="sticky top-0 z-90 md:px-5 w-[100%] bg-white md:h-[100px]" style="z-index: 9999;">
            <div class="main-header flex md:justify-center justify-between px-3 items-center p-[8px]">
                <div class="md:flex md:w-[50%]">
                    <img src="assets/images/logo.png" class="md:w-[200px] w-[150px]" alt="logo">
                </div>
                <div class="md:w-[50%] flex justify-end">
                    <a href=""
                        class="transition-all hover:bg-[#F4131B] bg-[#053B7A] text-[#fff] md:p-3 p-2  md:px-5 px-3 font-[500] md:text-[16px] text-[13px] rounded-[25px]"
                        style="white-space: nowrap;">Download E-Brochure</a>
                </div>
            </div>
        </header>
        <div class="main-content">
            <!--==== START ====-->
            <section class="hero-bg relative " id="switchForm">
                <div class="md:flex ">
                    <div class="md:w-[50%] md:p-10 p-5 md:pt-[110px] relative z-10">
                        <div class="text-center" data-aos="fade-right">
                            <h2
                                class="md:text-5xl lg:text-4xl xl:text-5xl 2xl:text-5xl text-2xl font-[700] md:leading-14 inline-flex mb-0 text-white">
                                 North India's Leading Group of Institutions
                            </h2>
                            <p class="md:text-[18px] md:mt-5 mt-2 mb-5 md:font-[400] text-white">Nurturing Future Leaders at the Best ICSE School in Agra
                            </p>
                        </div>
                        <div class="bg-[#fff] mt-5 md:h-[140px] md:w-[500px] mx-auto rounded-[10px]"
                            data-aos="fade-right" data-aos-duration="1500">
                            <div class="bg-red-main text-center rounded-[10px]">
                                <h2 class="md:text-[30px] font-[600] text-white p-3">Admissions Open for 2026-27</h2>
                            </div>
                            <div class="md:mt-5 md:p-0 p-2 flex justify-between md:px-5 gap-3 items-center">
                                <a href=""
                                    class="md:font-[500] text-[#132959] text-center md:text-[20px] text-[15px]">Class PG to VIII </a>
                                <a href="" class="text-[#132959]">|</a>
                                <a href=""
                                    class=" md:font-[500] text-[#132959] text-center md:text-[20px] text-[15px]">Scholarships Available </a>
                            </div>
                        </div>
                    </div>

                    <div class="md:w-[50%] py-1 relative z-10">
                        <div
                            class="bg-[#E31E24] border-[1px] border-white text-white rounded-[8px] md:m-10 md:pb-6 p-6 md:w-[400px] md:mx-auto mx-[10px] slideLeft">
                           <form class="space-y-4" id="enquiryForm" action="" method="POST">

    <!-- Grade Selection -->
    <div>
        <label for="egrade" class="font-[500] text-[14px]">Select Grade</label>
        <select name="class-selection" id="egrade" required
            class="border-[1px] p-2 w-[100%] bg-[#fff] text-gray-500 outline-none mt-1 rounded-[5px]">
            <option value="" disabled selected>Select Grade</option>
            <?php include 'grade-api.php'; ?>
        </select>
        <span id="classError" class="text-black text-sm mt-2 hidden">Please select a class.</span>
    </div>

    <!-- Student Name -->
    <div>
        <label for="estudent_name" class="font-[500] text-[14px]">Student Name</label>
        <input type="text" name="student-name" id="estudent_name" placeholder="Enter Student Name"
            class="border-[1px] p-2 w-[100%] bg-[#fff] text-gray-500 outline-none mt-1 rounded-[5px] " required>
        <span id="student-error" class="text-black text-sm mt-2 hidden">Only letters and spaces allowed.</span>
    </div>

    <!-- Parent Name -->
    <div>
        <label for="eparent_name" class="font-[500] text-[14px]">Parent Name</label>
        <input type="text" name="parent-name" id="eparent_name" placeholder="Enter Parent Name"
            class="border-[1px] p-2 w-[100%] bg-[#fff] text-gray-500 outline-none mt-1 rounded-[5px] " required>
        <span id="parent-error" class="text-black text-sm mt-2 hidden">Only letters and spaces allowed.</span>
    </div>

    <!-- Mobile Number -->
    <div>
        <label for="emobile" class="font-[500] text-[14px]">Mobile Number</label>
        <input type="text" name="mobile" id="emobile" placeholder="Enter Mobile Number"
            class="border-[1px] p-2 w-[100%] bg-[#fff] text-gray-500 outline-none mt-1 rounded-[5px] " required maxlength="10">
        <span id="mobile-error" class="text-black text-sm mt-2 hidden">Please enter a valid phone number</span>
    </div>

    <!-- Email -->
    <div>
        <label for="eemail" class="font-[500] text-[14px]">Email</label>
        <input type="text" name="email" id="eemail" placeholder="Enter Email"
            class="border-[1px] p-2 w-[100%] bg-[#fff] text-gray-500 outline-none mt-1 rounded-[5px] " required>
        <span id="email-error" class="text-black text-sm mt-2 hidden">Please enter a valid email address.</span>
    </div>

    <!-- City Selection (API + Searchable Dropdown) -->
    <div class="mt-2 relative customSelect">
        <label class="font-[500] text-[14px]">City</label>
        <select id="ecity" name="city" class="hidden" required>
            <option value="">Select City</option>
            <?php include 'get-city.php'; ?>
        </select>

        <!-- Fake dropdown display -->
        <div
            class="border border-black bg-white text-gray-300 p-3 rounded-md bg-black cursor-pointer flex justify-between items-center mt-1">
            <span class="selected-text text-[#808080cc]">Select City</span>
            <span>â–¼</span>
        </div>

        <!-- Dropdown options -->
        <div class="absolute mt-1 border border-black bg-white text-gray-300 rounded-md bg-black shadow-md hidden z-50 w-full">
            <input type="text" placeholder="Search..." class="w-full p-2 border-b border-black bg-white text-gray-300 outline-none">
            <ul class="max-h-48 overflow-y-auto"></ul>
        </div>
    </div>

    <!-- Pincode -->
    <div>
        <label for="epincode" class="font-[500] text-[14px]">Pincode</label>
        <input type="text" name="pincode" id="epincode" placeholder="Enter Pincode"
            class="border-[1px] p-2 w-[100%] bg-[#fff] text-gray-500 outline-none mt-1 rounded-[5px] " maxlength="6"
            oninput="this.value=this.value.replace(/\D/g,'')" required>
        <span id="pincode-error" class="text-black text-sm mt-2 hidden">Please enter a valid Pincode.</span>
    </div>

    <!-- Terms Checkbox -->
    <div class="flex items-start gap-2">
        <input type="checkbox" id="popupCheckbox" required class="mt-1">
        <label for="popupCheckbox" class="text-sm text-white">I agree to <a href="termsandconditions"
                class="text-blue-600 underline">Terms and Conditions</a>.</label>
        <span id="checkboxError" class="text-black text-sm mt-2 hidden">You must agree to the terms and conditions.</span>
    </div>

    <input type="hidden" name="source" id="source" value="landingpage">

    <!-- Submit Button -->
    <button type="submit" id="submitBtn"
        class=" bg-[#053B7A] p-2 w-[100%] text-white rounded-[50px] enquiry-btn transition-all border-[1px] border-[#fff] cursor-pointer">Enquire Now</button>
</form>

<div id="successMessage" class="hidden fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white font-medium py-2 px-4 rounded shadow-md z-50 transition-opacity duration-300">
    Form submitted successfully!
</div>


                        </div>
                    </div>
                </div>
            </section>

            <!--==== START ====-->
            <section class="mt-8 py-10 ">
                <div>
                    <div class="text-center">
                        <h2 class="md:text-3xl text-2xl font-[600] text-[#053B7A]">Our Advanced Academic Model </h2>
                    </div>
                    <div class="text-center mt-10 relative">
                        <h3
                            class="bg-[#E31E24] inline font-[600] md:text-[30px] text-[11px] text-white rounded-[50px] md:pl-5 pl-2 p-3 pr-0 relative whitespace-nowrap">
                            ACHIEVER <span
                                class="ml-[10px] rounded-[50px] md:p-[13px] relative md:bottom-1 md:right-[5px] right-[2px] p-[10px]  text-[#154173] md:text-[20px] text-[10px]"
                                style="background: #FFFFFF;">An 8-Dimensional Approach for Holistic Education</span>
                            <div class="absolute right-10 md:bottom-[35px] bottom-[25px]">
                                <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/Q7XYOna6eZGW6ADf0fZVKFDQpIGLv2VRbt0Lpp8T.png"
                                    class="md:w-[70px] w-[45px] animate-bounce" alt="">
                            </div>
                        </h3>

                    </div>
                </div>
                <div class="grid md:grid-cols-4  grid-cols-2 md:p-10 p-4 mt-10 justify-center">

                    <div data-aos="zoom-out-left"
                        class="text-center md:border-b-[1px] md:border-r-[1px] border-[#D3D3D3] pb-5 cursor-pointer academic-animation">
                        <div
                            class="md:h-[90px] md:w-[90px] h-[75px] w-[75px] rounded-[50%] bg-[#053B7A] flex justify-center items-center mx-auto">
                            <span><img
                                    src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/WbCmOJi4GGv4sSGiGbDUGP4JH0PcfjD4ipvu5MqB.png"
                                    class="aca-img" alt=""></span>
                        </div>
                        <h2 class="md:text-[18px] text-[16px] mt-3 font-[500]">Advanced <br class="md:hidden block">
                            Academics</h2>
                    </div>

                    <div data-aos="zoom-out-left"
                        class="text-center  md:border-b-[1px] md:md:border-r-[1px] border-[#D3D3D3] pb-5">
                        <div
                            class="md:h-[90px] md:w-[90px] h-[75px] w-[75px] rounded-[50%] bg-[#053B7A] flex justify-center items-center mx-auto">
                            <span><img src="assets/images/bulb.png" alt=""></span>
                        </div>
                        <h2 class="md:text-[18px] text-[16px] mt-3 font-[500]">Creative <br class="md:hidden block">
                            Co-Curricular</h2>
                    </div>
                    <div data-aos="zoom-out-left"
                        class="text-center md:border-b-[1px] md:border-r-[1px] border-[#D3D3D3] pb-5 md:pt-0 pt-5">
                        <div
                            class="md:h-[90px] md:w-[90px] h-[75px] w-[75px] rounded-[50%] bg-[#053B7A] flex justify-center items-center mx-auto">
                            <span><img src="assets/images/bheart.png" alt=""></span>
                        </div>
                        <h2 class="md:text-[18px] text-[16px] mt-3 font-[500]">Health & Wellness <br
                                class="md:hidden block"> Empowered</h2>
                    </div>
                    <div data-aos="zoom-out-left"
                        class="text-center md:border-b-[1px] border-[#D3D3D3] pb-5 md:pt-0 pt-5">
                        <div
                            class="md:h-[90px] md:w-[90px] h-[75px] w-[75px] rounded-[50%] bg-[#053B7A] flex justify-center items-center mx-auto">
                            <span><img src="assets/images/playb.png" alt=""></span>
                        </div>
                        <h2 class="md:text-[18px] text-[16px] mt-3 font-[500]">Inspiring mdart <br
                                class="md:hidden block"> Skills for Life</h2>
                    </div>
                    <div data-aos="zoom-out-left"
                        class="text-center md:border-r-[1px] md:border-b-[0px] border-[#D3D3D3] pt-5 ">
                        <div
                            class="md:h-[90px] md:w-[90px] h-[75px] w-[75px] rounded-[50%] bg-[#053B7A] flex justify-center items-center mx-auto">
                            <span><img
                                    src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/BOuzkZQSBgwV2NDF364ZFpkmYXFXyIzNmxRxZUNJ.png"
                                    alt=""></span>
                        </div>
                        <h2 class="md:text-[18px] text-[16px] mt-3 font-[500] md:mb-0 mb-5">Empathetic Social <br
                                class="md:hidden block">
                            Responsibility</h2>
                    </div>
                    <div data-aos="zoom-out-left"
                        class="text-center md:border-r-[1px] md:border-b-[0px]  border-[#D3D3D3] pt-5 ">
                        <div
                            class="md:h-[90px] md:w-[90px] h-[75px] w-[75px] rounded-[50%] bg-[#053B7A] flex justify-center items-center mx-auto">
                            <span><img
                                    src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/9GYsALwSaQQh4mK6ydQC8DiiWdSnwFFHsFYFkV62.png"
                                    alt=""></span>
                        </div>
                        <h2 class="md:text-[18px] text-[16px] mt-3 font-[500]">Versatile Tech <br
                                class="md:hidden block"> Vision</h2>
                    </div>
                    <div data-aos="zoom-out-left" class="text-center md:border-r-[1px] border-[#D3D3D3] pt-5 ">
                        <div
                            class="md:h-[90px] md:w-[90px] h-[75px] w-[75px] rounded-[50%] bg-[#053B7A] flex justify-center items-center mx-auto">
                            <span><img
                                    src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/Z1LJDQxBWTVWLIgOKJ9DHBGQuYyFsnATBB6jUoss.png"
                                    alt=""></span>
                        </div>
                        <h2 class="md:text-[18px] text-[16px] mt-3 font-[500]">Excellence in <br
                                class="md:hidden block"> Communication</h2>
                    </div>
                    <div data-aos="zoom-out-left" class="text-center pt-5">
                        <div
                            class="md:h-[90px] md:w-[90px] h-[75px] w-[75px] rounded-[50%] bg-[#053B7A] flex justify-center items-center mx-auto">
                            <span><img
                                    src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/AyVLrJtLjOlXlYUhXzibQuAjPG8ErMKqgBcVtAHC.png"
                                    alt=""></span>
                        </div>
                        <h2 class="md:text-[18px] text-[16px] mt-3 font-[500]">Robust Sports <br
                                class="md:hidden block">Program</h2>
                    </div>
                </div>
            </section>
            <!--==== END ====-->

            <!--==== START ====-->
            <section class="md:mt-[60px] mt-8 ">
                <div class="md:flex md:mx-auto mx-[20px] gap-10 xl:w-[1280px] lg:w-[1080px] mx-2">
                    <h2 class="text-[36px] font-[600] text-[#053B7A] md:hidden block md:mb-0 mb-5 text-center">About Us
                    </h2>

                    <div class="relative md:w-[50%]" data-aos="fade-right" data-aos-offset="300"
                        data-aos-easing="ease-in-sine">
                        <div id="circleContainer"
                            class="bg-[url('assets/images/achievement-bg.png')] md:h-[500px] md:w-[500px] w-[300px] h-[300px] rounded-full flex items-center justify-center mx-auto bg-cover">
                            <button id="openModalBtn"
                                class="blink-button cursor-pointer w-[70px] h-[70px] flex items-center justify-center rounded-full bg-[#fff] border-[5px] border-[#E31E24]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="28" viewBox="0 0 9 16">
                                    <path fill="#053B7A"
                                        d="M7.62 7.18L2.79 3.03c-.7-.6-1.79-.1-1.79.82v8.29c0 .93 1.09 1.42 1.79.82l4.83-4.14c.5-.43.5-1.21 0-1.64" />
                                </svg>
                            </button>
                        </div>

                        <!-- <div class="o-video mx-auto hidden" id="videoContainer">
                            <div class="w-full aspect-video">
                                <iframe class="w-full h-full"
                                    src="https://www.youtube.com/embed/1Vzi5P3yE7c?autoplay=1&mute=1&loop=1&playlist=1Vzi5P3yE7c"
                                    frameborder="0" allow="autoplay;" allowfullscreen>
                                </iframe>
                            </div>
                        </div> -->

                    </div>

                    <div class="md:w-[50%] md:mt-5 mt-7" data-aos="fade-left" data-aos-anchor="#example-anchor"
                        data-aos-offset="500" data-aos-duration="500">
                        <h2 class="text-[42px] font-[600] text-[#053B7A] hidden md:block">About Us</h2>
                        <p class="mt-2 text-gray-500">
                           Your childâ€™s bright future deserves more than just a classroom, it needs a vision.</p>
 <p class="mt-2 text-gray-500">At Allenhouse Public School, Agra, we believe that great education goes beyond textbooks. As a leading ICSE school in Agra, we offer a nurturing environment. It is a world of academic brilliance and all-round development.</p>
 <p class="mt-2 text-gray-500">Backed by the legacy of Allenhouse Group, our school combines a future-ready curriculum, experienced faculty, and world-class infrastructure to shape confident, capable learners. Our classrooms, labs, sports fields, and every corner is designed to help young learners explore and grow. Choose the best school in Agra where your childâ€™s potential turns into purpose. </p>

 <p class="mt-2 text-gray-500 italic">Fill out the form above to kickstart the APS admission process!


                        </p>
                    </div>
                </div>
            </section>
            <!--==== END ====-->

            

            <!--==== START ====-->
            <section class="md:mt-20 mt-10 future-skill-bg">
                <div class="md:mx-10 mx-4">
                    <div class="text-center text-white pt-10 relative z-10">
                        <h2 class="text-[36px] leading-11 mt-4  text-[#fff] font-[600]">Shaping Tomorrowâ€™s Leaders</h2>
                        <p class="text-gray-500 mt-3 text-[18px] text-white">
                           As a leading ICSE school in Agra, we build future-ready skills. From tech and creativity to emotional intelligence and sportsmanship, we nurture every childâ€™s full potential. 
                        </p>
                    </div>
                    <div class="swiper carousel2 mt-10">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide p-4 mb-2 bg-white transition-all cursor-pointer hover:translate-y-[-5px]"
                                style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                                    <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/BOEt8e9CXYsV7g9M2icjRCH47bn8hj2idDsCwgbQ.png"
                                        class="w-[100%]" alt="PG - 1" />
                                    <div class="bg-white mt-2">
                                        <h2 class="text-[22px] font-[600] text-[#2C4073]">Robotics Academy </h2>
                                        <p class="text-[16px] text-[#70747F] mt-1">Experiential learning bridges theory
                                            and real-world application.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide p-4 mb-2 bg-white transition-all cursor-pointer hover:translate-y-[-5px]"
                                style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                                    <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/B11keJtDobW3VMb9zj59vHOZZ1ZrNd6iiwZXqRGt.png"
                                        class="w-[100%]" alt="PG - 1" />
                                    <div class="bg-white mt-2">
                                        <h2 class="text-[22px] font-[600] text-[#2C4073] md:leading-6 leading-8">Oluxi
                                            Smart Skills</h2>
                                        <p class="text-[16px] text-[#70747F] mt-1">
                                            A globally aligned, personalized program for motivated learners.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide p-4 mb-2 bg-white transition-all cursor-pointer hover:translate-y-[-5px]"
                                style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                                    <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/OM6Ogo6LaAvPAQ8WOuDhVLONk8flstXQSLiJaeqL.png"
                                        class="w-[100%]" alt="PG - 1" />
                                    <div class="bg-white mt-2">
                                        <h2 class="text-[22px] font-[600] text-[#2C4073]">Northwest Sports Academy </h2>
                                        <p class="text-[16px] text-[#70747F] mt-1">Holistic child development through
                                            structured sports training</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide p-4 mb-2 bg-white transition-all cursor-pointer hover:translate-y-[-5px]"
                                style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                                    <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/o2GTnECp3ljmns47YaDIV5MeI6WlTXYhDyUTpO2M.png"
                                        class="w-[100%]" alt="PG - 1" />
                                    <div class="bg-white mt-2">
                                        <h2 class="text-[22px] font-[600] text-[#2C4073]">Coding Academy</h2>
                                        <p class="text-[16px] text-[#70747F] mt-1">Equipping students with the language
                                            of the future.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide p-4 mb-2 bg-white transition-all cursor-pointer hover:translate-y-[-5px]"
                                style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                                    <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/OmCxwKlu8Iz6DzDv3mXVxPx78gQWYFr3QKO4oA4c.png"
                                        class="w-[100%]" alt="PG - 1" />
                                    <div class="bg-white mt-2">
                                        <h2 class="text-[22px] font-[600] text-[#2C4073] md:leading-6 leading-8">
                                            Animation Master Class</h2>
                                        <p class="text-[16px] text-[#70747F] mt-1">Fostering creativity through art and
                                            technology integration.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide p-4 mb-2 bg-white transition-all cursor-pointer hover:translate-y-[-5px]"
                                style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                                    <img src="assets/images/blog-img.png" class="w-[100%]" alt="PG - 1" />
                                    <div class="bg-white  mt-2">
                                        <h2 class="text-[22px] font-[600] text-[#2C4073] md:leading-6 leading-8">Social
                                            Emotional Learning
                                        </h2>
                                        <p class="text-[16px] text-[#70747F] mt-1">Building emotional intelligence,
                                            empathy, and interpersonal skills.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide p-4 mb-2 bg-white transition-all cursor-pointer hover:translate-y-[-5px]"
                                style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                                    <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/B11keJtDobW3VMb9zj59vHOZZ1ZrNd6iiwZXqRGt.png"
                                        class="w-[100%]" alt="PG - 1" />
                                    <div class="bg-white mt-2">
                                        <h2 class="text-[22px] font-[600] text-[#2C4073] md:leading-6 leading-8">
                                            Cambridge Assessment</h2>
                                        <p class="text-[16px] text-[#70747F] mt-1">The world-class program builds strong
                                            academics, preparing students to become confident global citizens.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:swiper-button-next"></div>
                        <div class="md:swiper-button-prev"></div>
                    </div>
                </div>
            </section>
            <!--==== END ====-->

            <!--==== Start ====-->
            <section class="md:mt-[90px] mt-10">
                <div class="bg-[#053B7A] relative">
                    <div data-aos="fade-right"
                        class="md:flex justify-around items-center md:mx-2 mx-2 md:text-start text-center md:py-0 py-4 md:pt-0 pt-5 md:py-0 py-10">
                        <div class="mt-[-35px] relative bottom-[-7px]">
                            <img src="assets/images/announce.webp" class="md:w-[450px] mx-auto  text-center"
                                alt="Announce">
                        </div>
                        <div class="text-white">
                            <h2 class="md:text-[30px] text-2xl font-[500] md:leading-12 md:mt-0 mt-4">Visit Our Campus <br>
                                Experience the
                                Atmosphere</h2>
                        </div>
                        <div data-aos="fade-left" class="pb-5 mt-[25px]">
                            <a href="#switchForm"
                                class="transition-all hover:bg-[#F4131B] bg-white p-3 px-5 font-[500] md:text-[16px] justify-center items-center text-[15px] rounded-[30px] hover:bg-red-main flex gap-2 relative z-90"
                                style="white-space: nowrap;">Download Fee Structure <svg
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 24 24">
                                    <g fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2">
                                        <path stroke-dasharray="20" stroke-dashoffset="20" d="M3 12h17.5">
                                            <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s"
                                                values="20;0" />
                                        </path>
                                        <path stroke-dasharray="12" stroke-dashoffset="12" d="M21 12l-7 7M21 12l-7 -7">
                                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s"
                                                dur="0.2s" values="12;0" />
                                        </path>
                                    </g>
                                </svg></a>
                        </div>
                    </div>
                </div>
            </section>
            <!--==== END ====-->

            <!--==== Start ====-->
            <section class="">
                <div class="md:mx-[100px] mx-[10px] rounded-[20px] md:p-10 p-3 md:py-15 py-8">
                    <div class="text-center">
                        <h2 class="md:text-4xl text-[24px] font-[600] text-[#053B7A]">
                           Why Parents Trust  <br>
                            <span class="inline-flex gap-2 items-center">Allenhouse, Agra</span>
                        </h2>
                        <p class="text-[#424242] mt-3 font-[400] text-[16px]">
                            Recognised as a leading ICSE school in Agra, Allenhouse brings together academic excellence 
                            <br>
                            with values. Our thoughtfully designed environment empowers children to grow as confident and
                            <br>
                            compassionate individuals, ready to lead in a changing world.
                        </p>
                    </div>
                    <div class="sm:flex flex-wrap grid grid-cols-2 items-center justify-center gap-10 mx-auto mt-10 md:w-[1100px]">

                        <div data-aos="fade-right"
                            class="group rounded-[10px] sm:w-[245px] w-[150px] h-[150px] sm:h-[202px] border-[1px] border-blue-700 bg-[#053B7A] hover:bg-[#0E65CC] transition-all duration-500 p-3 sm:py-10 text-center cursor-pointer aos-init aos-animate">
                            <div
                                class="flex items-center justify-center h-[60px] w-[60px] mx-auto bg-white rounded-full mb-3 transform transition-transform duration-500 group-hover:rotate-360">
                                <svg width="35" height="35" viewBox="0 0 52 52" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M39.4192 27.1489C39.1604 34.3386 33.2391 40.0993 26.0031 40.0993C18.7671 40.0993 12.846 34.3384 12.587 27.1489H1.63477V29.711L6.66584 30.4875C6.86771 30.5185 7.03334 30.6738 7.07475 30.8705C7.33872 32.0661 7.71657 33.2515 8.20826 34.385C8.29108 34.5713 8.24967 34.7887 8.09957 34.9336L4.48675 38.5206L8.0789 43.4689L12.6027 41.1345C12.7838 41.0413 13.0064 41.0672 13.1617 41.2018C14.0778 42.0145 15.0819 42.7442 16.143 43.3809C16.319 43.4844 16.4122 43.6863 16.3811 43.8881L15.5633 48.914L21.3759 50.8084L23.6637 46.2587C23.7568 46.0776 23.9535 45.9689 24.1502 45.9844C25.4908 46.1035 26.5001 46.1035 27.8407 45.9844H27.8821C28.0684 45.9844 28.2392 46.0879 28.3272 46.2587L30.615 50.8084L36.4276 48.914L35.6097 43.8881C35.5787 43.6863 35.6719 43.4844 35.8479 43.3809C36.9141 42.7443 37.9182 42.0145 38.824 41.207C38.9793 41.0725 39.2019 41.0414 39.383 41.1346L43.912 43.4689L47.5041 38.5206L43.8913 34.9337C43.7464 34.7887 43.705 34.5713 43.7826 34.385C44.2743 33.2515 44.6574 32.0662 44.9161 30.8705C44.9576 30.6687 45.1232 30.5186 45.3251 30.4875L50.3561 29.7111V27.149L39.4192 27.1489Z"
                                        fill="#053B7A" stroke="#053B7A" />
                                    <path
                                        d="M5.71284 16.3364L8.09899 18.4172V26.1555H9.09278V18.1846C9.09278 18.0397 9.03066 17.9051 8.92197 17.8119L6.29254 15.5242C6.48923 15.1256 6.6031 14.6754 6.6031 14.2043C6.6031 12.5583 5.26255 11.2178 3.62174 11.2178C1.98093 11.2178 0.640381 12.5583 0.640381 14.2043C0.640381 15.8503 1.98093 17.1908 3.62174 17.1908C4.43439 17.1908 5.17461 16.8644 5.71284 16.3364Z"
                                        fill="#053B7A" stroke="#053B7A" />
                                    <path
                                        d="M48.3832 11.2178C46.7373 11.2178 45.4019 12.5583 45.4019 14.2043C45.4019 14.6649 45.5106 15.0946 45.6917 15.4828L43.1244 17.284C42.9899 17.3772 42.9122 17.5273 42.9122 17.6929V26.1554H43.906V17.946L46.2559 16.2949C46.7994 16.8435 47.5499 17.1852 48.3781 17.1852C50.024 17.1852 51.3594 15.8446 51.3594 14.1986C51.3594 12.5527 50.024 11.2178 48.3832 11.2178Z"
                                        fill="#053B7A" stroke="#053B7A" />
                                    <path
                                        d="M10.5882 9.60275V16.1038C10.5882 16.3056 10.7125 16.492 10.8988 16.5644L18.0468 19.4216V26.5437C18.0468 26.818 18.2694 27.0406 18.5437 27.0406C18.818 27.0406 19.0406 26.818 19.0406 26.5437V19.0903C19.0406 18.8884 18.9163 18.7021 18.73 18.6296L11.582 15.7725V9.60275C12.9899 9.36465 14.0665 8.13797 14.0665 6.6628C14.0665 5.01682 12.7259 3.67627 11.0851 3.67627C9.44433 3.67627 8.10378 5.01682 8.10378 6.6628C8.0986 8.13797 9.17521 9.36464 10.5882 9.60275Z"
                                        fill="#053B7A" stroke="#053B7A" />
                                    <path
                                        d="M25.5052 8.1225V26.5851C25.5052 26.8594 25.7278 27.082 26.0021 27.082C26.2765 27.082 26.499 26.8594 26.499 26.5851V8.1225C28.1812 7.87923 29.4804 6.42995 29.4804 4.67532C29.4804 2.75505 27.9172 1.19189 25.997 1.19189C24.0767 1.19189 22.5135 2.75505 22.5135 4.67532C22.5187 6.42478 23.8231 7.87922 25.5052 8.1225Z"
                                        fill="#053B7A" stroke="#053B7A" />
                                    <path
                                        d="M33.4614 27.0455C33.7357 27.0455 33.9583 26.8229 33.9583 26.5486V18.9296L41.1062 16.0724C41.2926 15.9948 41.4168 15.8136 41.4168 15.6118V9.60763C42.8247 9.36954 43.9013 8.14286 43.9013 6.66768C43.9013 5.02171 42.5607 3.68115 40.9199 3.68115C39.2739 3.68115 37.9385 5.02171 37.9385 6.66768C37.9385 8.14286 39.0151 9.36952 40.423 9.60763V15.2753L33.275 18.1325C33.0887 18.2101 32.9645 18.3913 32.9645 18.5931V26.5487C32.9645 26.823 33.187 27.0455 33.4614 27.0455Z"
                                        fill="#053B7A" stroke="#053B7A" />
                                </svg>

                            </div>
                            <h2 class="text-white group-hover:text-red-500 font-[600] transition-colors duration-500">
                                Tech-Smart
                                <br>
                                Classrooms</h2>
                        </div>

                        <div data-aos="fade-right"
                            class="group rounded-[10px] sm:w-[245px] w-[150px] h-[150px] sm:h-[202px] border-[1px] border-blue-700 bg-[#053B7A] hover:bg-[#0E65CC] transition-all duration-500 p-3 sm:py-10 text-center cursor-pointer aos-init aos-animate">
                            <div
                                class="flex items-center justify-center h-[60px] w-[60px] mx-auto bg-white rounded-full mb-3 transform transition-transform duration-500 group-hover:rotate-360">
                                <svg width="35" height="35" viewBox="0 0 54 60" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M49.9526 35.627C48.0128 34.5106 45.7383 34.4821 43.841 35.3482C44.1161 33.7736 44.0475 32.145 43.6211 30.5558C43.5695 30.3631 43.5118 30.1728 43.4505 29.9843C44.0378 28.2169 44.1677 26.3586 43.8543 24.5664C44.7295 24.9664 45.6855 25.1768 46.6517 25.1768C47.7808 25.1768 48.925 24.8907 49.9708 24.2888C53.149 22.453 54.2422 18.38 52.4075 15.209C50.569 12.0343 46.4871 10.9421 43.3083 12.7737C41.3691 13.8925 40.2067 15.8441 40.0099 17.9176C38.7813 16.8927 37.3346 16.1369 35.7415 15.7102C35.5484 15.6587 35.3547 15.6126 35.1609 15.5714C33.9195 14.181 32.3714 13.1392 30.6606 12.5137C32.3623 11.3082 33.4762 9.32745 33.4762 7.09097C33.4762 3.42533 30.4881 0.443359 26.8149 0.443359C23.1417 0.443359 20.1536 3.42533 20.1536 7.09097C20.1536 9.32806 21.2675 11.3088 22.9699 12.5143C21.2468 13.147 19.7224 14.1919 18.5163 15.5284C16.6864 15.9035 15.0065 16.72 13.6072 17.8861C13.5719 17.5164 13.507 17.1472 13.4086 16.7818C12.9476 15.0665 11.8447 13.6337 10.3045 12.747C8.76365 11.8579 6.96776 11.6215 5.249 12.0815C3.53024 12.5409 2.09388 13.6416 1.20535 15.1799C-0.63002 18.3564 0.463186 22.4293 3.64259 24.2591C4.6696 24.8513 5.80957 25.1543 6.96412 25.1537C7.5423 25.1537 8.12474 25.078 8.69806 24.9246C9.06368 24.827 9.41533 24.6985 9.75301 24.5446C9.4791 26.1168 9.54833 27.7436 9.97407 29.3303C10.0257 29.523 10.0834 29.7133 10.1447 29.9018C9.55744 31.6698 9.42747 33.5287 9.74025 35.3215C7.84232 34.453 5.56603 34.4797 3.62498 35.5973C0.44618 37.4307 -0.647025 41.5055 1.18774 44.6802C2.41942 46.8094 4.66292 48.0009 6.96715 48.0009C8.09619 48.0009 9.24041 47.7149 10.2869 47.1124C12.2267 45.9936 13.3885 44.0426 13.5853 41.9709C14.8139 42.9952 16.2606 43.7504 17.8537 44.1765C18.0462 44.228 18.2393 44.2729 18.4331 44.3141C19.6738 45.7057 21.2219 46.7476 22.934 47.3736C21.2329 48.5792 20.1196 50.5593 20.1196 52.7957C20.1196 56.4614 23.1077 59.4434 26.7809 59.4434C30.4541 59.4434 33.4422 56.4614 33.4422 52.7957C33.4422 50.5587 32.3283 48.578 30.6259 47.3724C32.349 46.7397 33.874 45.6948 35.0802 44.3577C36.9107 43.982 38.5918 43.1643 39.9929 41.9958C40.1885 44.0698 41.3509 46.0221 43.2919 47.1397C44.3177 47.7325 45.4571 48.0349 46.6116 48.0349C47.1898 48.0349 47.7717 47.9591 48.3456 47.8058C50.0637 47.3464 51.5007 46.2463 52.3917 44.7081C54.2264 41.5327 53.1332 37.4598 49.9538 35.6276L49.9526 35.627ZM44.2631 14.4229C45.0083 13.9938 45.8227 13.7895 46.6274 13.7895C48.2709 13.7895 49.873 14.6411 50.7537 16.1617C52.0625 18.4237 51.2821 21.3299 49.0155 22.639C46.7471 23.9452 43.8331 23.1663 42.5212 20.905C41.213 18.6401 41.9941 15.7314 44.2631 14.4229ZM40.8675 21.8566C41.8143 23.4924 42.2261 25.3489 42.0827 27.1884C41.148 25.8089 39.9054 24.6464 38.4175 23.7894C38.1982 23.6627 37.9377 23.6288 37.6929 23.6943C37.4482 23.7597 37.2398 23.9191 37.1135 24.1379L34.856 28.0405L31.6742 22.5396C31.6633 22.519 31.6517 22.499 31.639 22.479L29.0706 18.0388C31.008 17.1703 33.1676 16.9945 35.2466 17.5509C37.6352 18.1903 39.6315 19.7195 40.8675 21.8578V21.8566ZM23.3179 35.9549L19.8396 29.9425L23.3173 23.9312H30.2749L33.7531 29.9455L30.2761 35.9555L23.3179 35.9549ZM22.0619 7.09037C22.0619 4.47508 24.1936 2.3477 26.8143 2.3477C29.435 2.3477 31.5667 4.47508 31.5667 7.09037C31.5667 9.70565 29.435 11.833 26.8143 11.833C24.1936 11.833 22.0619 9.70565 22.0619 7.09037ZM26.8143 13.738C28.7049 13.738 30.5209 14.3101 32.0465 15.3532C30.3824 15.4714 28.7535 15.9654 27.2662 16.8224C26.81 17.0854 26.6534 17.6679 26.9169 18.1237L29.1738 22.0257H17.6034C18.0826 17.3764 22.0303 13.738 26.8143 13.738ZM16.7708 18.1061C16.0505 19.5789 15.6454 21.2323 15.6454 22.9785C15.6454 23.5045 16.0729 23.9312 16.6001 23.9312H21.1132L15.329 33.9293C13.8222 32.8444 12.6907 31.348 12.0585 29.6024C12.056 29.5946 12.0536 29.5867 12.0506 29.5794C11.9631 29.337 11.8854 29.0897 11.8179 28.8375C11.1784 26.4544 11.507 23.9646 12.7447 21.8257C13.6904 20.1874 15.0982 18.9019 16.7708 18.1061ZM8.20308 23.0839C6.97626 23.4118 5.696 23.2433 4.5955 22.6087C2.3271 21.3032 1.54789 18.397 2.85731 16.1308C3.49137 15.0338 4.51594 14.2489 5.74155 13.921C6.15028 13.8119 6.5657 13.7574 6.97808 13.7574C7.80163 13.7574 8.61546 13.9731 9.34852 14.3962C10.4478 15.029 11.2343 16.0514 11.5635 17.2751C11.8927 18.4988 11.7244 19.7771 11.0904 20.8735C10.4545 21.9711 9.4299 22.756 8.20308 23.0839ZM9.33212 45.4632C7.0619 46.7694 4.15033 45.9911 2.84091 43.7286C1.5321 41.463 2.31192 38.5556 4.5791 37.2477C6.84872 35.9415 9.76211 36.7216 11.074 38.9859C12.3834 41.2485 11.6011 44.1547 9.33212 45.4632ZM12.7271 38.0332C11.7803 36.3961 11.3685 34.5384 11.5119 32.6983C12.4465 34.0778 13.6892 35.2403 15.1771 36.0979C15.3235 36.1822 15.4881 36.2258 15.6545 36.2258C15.7371 36.2258 15.8203 36.2149 15.9017 36.1937C16.1464 36.1282 16.3548 35.9688 16.4811 35.75L18.7379 31.8492L21.9246 37.3568C21.9295 37.3659 21.935 37.3743 21.9398 37.3834L24.5234 41.8497C22.5866 42.7183 20.4269 42.8946 18.3474 42.3382C15.9588 41.6994 13.9625 40.1709 12.7271 38.0344V38.0332ZM31.5327 52.7957C31.5327 55.4104 29.4009 57.5384 26.7803 57.5384C24.1596 57.5384 22.0279 55.411 22.0279 52.7957C22.0279 50.1805 24.1596 48.0531 26.7803 48.0531C29.4009 48.0531 31.5327 50.1805 31.5327 52.7957ZM26.7803 46.1481C24.8878 46.1481 23.0713 45.576 21.5463 44.5329C23.211 44.4147 24.8405 43.9207 26.3284 43.0631C26.7845 42.8001 26.9412 42.2176 26.6777 41.7618L24.4202 37.8598H35.9912C35.512 42.5092 31.5643 46.1481 26.7803 46.1481ZM36.8238 41.7788C37.5441 40.306 37.9486 38.6532 37.9486 36.9077C37.9486 36.3816 37.521 35.9549 36.9939 35.9549H32.4808L38.265 25.9568C39.7718 27.0417 40.9033 28.5381 41.5355 30.2843C41.538 30.2922 41.5404 30.2994 41.5434 30.3067C41.6309 30.5498 41.7086 30.797 41.776 31.0486C42.4156 33.4317 42.087 35.9215 40.8498 38.0592C39.9018 39.6975 38.4946 40.983 36.8238 41.7788ZM50.7367 43.7553C50.1008 44.8523 49.0756 45.6372 47.85 45.9651C46.6244 46.293 45.3447 46.1245 44.2455 45.4899C41.9758 44.1838 41.1948 41.2776 42.5036 39.0126C43.3837 37.4931 44.9852 36.6434 46.6299 36.6434C47.4358 36.6434 48.2521 36.8477 48.9985 37.2774C51.2663 38.5841 52.0455 41.4903 50.7367 43.7553Z"
                                        fill="#053B7A" stroke="#053B7A" stroke-width="0.5" />
                                </svg>

                            </div>
                            <h2 class="text-white group-hover:text-red-500 font-[600] transition-colors duration-500">
                               Sports & Wellness</h2>
                        </div>
                        <div data-aos="fade-left"
                            class="group rounded-[10px] sm:w-[245px] w-[150px] h-[150px] sm:h-[202px] border-[1px] border-blue-700 bg-[#053B7A] hover:bg-[#0E65CC] transition-all duration-500 p-3 sm:py-10 text-center cursor-pointer aos-init aos-animate">
                            <div
                                class="flex items-center justify-center h-[60px] w-[60px] mx-auto bg-white rounded-full mb-3 transform transition-transform duration-500 group-hover:rotate-360">
                                <svg width="35" height="35" viewBox="0 0 43 48" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.6575 11.4434C16.6897 11.4434 19.1575 8.97562 19.1575 5.94336C19.1575 2.9111 16.6897 0.443359 13.6575 0.443359C10.6252 0.443359 8.15747 2.9111 8.15747 5.94336C8.15747 8.97562 10.623 11.4434 13.6575 11.4434ZM13.6575 2.22595C15.7057 2.22595 17.3725 3.8927 17.3725 5.94096C17.3725 7.98922 15.7057 9.65597 13.6575 9.65597C11.6092 9.65597 9.94246 7.98922 9.94246 5.94096C9.94246 3.8927 11.607 2.22595 13.6575 2.22595Z"
                                        fill="#053B7A" stroke="#053B7A" stroke-width="0.5" />
                                    <path
                                        d="M41.2752 4.97541H36.5417L36.5395 3.33102C36.5395 2.84059 36.1439 2.44336 35.6556 2.44336H27.9606C27.4722 2.44336 27.0766 2.84059 27.0766 3.33102V13.3484H8.22222C4.32626 13.3484 1.15747 16.5307 1.15747 20.4429V27.8215C1.15747 30.4911 3.10214 32.7081 5.64349 33.1342V43.6907C5.64349 45.759 7.32074 47.4434 9.38037 47.4434C10.5295 47.4434 11.546 46.9085 12.2333 46.0852C12.9183 46.9085 13.9371 47.4434 15.0863 47.4434C17.1458 47.4434 18.8231 45.759 18.8231 43.6907L18.8209 19.9235H27.0794V23.0059C27.0794 23.4963 27.4749 23.8936 27.9633 23.8936C28.4517 23.8936 28.8472 23.4963 28.8472 23.0059V19.9124C30.5952 19.8458 32.0007 18.4078 32.0007 16.6369C32.0007 14.866 30.5952 13.428 28.8472 13.3614V9.98389H32.6946V11.6283C32.6946 12.1187 33.0902 12.5159 33.5786 12.5159H41.2735C41.7619 12.5159 42.1575 12.1187 42.1575 11.6283V5.86313C42.1597 5.3727 41.7636 4.97541 41.2752 4.97541ZM17.9369 18.1486C17.4485 18.1486 17.0529 18.5459 17.0529 19.0363V43.6893C17.0529 44.7789 16.169 45.6666 15.0839 45.6666C13.9989 45.6666 13.1149 44.7789 13.1149 43.6893V29.9218C13.1149 29.4314 12.7194 29.0341 12.231 29.0341C11.7426 29.0341 11.3471 29.4314 11.3471 29.9218V43.6893C11.3471 44.7789 10.4631 45.6666 9.37805 45.6666C8.293 45.6666 7.40905 44.7789 7.40905 43.6893L7.41126 19.6891C7.41126 19.1986 7.0157 18.8014 6.52732 18.8014C6.03894 18.8014 5.64338 19.1986 5.64338 19.6891V31.3154C4.08543 30.9159 2.92525 29.5089 2.92525 27.8224V20.4438C2.92525 17.5123 5.30083 15.1245 8.22228 15.1245H27.0767V18.1492L17.9369 18.1486ZM30.23 16.6374C30.23 17.4296 29.6179 18.0731 28.8445 18.1375V15.1372C29.6201 15.1994 30.23 15.8451 30.23 16.6374ZM28.8467 6.8864V4.21897H34.7738V8.20679H28.8467V6.8864ZM40.3908 10.7411H34.4637V9.9844H35.6571C36.1455 9.9844 36.541 9.58717 36.541 9.09673V6.75329H40.3906L40.3908 10.7411Z"
                                        fill="#053B7A" stroke="#053B7A" stroke-width="0.5" />
                                </svg>
                            </div>
                            <h2 class="text-white group-hover:text-red-500 font-[600] transition-colors duration-500">
                                Leadership & Life
                                <br>
                                Skills</h2>
                        </div>
                        <div data-aos="fade-left"
                            class="group rounded-[10px] sm:w-[245px] w-[150px] h-[150px] sm:h-[202px] border-[1px] border-blue-700 bg-[#053B7A] hover:bg-[#0E65CC] transition-all duration-500 p-3 sm:py-10 text-center cursor-pointer aos-init aos-animate">
                            <div
                                class="flex items-center justify-center h-[60px] w-[60px] mx-auto bg-white rounded-full mb-3 transform transition-transform duration-500 group-hover:rotate-360">
                                <svg width="35" height="35" viewBox="0 0 48 48" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18.8002 32.559C26.1522 32.559 32.1332 26.578 32.1332 19.226C32.1332 11.8741 26.1522 5.89307 18.8002 5.89307C11.4483 5.89307 5.46729 11.8741 5.46729 19.226C5.46729 26.578 11.4483 32.559 18.8002 32.559ZM8.02495 23.9318H13.1296C13.5752 26.7028 14.4084 28.9908 15.5055 30.5121C12.1492 29.5305 9.41182 27.0949 8.02495 23.9318ZM18.8002 7.46165C20.3925 7.46165 22.1207 10.2045 22.8771 14.5203H14.7241C15.4805 10.2045 17.2085 7.46165 18.8002 7.46165ZM23.0946 16.0889C23.2038 17.0763 23.2693 18.1208 23.2693 19.226C23.2693 20.3313 23.2038 21.3758 23.0946 22.3632H14.5066C14.3974 21.3758 14.3319 20.3313 14.3319 19.226C14.3319 18.1208 14.3974 17.0763 14.5066 16.0889H23.0946ZM30.5646 19.226C30.5646 20.3137 30.4045 21.3627 30.1269 22.3632H24.6773C24.7789 21.3615 24.8379 20.316 24.8379 19.226C24.8379 18.1361 24.7789 17.0906 24.6773 16.0889H30.1269C30.4045 17.0894 30.5646 18.1383 30.5646 19.226ZM18.8002 30.9904C17.2085 30.9904 15.4805 28.2476 14.7241 23.9318H22.8771C22.1207 28.2476 20.3925 30.9904 18.8002 30.9904ZM12.9239 22.3632H7.47354C7.196 21.3627 7.03588 20.3137 7.03588 19.226C7.03588 18.1383 7.196 17.0894 7.47354 16.0889H12.9239C12.8224 17.0906 12.7633 18.1361 12.7633 19.226C12.7633 20.316 12.8224 21.3615 12.9239 22.3632ZM22.0957 30.5119C23.1928 28.9906 24.026 26.7027 24.4717 23.9318H29.5756C28.1888 27.0947 25.4517 29.5302 22.0957 30.5119ZM29.5756 14.5203H24.4717C24.026 11.7494 23.1928 9.46139 22.0957 7.94011C25.4517 8.92186 28.1888 11.3574 29.5756 14.5203ZM15.5055 7.93996C14.4084 9.46125 13.5752 11.7493 13.1296 14.5203H8.02494C9.41181 11.3571 12.1492 8.92158 15.5055 7.93996Z"
                                        fill="#053B7A" stroke="#053B7A" stroke-width="0.7" />
                                    <path
                                        d="M8.69636 42.9937H28.9049C30.6849 42.9937 32.1332 41.4333 32.1332 39.5155C32.1332 37.5978 30.6849 36.0374 28.9049 36.0374H8.69636C6.91562 36.0374 5.46729 37.5978 5.46729 39.5155C5.46729 41.4333 6.91562 42.9937 8.69636 42.9937ZM8.69636 37.7273H28.9049C29.8201 37.7273 30.5646 38.5294 30.5646 39.5155C30.5646 40.5016 29.8201 41.3037 28.9049 41.3037H8.69636C7.7811 41.3037 7.03587 40.5016 7.03587 39.5155C7.03587 38.5294 7.7811 37.7273 8.69636 37.7273Z"
                                        fill="#053B7A" stroke="#053B7A" stroke-width="0.7" />
                                    <path
                                        d="M46.7623 4.51601C46.3812 4.01255 45.7937 3.67931 45.1494 3.60156L39.6001 2.93129C39.1744 2.88147 38.7896 3.18188 38.7381 3.60571C38.6867 4.02953 38.9899 4.41449 39.4141 4.46581L44.9634 5.13608C45.1926 5.16363 45.3975 5.27724 45.5268 5.44744C45.6001 5.54556 45.6818 5.70483 45.65 5.90749L39.554 44.2178C39.4981 44.5681 39.1215 44.8104 38.7079 44.7628L37.2598 44.5877C37.3177 44.3224 37.3521 44.0488 37.3521 43.7665V5.12024C37.3521 2.98941 35.6153 1.25562 33.4807 1.25562H4.70127C2.56668 1.25562 0.829834 2.98941 0.829834 5.12024V23.6704C0.829834 24.0973 1.17615 24.4434 1.60412 24.4434C2.03209 24.4434 2.37841 24.0973 2.37841 23.6704V5.12024C2.37841 3.84159 3.42037 2.80146 4.70127 2.80146H33.4807C34.7616 2.80146 35.8036 3.84159 35.8036 5.12024V43.7665C35.8036 45.0451 34.7616 46.0853 33.4807 46.0853H4.70127C3.42037 46.0853 2.37841 45.0451 2.37841 43.7665V26.5172C2.37841 26.0904 2.03209 25.7443 1.60412 25.7443C1.17615 25.7443 0.829834 26.0904 0.829834 26.5172V43.7665C0.829834 45.8973 2.56668 47.6311 4.70127 47.6311H33.4807C34.7512 47.6311 35.8708 47.0087 36.5771 46.0622C36.792 46.0825 38.6524 46.3289 38.8213 46.3155C39.9457 46.3155 40.9105 45.5459 41.0829 44.4605L47.1789 6.14942C47.2704 5.57237 47.1222 4.9923 46.7623 4.51601Z"
                                        fill="#053B7A" stroke="#053B7A" stroke-width="0.7" />
                                </svg>
                            </div>
                            <h2 class="text-white group-hover:text-red-500 font-[600] transition-colors duration-500">
                                Global
                                <br>
                                Perspective</h2>
                        </div>
                        <div data-aos="fade-right"
                            class="group rounded-[10px] sm:w-[245px] w-[150px] h-[150px] sm:h-[202px] border-[1px] border-blue-700 bg-[#053B7A] hover:bg-[#0E65CC] transition-all duration-500 p-3 sm:py-10 text-center cursor-pointer aos-init aos-animate">
                            <div
                                class="flex items-center justify-center h-[60px] w-[60px] mx-auto bg-white rounded-full mb-3 transform transition-transform duration-500 group-hover:rotate-360">

                                <svg width="35" height="35" viewBox="0 0 34 50" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M28.81 4.43203C27.6345 4.43203 26.6241 4.80742 25.9149 5.44154C25.4632 4.14794 24.1177 3.30584 22.3302 3.30584C21.2275 3.30584 20.2706 3.63558 19.5663 4.19867C19.3332 2.4333 17.7351 1.19043 15.6027 1.19043C14.0434 1.19043 12.7028 2.07819 12.1393 3.33628C11.4253 2.63621 10.3664 2.21009 9.12288 2.21009C7.05848 2.21009 5.37781 3.7624 5.37781 5.67489V11.1232L5.11065 11.0065C5.03293 10.9761 4.95522 10.9558 4.87264 10.9558C3.0414 10.9558 1.55017 12.5081 1.55017 14.4206V29.2082C1.55017 32.7694 3.59514 35.8334 6.5193 37.2133V43.3819C6.5193 46.6387 11.1436 49.1904 17.0453 49.1904C22.9471 49.1904 27.581 46.6387 27.581 43.3819V36.8835C30.5635 35.3718 32.5502 32.4751 32.5502 29.2082V7.89683C32.5502 5.98434 30.8695 4.43203 28.8051 4.43203H28.81ZM22.3302 4.6248C23.5688 4.6248 24.8172 5.18282 24.8172 6.42569V14.3039C24.8172 15.4859 23.7048 16.4498 22.3302 16.4498C22.0776 16.4498 21.8396 16.4193 21.6064 16.3737C21.5384 16.0084 21.383 15.6635 21.1498 15.3591C20.7661 14.862 20.2172 14.5271 19.5955 14.4003V6.76557C19.5955 5.28935 21.0138 4.61973 22.3253 4.61973L22.3302 4.6248ZM13.1205 4.66031C13.1205 3.47832 14.2329 2.51446 15.6027 2.51446C16.9725 2.51446 18.3325 3.18409 18.3325 4.66031V14.3293C16.5207 14.2989 14.7818 14.2431 13.1157 14.0351V4.66031H13.1205ZM6.64074 5.68504C6.64074 4.50305 7.75309 3.53919 9.12773 3.53919C10.5024 3.53919 11.8576 4.20882 11.8576 5.68504V13.8474C11.7653 13.8322 11.6779 13.8169 11.5856 13.8017L6.64074 11.6762V5.68504ZM31.2921 29.2234C31.2921 32.9723 28.1396 36.1581 23.9623 36.6299C23.6174 36.6705 23.3648 36.9951 23.4037 37.3553C23.4377 37.6952 23.7097 37.9438 24.0303 37.9438C24.0546 37.9438 24.074 37.9438 24.0983 37.9438C24.8755 37.8575 25.6138 37.6749 26.323 37.4314V43.3971C26.323 45.8322 22.0776 47.8867 17.0453 47.8867C12.013 47.8867 7.78223 45.8322 7.78223 43.3971V37.6952C8.4817 37.893 9.21031 38.0046 9.96807 38.0046C10.3178 38.0046 10.5995 37.7104 10.5995 37.3452C10.5995 36.9799 10.3178 36.6857 9.96807 36.6857C6.01899 36.6857 2.80824 33.3375 2.80824 29.2183V14.4308C2.80824 13.2894 3.668 12.3509 4.7512 12.2849L11.163 15.0395C11.2018 15.0547 11.2407 15.0699 11.2844 15.075C13.718 15.562 16.3798 15.6128 18.9591 15.6533C18.9834 15.6533 19.0126 15.6533 19.0369 15.6533C19.4934 15.6635 19.9015 15.8512 20.1541 16.1809C20.2901 16.3585 20.4358 16.6426 20.3581 17.023C19.9258 19.25 17.7934 20.8683 15.2918 20.8683H8.61285C8.26311 20.8683 7.98138 21.1625 7.98138 21.5278C7.98138 21.893 8.26311 22.1873 8.61285 22.1873H10.7112C14.2183 23.6736 16.4819 27.1689 16.4819 31.1257C16.4819 31.491 16.7636 31.7852 17.1133 31.7852C17.4631 31.7852 17.7448 31.491 17.7448 31.1257C17.7448 27.4935 16.069 24.2063 13.3245 22.1873H15.2918C18.2402 22.1873 20.7758 20.3204 21.4947 17.6977C21.7619 17.7434 22.0339 17.7637 22.3156 17.7637C23.6125 17.7637 24.7589 17.1498 25.4292 16.2215C26.0995 17.1498 27.2459 17.7637 28.5428 17.7637C29.6309 17.7637 30.5781 17.4441 31.2727 16.8911V29.2082L31.2921 29.2234ZM31.2921 14.309C31.2921 15.7852 29.8737 16.4549 28.5622 16.4549C27.2507 16.4549 26.0752 15.491 26.0752 14.309V7.90191C26.0752 6.42569 27.4936 5.75606 28.8051 5.75606C30.1166 5.75606 31.2921 6.71992 31.2921 7.90191V14.309Z"
                                        fill="#053B7A" stroke="#053B7A" stroke-width="1.5" />
                                </svg>

                            </div>
                            <h2 class="text-white group-hover:text-red-500 font-[600] transition-colors duration-500">
                                Entrepreneurial
                                <br>
                                Thinking </h2>
                        </div>
                        <div
                            class="group rounded-[10px] sm:w-[245px] w-[150px] h-[150px] sm:h-[202px] border-[1px] border-blue-700 bg-[#053B7A] hover:bg-[#0E65CC] transition-all duration-500 p-3 sm:py-10 text-center cursor-pointer aos-init aos-animate">
                            <div
                                class="flex items-center justify-center h-[60px] w-[60px] mx-auto bg-white rounded-full mb-3 transform transition-transform duration-500 group-hover:rotate-360">
                                <svg width="35" height="35" viewBox="0 0 44 47" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.9102 13.1904C15.0185 13.1904 9.41016 18.7988 9.41016 25.6904C9.41016 32.5821 15.0185 38.1904 21.9102 38.1904C28.8018 38.1904 34.4102 32.5821 34.4102 25.6904C34.4102 18.7988 28.8018 13.1904 21.9102 13.1904ZM21.9102 36.5238C15.9352 36.5238 11.0768 31.6654 11.0768 25.6904C11.0768 19.7154 15.9352 14.8571 21.9102 14.8571C27.8852 14.8571 32.7435 19.7154 32.7435 25.6904C32.7435 31.6654 27.8852 36.5238 21.9102 36.5238Z"
                                        fill="#053B7A" stroke="#053B7A" />
                                    <path
                                        d="M26.553 24.4127H23.1244V19.0793C23.1244 18.5904 22.7387 18.1904 22.2673 18.1904C21.7959 18.1904 21.4102 18.5904 21.4102 19.0793V25.3015C21.4102 25.7904 21.7959 26.1904 22.2673 26.1904H26.553C27.0244 26.1904 27.4102 25.7904 27.4102 25.3015C27.4102 24.8127 27.0244 24.4127 26.553 24.4127Z"
                                        fill="#053B7A" stroke="#053B7A" />
                                    <path
                                        d="M42.2939 24.2301C41.6861 24.2301 41.1887 24.7245 41.1887 25.3287C41.1887 30.6347 38.912 35.6991 34.9334 39.2475C30.8994 42.8398 25.683 44.4877 20.2565 43.8944C11.636 42.9497 4.68442 36.0397 3.73396 27.4709C3.13716 22.0769 4.79494 16.8917 8.39785 12.8819C11.9565 8.92708 17.0625 6.66403 22.4006 6.66403H39.6304L38.1605 8.12513C37.7295 8.55357 37.7295 9.24566 38.1605 9.6741C38.3816 9.89382 38.6579 9.99269 38.9452 9.99269C39.2326 9.99269 39.5089 9.88283 39.7299 9.6741L43.0897 6.33446C43.0897 6.33446 43.1007 6.31249 43.1118 6.30151C43.2002 6.20264 43.2775 6.10376 43.3328 5.98292C43.3328 5.98292 43.3328 5.96095 43.3328 5.94997C43.377 5.84011 43.3991 5.71927 43.3991 5.59842C43.3991 5.56547 43.3991 5.52152 43.3991 5.48857C43.3991 5.3897 43.377 5.30181 43.3438 5.21393C43.3328 5.18097 43.3217 5.13703 43.3107 5.10407C43.2554 4.98323 43.1891 4.87337 43.0897 4.7745L39.8072 1.51176C39.3762 1.08332 38.68 1.08332 38.2489 1.51176C37.8179 1.9402 37.8179 2.6323 38.2489 3.06074L39.6415 4.44493H22.4116C16.4436 4.44493 10.7408 6.98262 6.76217 11.3989C2.72824 15.881 0.871525 21.6595 1.54569 27.6906C2.60667 37.2811 10.3872 45.004 20.0244 46.0586C20.8312 46.1465 21.649 46.1904 22.4448 46.1904C27.6281 46.1904 32.513 44.3448 36.4143 40.8734C40.8572 36.9185 43.4102 31.2499 43.4102 25.3177C43.4102 24.7135 42.9128 24.2191 42.305 24.2191L42.2939 24.2301Z"
                                        fill="#053B7A" stroke="#053B7A" />
                                </svg>
                            </div>
                            <h2 class="text-white group-hover:text-red-500 font-[600] transition-colors duration-500">
                                Future-Ready
                                <br>
                                Curriculum</h2>
                        </div>
                        <div data-aos="fade-left"
                            class="group rounded-[10px] sm:w-[245px] w-[150px] h-[150px] sm:h-[202px] border-[1px] border-blue-700 bg-[#053B7A] hover:bg-[#0E65CC] transition-all duration-500 p-3 sm:py-10 text-center cursor-pointer aos-init aos-animate">
                            <div
                                class="flex items-center justify-center h-[60px] w-[60px] mx-auto bg-white rounded-full mb-3 transform transition-transform duration-500 group-hover:rotate-360">
                                <svg width="35" height="35" viewBox="0 0 51 47" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M33.2846 18.308C32.9782 18.2052 32.672 18.3594 32.5692 18.6657C32.4664 18.972 32.6205 19.2783 32.9268 19.3811L35.5334 20.1992C35.5848 20.1992 35.6362 20.2506 35.6876 20.2506C35.9425 20.2506 36.148 20.0965 36.1994 19.8416L37.0175 17.235C37.1203 16.9287 36.9661 16.6224 36.6598 16.5196C36.3516 16.4168 36.0453 16.571 35.9425 16.8773L35.5334 18.1539L25.9784 1.44536C25.8756 1.29122 25.6721 1.19043 25.4666 1.19043C25.263 1.19043 25.0575 1.29319 24.9547 1.49674L15.1943 18.4112C15.0402 18.6661 15.1429 19.0238 15.3979 19.1779C15.6528 19.332 16.0105 19.2293 16.1646 18.9744L25.4667 2.87647L34.6144 18.7174L33.2846 18.308Z"
                                        fill="#053B7A" stroke="#053B7A" stroke-width="2" />
                                    <path
                                        d="M49.5858 42.3268L39.7738 25.464C39.6196 25.2091 39.2619 25.1063 39.007 25.2605C38.7521 25.4146 38.6493 25.7723 38.8035 26.0272L48.1035 42.074L29.8596 42.1254L30.8299 41.2065C31.0335 41.0029 31.0848 40.6452 30.8299 40.3883C30.6264 40.1848 30.2687 40.1334 30.0118 40.3883L28.0692 42.2281C27.8656 42.4317 27.8143 42.7894 28.0178 42.9949L29.8576 44.9869C29.9604 45.0896 30.1126 45.1904 30.2667 45.1904C30.4208 45.1904 30.5216 45.1391 30.6244 45.0363C30.8279 44.8327 30.8793 44.475 30.6758 44.2181L29.7568 43.1965L49.0227 43.1451C49.2262 43.1451 49.4318 43.0423 49.5345 42.8388C49.6373 42.736 49.6372 42.5304 49.5858 42.3268Z"
                                        fill="#053B7A" stroke="#053B7A" stroke-width="2" />
                                    <path
                                        d="M21.3778 42.0203L2.82929 42.0697L11.9255 26.2288L12.2318 27.5568C12.2831 27.8118 12.5381 28.0173 12.793 28.0173H12.8958C13.2021 27.9659 13.4076 27.6596 13.3048 27.3533L12.6922 24.6953C12.6409 24.389 12.3346 24.1835 12.0282 24.2863L9.37028 24.9008C9.06397 24.9522 8.85845 25.2585 8.96121 25.5648C9.01258 25.8711 9.31889 26.0767 9.62521 25.9739L10.9532 25.6676L1.34709 42.3781C1.24433 42.5323 1.24433 42.7872 1.34709 42.9394C1.44985 43.0935 1.6534 43.1943 1.85891 43.1943L21.3797 43.1429C21.6861 43.1429 21.941 42.888 21.941 42.5817C21.941 42.2754 21.6841 42.0203 21.3778 42.0203Z"
                                        fill="#053B7A" stroke="#053B7A" stroke-width="2" />
                                </svg>
                            </div>
                            <h2 class="text-white group-hover:text-red-500 font-[600] transition-colors duration-500">
                               Eco-Awareness &
                               <br>
                               Green Practices</h2>
                        </div>

                    </div>
                </div>
            </section>
            <!--==== END ====-->

            <!--==== Start ====-->
            <!-- <section class="bg-cover bg-center relative mt-[60px] allen-achievements overflow-hidden "
                style="background-image: url(assets/images/achievement-bg.png)">
                <div class="absolute animate-scale-loop">
                    <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/ibXzaME0Gg0WHvJXH0ndRZ5ZVTZ49sAViQQIeaHC.png"
                        class="md:w-[100%] w-[200px]" alt="">
                </div>
                <div class="absolute right-0 animate-scale-loop">
                    <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/AIfngM5Cv0X679VMEwLn1cdQy0cgLA8iZbFAJXyL.png"
                        alt="" class="md:w-[100%] w-[200px]">
                </div>
                <div class="absolute md:left-[5%] left-[50%]  ">
                    <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/jt3XMtSTZ5kroJxzns1VBIyrHJBnkX7mmWrGAGoa.png"
                        class="md:w-[100px] w-[60px]" alt="">
                </div>
                <div class="md:w-[1280px] mx-auto p-10 py-20 relative z-90">
                    <div class="md:flex justify-between">
                        <h2 class="text-3xl font-[600] text-white relative z-10">Allenhouse <br> Achievements</h2>
                        <p class="text-white">Unveiling the Accomplishments of Allenhouse Public <br>
                            School, Agra and its Outshining Students.</p>
                    </div>
                    <div class="mt-10 flex  items-center justify-center flex-wrap md:gap-20 gap-5">
                        <div data-aos="flip-left"
                            class="text-white cursor-pointer transition-all hover:translate-y-[-5px] [6px] border-[1px] border-white p-5 w-[346px]">
                            <div class="flex justify-center items-center w-[80px] h-[80px] bg-red-main rounded-[50%] sm:m-0 mx-auto">
                                <span><img
                                        src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/W40UqpRS5tM9qvdocEGuZvB0a18WP1W0U1IVYt9J.png"
                                        alt=""></span>
                            </div>
                            <h2 class="mt-2 text-[18px] font-[500] text-center md:text-left">Champions of <br>
                                Harmony Fest</h2>
                        </div>
                        <div data-aos="flip-left"
                            class="transition-all hover:translate-y-[-5px] rounded-[6px] border-[1px] border-white p-5 w-[346px]">
                            <div class="flex justify-center items-center w-[80px] h-[80px] bg-red-main rounded-[50%] sm:m-0 mx-auto">
                                <span><img
                                        src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/W40UqpRS5tM9qvdocEGuZvB0a18WP1W0U1IVYt9J.png"
                                        alt=""></span>
                            </div>
                            <h2 class="mt-2 text-white text-[18px] font-[500] text-center md:text-left ">Skating Winners of FRS <br>
                                National Sports Championship</h2>
                        </div>
                        <div data-aos="flip-left"
                            class="transition-all hover:translate-y-[-5px] rounded-[6px] border-[1px] border-white p-5 w-[346px]">
                            <div class="flex justify-center items-center w-[80px] h-[80px] bg-red-main rounded-[50%] sm:m-0 mx-auto">
                                <span><img
                                        src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/W40UqpRS5tM9qvdocEGuZvB0a18WP1W0U1IVYt9J.png"
                                        alt=""></span>
                            </div>
                            <h2 class="mt-2 text-white text-[18px] font-[500] text-center md:text-left">Taekwondo State <br>
                                Championship Medalists</h2>
                        </div>
                        <div data-aos="flip-left"
                            class="transition-all hover:translate-y-[-5px] rounded-[6px] border-[1px] border-white p-5 w-[346px]">
                            <div class="flex justify-center items-center w-[80px] h-[80px] bg-red-main rounded-[50%] sm:m-0 mx-auto">
                                <span><img
                                        src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/W40UqpRS5tM9qvdocEGuZvB0a18WP1W0U1IVYt9J.png"
                                        alt=""></span>
                            </div>
                            <h2 class="mt-2 text-white text-[18px] font-[500] text-center md:text-left">Awardees of Symphony of <br>
                                Splendours Contest</h2>
                        </div>
                        <div data-aos="flip-left"
                            class="transition-all hover:translate-y-[-5px] rounded-[6px] border-[1px] border-white p-5 w-[346px]">
                            <div class="flex justify-center items-center w-[80px] h-[80px] bg-red-main rounded-[50%] sm:m-0 mx-auto">
                                <span><img
                                        src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/W40UqpRS5tM9qvdocEGuZvB0a18WP1W0U1IVYt9J.png"
                                        alt=""></span>
                            </div>
                            <h2 class="mt-2 text-white text-[18px] font-[500] text-center md:text-left">KSS English Debate <br>
                                Competition Winner</h2>
                        </div>
                    </div>
                </div>
            </section> -->
            <!--==== END ====-->

            <!--==== Class 10th Topper Start ====-->
            <section class="md:mt-5 ">

                <div class="md:mx-10 mx-4 ">
                    <!--=== NO USE ===-->
                    <div class="swiper our-toppers mt-10 hidden" style="display: none;">
                        <div class="swiper-wrapper" data-aos="zoom-in">
                            <div class="swiper-slide cursor-pointer transition-all hover:traslate-y-[-5px] topper-card relative"
                                style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                                <div class="p-4">
                                    <img src="assets/images/afra.webp"
                                        class="w-[200px] h-[200px] rounded-full mx-auto relative z-50 border-[4px] border-[#053B7A]"
                                        alt="Afra Ali">
                                    <div class="p-3 text-center text-white relative z-10">
                                        <div>
                                            <p class="border-[1px] rounded-[20px] p-[6px] px-3 text-[14px] hidden">
                                                12/04/24</p>
                                        </div>
                                        <h2 class="text-[22px] font-[600] text-[#fff] mt-2">Afra Ali</h2>
                                        <div class="flex justify-center gap-6">
                                            <h3 class="text-[15px] font-[500] text-gray-300">10th Class</h3>
                                            <h3 class="text-[15px] font-[500] text-gray-300">99.2%</h3>
                                        </div>
                                        <p class="text-[16px] text-[#fff] mt-2">We practice an integrated thematic
                                            study which aims at enhancing the development and education of children
                                            through play.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide cursor-pointer transition-all hover:traslate-y-[-5px] topper-card relative"
                                style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                                <div class="p-4">
                                    <img src="assets/images/prabhav.webp"
                                        class="w-[200px] h-[200px] rounded-full mx-auto relative z-50 border-[4px] border-[#053B7A]"
                                        alt="Prabhav Agarwal">
                                    <div class="p-3 text-center text-white relative z-10">
                                        <div>
                                            <p class="border-[1px] rounded-[20px] p-[6px] px-3 text-[14px]  hidden">
                                                12/04/24</p>
                                        </div>
                                        <h2 class="text-[22px] font-[600] text-[#fff] mt-2">Prabhav Agarwal</h2>
                                        <div class="flex justify-center gap-6">
                                            <h3 class="text-[15px] font-[500] text-gray-300">10th Class</h3>
                                            <h3 class="text-[15px] font-[500] text-gray-300">98.2%</h3>
                                        </div>
                                        <p class="text-[16px] text-[#fff] mt-2">We practice an integrated thematic
                                            study which aims at enhancing the development and education of children
                                            through play.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide cursor-pointer transition-all hover:traslate-y-[-5px] topper-card relative"
                                style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                                <div class="p-4">
                                    <img src="assets/images/shaurya.webp"
                                        class="w-[200px] h-[200px] rounded-full mx-auto relative z-50 border-[4px] border-[#053B7A]"
                                        alt="Jasreet Kaur">
                                    <div class="p-3 text-center text-white relative z-10">
                                        <div>
                                            <p class="border-[1px] rounded-[20px] p-[6px] px-3 text-[14px] hidden">
                                                12/04/24</p>
                                        </div>
                                        <h2 class="text-[22px] font-[600] text-[#fff] mt-2">Shaurya Khandelwal</h2>
                                        <div class="flex justify-center gap-6">
                                            <h3 class="text-[15px] font-[500] text-gray-300">10th Class</h3>
                                            <h3 class="text-[15px] font-[500] text-gray-300">98%</h3>
                                        </div>
                                        <p class="text-[16px] text-[#fff] mt-2">We practice an integrated thematic
                                            study which aims at enhancing the development and education of children
                                            through play.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="md:swiper-button-next"></div>
                        <div class="md:swiper-button-prev"></div>
                    </div>
                    <!--=== END ===-->
                </div>

                <!--==== New Topper Section ====-->
                <!-- <div class="md:mx-[100px] mx-[20px] md:mt-8 mt-4">
                    <div class="text-center text-white pt-10">
                        <h2 class="md:text-[36px] text-[24px] leading-11 mt-4 text-[#053B7A] font-[600]">Our Achievers
                        </h2>
                    </div>
                    <div class="md:flex gap-10">
                        <div>
                            <div class="mt-5">
                                <img src="assets/images/10th-topper.webp" alt="10th Class Topper">
                            </div>
                        </div>
                        <div>

                            <div class="mt-5">
                                <img src="assets/images/12th-topper.webp" alt="12th Class Topper">
                            </div>
                        </div>
                    </div>

                    <p class="font-[700] text-center">NOT PROVIDED</p>
                </div> -->
            </section>
            <!--==== END ====-->

            <!--==== Class 12th Topper Start ====-->
            <!-- <section class="md:mt-5 hidden">
                <div class="md:mx-10 mx-4">
                    <div class="text-center text-white pt-10">
                        <h2 class="md:text-[36px] text-[24px] leading-11 mt-4 text-[#053B7A] font-[600]">Class 12
                            Toppers</h2>
                    </div>
                    <div class="md:w-[767] mx-auto md:mt-8 mt-4">
                        <div>
                            <img src="assets/images/12th-topper.webp" alt="10th Class Topper">
                        </div>
                    </div>
                </div>
            </section> -->
            <!--==== END ====-->


<section class="md:mt-[60px] mt-8 ">
                <div class="md:flex flex-col md:mx-auto mx-[20px] gap-10 xl:w-[1044px] lg:w-[1080px] mx-2 items-center justify-center">
                    <div class="text-center pt-10">
                        <h2 class="md:text-[36px] text-[24px] leading-11 mt-4 text-[#053B7A] font-[600] text-center">World-Class Campus & Facilities
                        </h2>
                        <p class="text-[16px] text-gray-500 mt-2">At Allenhouse Public School, we believe that an exceptional learning experience begins with an inspiring environment. Our lush, eco-friendly campus is thoughtfully designed to nurture curiosity, creativity, and holistic development, while equipping students with world-class facilities to thrive in every field.</p>
                    </div>
                   <div class="sm:mt-10 mt-5">
                        <div class="flex sm:flex-row flex-col items-center justify-center sm:mt-0 mt-2 ">
                            <div class="sm:w-[528px] sm:h-[289px]">
                                <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/s4v0ivjKDdqyHYqzBb8VeXMIZL6v3rkM0frKKqVI.png" alt="">
                            </div>
                            <div class="text-left text-white sm:p-[60px] p-[10px] bg-[#E31E24] sm:w-[528px] sm:h-[289px]">
                                <h class="sm:text-[24px] font-[600]">Smart Classrooms & Future-Ready Learning Spaces</h>
                                <p class="sm:text-[16px] text-[12px] font-[400]">Interactive, technology-driven classrooms designed to create engaging, immersive, and personalized learning experiences for every student.</p>
                            </div>
                        </div>
                        <div class="flex sm:flex-row flex-col-reverse items-center justify-center sm:mt-0 mt-2 ">
                          
                            <div class="text-left text-white sm:p-[60px] p-[10px] bg-[#053B7A] sm:w-[528px] sm:h-[289px]">
                                <h3 class="sm:text-[24px] font-[600]">Creative Arts & Performing Spaces</h3>
                                <p class="sm:text-[16px] text-[12px] font-[400]">Dedicated studios for art, music, and dance, along with a modern auditorium, provide a platform for students to explore their creativity, build confidence, and express themselves.</p>
                            </div>
                              <div class="sm:w-[528px] sm:h-[289px]">
                                <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/ld5rnOIteO1H4sdjoCvOYEDOSIM7vd5LPJmVrX9G.png" alt="">
                            </div>
                        </div>
                        <div class="flex sm:flex-row flex-col items-center justify-center sm:mt-0 mt-2">
                            <div class="sm:w-[528px] sm:h-[289px]">
                                <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/2wateCROPaHeyLVPZLRu1rKLlQcX64hB0AjMWgj1.png" alt="">
                            </div>
                            <div class="text-left text-white sm:p-[60px] p-[10px] bg-[#E31E24] sm:w-[528px] sm:h-[289px]">
                                <h3 class="sm:text-[24px] font-[600]">Sports & Physical Wellbeing</h3>
                                <p class="sm:text-[16px] text-[12px] font-[400]">In collaboration with Northwest Sports Academy, Allenhouse offers 17+ indoor and outdoor sports facilities, including Basketball, Badminton, Cricket, Football, and more. Our structured sports programs focus on physical fitness, mental discipline, and teamwork.</p>
                            </div>
                        </div>
                        <div class="flex sm:flex-row flex-col-reverse items-center justify-centersm:mt-0 mt-2">
                            
                            <div class="text-left text-white sm:p-[60px] p-[10px] bg-[#053B7A] sm:w-[528px] sm:h-[289px]">
                                <h3 class="sm:text-[24px] font-[600]">Innovation Labs & Discovery Zones</h3>
                                <p class="sm:text-[16px] text-[12px] font-[400]">From state-of-the-art Science and Math Labs to Robotics and Montessori Labs, Allenhouse inspires curiosity, critical thinking, and hands-on exploration, encouraging students to become innovators of tomorrow.</p>
                            </div>
                            <div class="sm:w-[528px] sm:h-[289px]">
                                <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/gJeFXkrz0RxW2qDQb0rep7EGVxgRtTHnF64GMIJ9.png" alt="">
                            </div>
                        </div>
                   </div>
                </div>


            <!--==== Start ====-->
            <section class="mt-[60px] ">
                <div class="md:mx-[100px] mx-[20px] gap-5">
                    <div>
                        <h2 class="md:text-[36px] text-[24px] text-center font-[600] text-[#053B7A]">21 Century Skills
                        </h2>
                    </div>
                    <div class="grid md:grid-cols-5 grid-cols-2 mt-8 md:gap-0 gap-10 ">
                        <!-- <div data-aos="zoom-out"
                            class="text-center cursor-pointer hover:translate-y-[-4px] transition-all md:mb-0 mb-5">
                            <img src="assets/images/Century_1.png" class="mx-auto" alt="YOUNG ENTREPRENEUR PROGRAM">
                            <h3 class="text-[18px] font-[500] mt-2 transition-all hover:text-[#053B7A]">YOUNG <br>
                                ENTREPRENEUR <br> PROGRAM</h3>
                        </div> -->
                        <div data-aos="zoom-out"
                            class="text-center cursor-pointer hover:translate-y-[-4px] transition-all md:mb-0 mb-5">
                            <img src="assets/images/Century_2.png" class="mx-auto" alt="COGNITIVE THINKING">
                            <h3 class="text-[18px] font-[500] mt-2 transition-all hover:text-[#053B7A] uppercase">Cognitive <br>
                                Thinking </h3>
                        </div>
                        <div data-aos="zoom-out"
                            class="text-center cursor-pointer hover:translate-y-[-4px] transition-all md:mb-0 mb-5">
                            <img src="assets/images/Century_3.png" class="mx-auto" alt="LANGUAGE DEVELOPMENT">
                            <h3 class="text-[18px] font-[500] mt-2 transition-all hover:text-[#053B7A] uppercase">Multilingual <br>
                            Competence</h3>
                        </div>
                        <div data-aos="zoom-out"
                            class="text-center cursor-pointer hover:translate-y-[-4px] transition-all md:mb-0 mb-5">
                            <img src="assets/images/Century_4.png" class="mx-auto" alt="FINANCIAL LITERACY">
                            <h3 class="text-[18px] font-[500] mt-2 transition-all hover:text-[#053B7A] uppercase">FINANCIAL <br>
                                LITERACY </h3>
                        </div>
                        <div data-aos="zoom-out"
                            class="text-center cursor-pointer hover:translate-y-[-4px] transition-all md:mb-0 mb-5">
                            <img src="assets/images/Century_5.png" class="mx-auto" alt="GLOBAL DIMENSION">
                            <h3 class="text-[18px] font-[500] mt-2 transition-all hover:text-[#053B7A] uppercase">GLOBAL <br>
                                Responsibility  </h3>
                        </div>
                        <div data-aos="zoom-out"
                            class="text-center cursor-pointer hover:translate-y-[-4px] transition-all md:mb-0 mb-5">
                            <img src="assets/images/Century_6.png" class="mx-auto" alt="ADVANCE CODING">
                            <h3 class="text-[18px] font-[500] mt-2 transition-all hover:text-[#053B7A] uppercase">ADVANCED <br>
                                CODING </h3>
                        </div>
                    </div>
                </div>
            </section>
            <!--==== END ====-->

            <!--==== Start ====-->
            <section class="md:mt-[90px] md:mt-0 mt-8">
                <div class="bg-[#053B7A] relative">
                    <div data-aos="fade-right"
                        class="md:flex justify-around items-center md:mx-2 mx-2 md:text-start text-center md:py-0 py-4 md:pt-0 pt-5 md:py-0 py-10">
                        <div class="mt-[-35px] relative bottom-[-7px]">
                            <img src="assets/images/announce.webp" class="md:w-[450px] mx-auto  text-center"
                                alt="Announce">
                        </div>
                        <div class="text-white">
                            <h2 class="md:text-[30px] text-[24px] font-[500] md:leading-12 md:mt-0 mt-4">Visit Our
                                Campus <br> Experience the Atmosphere of the Best School in Agra</h2>
                        </div>
                        <div data-aos="fade-left" class="pb-5 mt-[25px]">
                            <a href="#switchForm"
                                class="transition-all hover:bg-[#F4131B] bg-white p-3 px-5 font-[500] md:text-[16px] justify-center items-center text-[15px] rounded-[30px] hover:bg-red-main flex gap-2 relative z-90"
                                style="white-space: nowrap;">Book a School Tour Now<svg xmlns="http://www.w3.org/2000/svg"
                                    width="20" height="18" viewBox="0 0 24 24">
                                    <g fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2">
                                        <path stroke-dasharray="20" stroke-dashoffset="20" d="M3 12h17.5">
                                            <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s"
                                                values="20;0" />
                                        </path>
                                        <path stroke-dasharray="12" stroke-dashoffset="12" d="M21 12l-7 7M21 12l-7 -7">
                                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s"
                                                dur="0.2s" values="12;0" />
                                        </path>
                                    </g>
                                </svg></a>
                        </div>
                    </div>
                </div>
            </section>
            <!--==== END ====-->

            <!--==== Start ====-->
            <section class="mt-12 ">
                <div class="md:p-10 p-5 md:w-[1280px] mx-auto">
                    <div class="text-center">
                        <h2 class="md:text-[36px] text-[24px] font-[600] text-[#053B7A]">Legacy of Excellence</h2>
                    </div>
                    <div class="md:mt-10 mt-5 grid md:grid-cols-5 grid-cols-2 gap-5">
                        <div data-aos="zoom-out-right" class="rounded-[6px] border-white bg-[#053B7A] p-5 text-center">
                            <div
                                class="flex justify-center items-center md:w-[80px] md:h-[80px] w-[80px] h-[80px]  rounded-[50%] bg-[#E31E24] mx-auto">
                                <span><img
                                        src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/IyGgOJ7x13B4btnGxlJidvG8gNdf9fmGkiR7IO2C.png"
                                        class="md:w-[45px] w-[30px]" alt=""></span>
                            </div>
                            <h2 class="mt-2 text-white text-[18px] font-[700]">27+ </h2>
                            <span class="text-[13px] text-white">Years of Experience</span>
                        </div>
                          <div data-aos="zoom-out-right" class="rounded-[6px] border-white bg-[#053B7A] p-5 text-center">
                            <div
                                class="flex justify-center items-center md:w-[80px] md:h-[80px] w-[80px] h-[80px]  rounded-[50%] bg-[#E31E24] mx-auto">
                                <span><img
                                        src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/t4GiBrtvDAIHE84pPxGAlOxLhEJSLQM8tAjnxUjd.png"
                                        class="md:w-[45px] w-[30px]" alt=""></span>
                            </div>
                            <h2 class="mt-2 text-white text-[18px] font-[700]">25+</h2>
                            <span class="text-[13px] text-white">Campuses</span>
                        </div>
                        <div data-aos="zoom-out-right" class="rounded-[6px] border-white bg-[#053B7A] p-5 text-center">
                            <div
                                class="flex justify-center items-center md:w-[80px] md:h-[80px] w-[80px] h-[80px]  rounded-[50%] bg-[#E31E24] mx-auto">
                                <span><img
                                        src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/P14f0ittzzfSMP3Ot0DXohIx28nPAXnMClopbpM7.png"
                                        class="md:w-[45px] w-[30px]" alt=""></span>
                            </div>
                            <h2 class="mt-2 text-white text-[18px] font-[700]">30000+</h2>
                            <span class="text-[13px] text-white">Students</span>
                        </div>
                         <div data-aos="zoom-out-right" class="rounded-[6px] border-white bg-[#053B7A] p-5 text-center">
                            <div
                                class="flex justify-center items-center md:w-[80px] md:h-[80px] w-[80px] h-[80px]  rounded-[50%] bg-[#E31E24] mx-auto">
                                <span><img
                                        src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/XB6iY2CU69mGCfUD43KnATBn43gHGY2E0A6Xtsln.png"
                                        class="md:w-[45px] w-[30px]" alt=""></span>
                            </div>
                            <h2 class="mt-2 text-white text-[18px] font-[700]">1850+</h2>
                            <span class="text-[13px] text-white">Faculty</span>
                        </div>
                      
                        <div data-aos="zoom-out-right" class="rounded-[6px] border-white bg-[#053B7A] p-5 text-center">
                            <div
                                class="flex justify-center items-center md:w-[80px] md:h-[80px] w-[80px] h-[80px]  rounded-[50%] bg-[#E31E24] mx-auto">
                                <span><img
                                        src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/rVPBWvYsffHyYTHGLxkGRpoe7VzUL1NlYLV7Ueii.png"
                                        class="md:w-[45px] w-[30px]" alt=""></span>
                            </div>
                            <h2 class="mt-2 text-white text-[18px] font-[700]">15000+</h2>
                            <span class="text-[13px] text-white">Alumni</span>
                        </div>
                        
                       
                    </div>
                </div>
            </section>
            <!--==== END ====-->

            <!--==== Start ====-->
            <section class="">
                <div class="md:mx-10 mx-4">
                    <div class="text-center text-white pt-10">
                        <h2 class="md:text-[36px] text-[24px] leading-11 mt-4 text-[#053B7A] font-[600]">Life at
                            Allenhouse
                        </h2>
                    </div>
                    <div class="swiper carousel3 mt-10">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                                    <img src="./assets/images/1.jpg" class="w-[100%] rounded-[12px]" alt="G One" />
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                                    <img src="./assets/images/2.jpg" class="w-[100%] rounded-[12px]" alt="G One" />
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                                    <img src="./assets/images/3.jpg" class="w-[100%] rounded-[12px]" alt="G One" />
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                                    <img src="./assets/images/4.jpg" class="w-[100%] rounded-[12px]" alt="G One" />
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                                    <img src="./assets/images/5.jpg" class="w-[100%] rounded-[12px]" alt="G One" />
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                                    <img src="./assets/images/6.jpg" class="w-[100%] rounded-[12px]" alt="G One" />
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                                    <img src="./assets/images/7.jpg" class="w-[100%] rounded-[12px]" alt="G One" />
                                </div>
                            </div>
                        </div>
                        <div class="md:swiper-button-next"></div>
                        <div class="md:swiper-button-prev"></div>
                    </div>
                </div>
            </section>
            <!--==== END ====-->

            <!--==== Start ====-->
            <section class="">
                <div class="md:mx-10 mx-4">
                    <div class="text-center text-white pt-10">
                        <h2 class="md:text-[36px] text-[24px] leading-11 mt-4 text-[#053B7A] font-[600]">Parents
                            Insights</h2>
                    </div>
                    <div class="xl:w-[1280px] lg:w-[1080px] md:w-[768px] md:mx-auto mx-3 px-2">
                        <div class="swiper carousel4 mt-10">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide" data-aos="zoom-out-right">
                                    <div class="relative py-5 p-5 gap-5 rounded-[15px] shadow items-center "
                                        style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                                        <div class="">
                                            <img src="./assets/images/ayushi.png"
                                                class="w-[150px] h-[150px] cover mx-auto rounded-[50%]" alt="" />
                                        </div>
                                        <div class="mt-1 text-center">
                                            <h3 class="mt-3 font-[600] text-[20px] text-black">Ayushi Jain</h3>
                                            <p
                                                class="md:text-[15px] lg:text-[14px] xl:text-[13px] 2xl:text-[14px] text-gray-500 relative z-90">
                                                The school is very good in studies, my child is improving in studies,
                                                and her knowledge has also increased, thanks a lot to Asha Ma'am and all
                                                the teachers for taking such good care of her and keeping us updatedðŸ™.
                                            </p>
                                        </div>
                                        <div class="absolute right-3 top-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44"
                                                viewBox="0 0 16 16">
                                                <path fill="#E31E24"
                                                    d="M12.5 10A3.5 3.5 0 1 1 16 6.5l.016.5a7 7 0 0 1-7 7v-2a4.97 4.97 0 0 0 3.536-1.464a5 5 0 0 0 .497-.578a3.6 3.6 0 0 1-.549.043zm-9 0A3.5 3.5 0 1 1 7 6.5l.016.5a7 7 0 0 1-7 7v-2a4.97 4.97 0 0 0 3.536-1.464a5 5 0 0 0 .497-.578a3.6 3.6 0 0 1-.549.043z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide" data-aos="zoom-out-left">
                                    <div class="relative py-5 p-5 gap-5 rounded-[15px] shadow items-center "
                                        style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                                        <div class="">
                                            <img src="./assets/images/neelima.png"
                                                class="w-[150px] h-[150px] cover mx-auto rounded-[50%]" alt="" />
                                        </div>
                                        <div class="mt-1 text-center">
                                            <h3 class="mt-3 font-[600] text-[20px] text-black">Neelima Gautam</h3>
                                            <p
                                                class="md:text-[15px] lg:text-[14px] xl:text-[13px] 2xl:text-[14px] text-gray-500 relative z-90">
                                                I am very happy that my child is in the hands of such eminent, skilled,
                                                and professional teachers and staff at Allenhouse. I feel extremely
                                                proud to be part of the parent group of the Superhouse family.
                                            </p>
                                        </div>
                                        <div class="absolute right-3 top-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44"
                                                viewBox="0 0 16 16">
                                                <path fill="#E31E24"
                                                    d="M12.5 10A3.5 3.5 0 1 1 16 6.5l.016.5a7 7 0 0 1-7 7v-2a4.97 4.97 0 0 0 3.536-1.464a5 5 0 0 0 .497-.578a3.6 3.6 0 0 1-.549.043zm-9 0A3.5 3.5 0 1 1 7 6.5l.016.5a7 7 0 0 1-7 7v-2a4.97 4.97 0 0 0 3.536-1.464a5 5 0 0 0 .497-.578a3.6 3.6 0 0 1-.549.043z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div> -->
                        </div>
                    </div>
                </div>
            </section>
            <!--==== END ====-->

            <!--==== Start ====-->
            <footer class="mt-10">
                <div>
                    <div class="md:flex">
                        <div class="md:w-[50%]">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d8493.149249702581!2d77.929933!3d27.193266!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397477cdcb9a270f%3A0x2b0828d5140c9e1a!2sAllenhouse%20Public%20School%20Agra!5e1!3m2!1sen!2sin!4v1751620558757!5m2!1sen!2sin"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="md:w-[50%] bg-blue-main">
                            <div class="p-10">
                                <h2 class="font-[600] text-[40px] text-white">Contact Us</h2>
                                <ul class="mt-4">
                                    <li class="flex text-white gap-3 items-center mb-4"><span><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path fill="#fff"
                                                    d="M19.95 21q-3.125 0-6.175-1.362t-5.55-3.863t-3.862-5.55T3 4.05q0-.45.3-.75t.75-.3H8.1q.35 0 .625.238t.325.562l.65 3.5q.05.4-.025.675T9.4 8.45L6.975 10.9q.5.925 1.187 1.787t1.513 1.663q.775.775 1.625 1.438T13.1 17l2.35-2.35q.225-.225.588-.337t.712-.063l3.45.7q.35.1.575.363T21 15.9v4.05q0 .45-.3.75t-.75.3" />
                                            </svg></span><a href="tel:919044554801">+91 9044554801</a></li>
                                    <li class="flex text-white gap-3 items-center mb-4"><span><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path fill="#fff"
                                                    d="M4 20q-.825 0-1.412-.587T2 18V6q0-.825.588-1.412T4 4h16q.825 0 1.413.588T22 6v12q0 .825-.587 1.413T20 20zm8-7l8-5V6l-8 5l-8-5v2z" />
                                            </svg></span>
                                        Principal@allenhouseagra.com
                                    </li>
                                    <li class="flex text-white gap-3 items-center"><span><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path fill="#fff"
                                                    d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7" />
                                            </svg></span>Plot No. C 2, Sector - C
                                        2,
                                        Shastripuram Agra, 282007</li>
                                </ul>
                                <div class="mt-5 flex gap-4">
                                    <h5 class="text-white text-[20px]">Follow us on :</h5>
                                    <ul class="flex gap-4 items-center">
                                        <li><a href="https://www.facebook.com/Allenhouseagra"><img
                                                    src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/9d0DF8djfjoxGImlA20yu8I0QNhnrwI8a89WS6D7.png"
                                                    alt="" class="w-[12px]"></a></li>
                                        <li><a href="https://www.instagram.com/allenhouseagra/"><img
                                                    src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/r3CZWLa921XyxMbb1bki2tYIA2oAnOvlMDFWBVIw.png"
                                                    alt="" class="w-[22px]"></a></li>
                                        <!-- <li><a href=""><img
                                                    src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/uhgqVSKLJflOf8GbKSvsOx8p549rkTYvb1jjEC6t.png"
                                                    alt="" class="w-[22px]"></a></li> -->
                                        <li><a href="https://www.youtube.com/channel/UCx7V52FZvoDLOlte-hufLJQ"><img
                                                    src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/ORGYw8Xo1qQ0LS8LVEaTGU3khQ7r2HkkrFZ0pH50.png"
                                                    alt="" class="w-[25px]"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!--==== END ====-->

        </div>
    </div>
    <div>
        <a id="scroll" style="display: block;"><span></span></a>
    </div>

    <div id="videoModal" class="fixed inset-0   bg-opacity-70 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl w-[90%] max-w-3xl relative shadow-lg">
            <!-- Close Button -->
            <button id="closeModalBtn"
                class="absolute top-2 right-2 text-white bg-red-600 rounded-full w-8 h-8 flex items-center justify-center hover:bg-red-700 z-50">
                &times;
            </button>
            <!-- Video Container -->
            <div class="w-full aspect-video">
                <iframe id="videoIframe" class="w-full h-full rounded-b-xl" class="w-[100%] md:h-[100%]"
                    src="https://www.youtube.com/embed/Vb-_k6SIV34?autoplay=1&mute=1&loop=1&playlist=Vb-_k6SIV34"
                    frameborder="0" allow="autoplay;" allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>




    <script>
        
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const videoModal = document.getElementById('videoModal');
        const videoIframe = document.getElementById('videoIframe');

        openModalBtn.addEventListener('click', () => {
            videoModal.classList.remove('hidden');
            videoIframe.src += ''; // Reload video to autoplay
        });

        closeModalBtn.addEventListener('click', () => {
            videoModal.classList.add('hidden');
            videoIframe.src = videoIframe.src; // Reset to stop the video
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        const swiper2 = new Swiper('.carousel2', {
            loop: true,
            spaceBetween: 20,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 4
                },
                1220: {
                    slidesPerView: 4
                },
                1320: {
                    slidesPerView: 5
                }
            }
        });
        const swiper3 = new Swiper('.carousel3', {
            loop: true,
            spaceBetween: 15,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 4
                }
            }
        });
        const swiper4 = new Swiper('.carousel4', {
            loop: true,
            spaceBetween: 20,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 1
                },
                1024: {
                    slidesPerView: 2
                }
            }
        });


        const ourToppers = new Swiper('.our-toppers', {
            loop: true,
            spaceBetween: 15,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 4
                },
                1220: {
                    slidesPerView: 4
                },
                1320: {
                    slidesPerView: 5
                }
            }
        });

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            window.addEventListener("scroll", function () {
                if (window.scrollY > 100) {
                    document.getElementById("scroll").style.display = "block";
                } else {
                    document.getElementById("scroll").style.display = "none";
                }
            });

            document.getElementById("scroll").addEventListener("click", function () {
                setTimeout(function () {
                    window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    });
                }, 500); // 500ms delay
            });
        });
    </script>
<script>
    const baseUrl = "<?= rtrim(API_BASE_URL, '/') ?>/save-enqury-form/<?= SCHOOL_ID ?>"; 

    // Validation regex patterns
    const nameRegex = /^[A-Za-z\s]+$/;
    const mobileRegex = /^[6-9]\d{9}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const pincodeRegex = /^[1-9][0-9]{5}$/;

    // Error elements
    const studentError = document.getElementById("student-error");
    const parentError = document.getElementById("parent-error");
    const mobileError = document.getElementById("mobile-error");
    const emailError = document.getElementById("email-error");
    const pincodeError = document.getElementById("pincode-error");
    const classError = document.getElementById("classError");
    const checkboxError = document.getElementById("checkboxError");

    // Input validations
    document.getElementById("estudent_name").addEventListener("input", function() {
        studentError.classList.toggle("hidden", !this.value || nameRegex.test(this.value));
    });

    document.getElementById("eparent_name").addEventListener("input", function() {
        parentError.classList.toggle("hidden", !this.value || nameRegex.test(this.value));
    });

    document.getElementById("emobile").addEventListener("input", function() {
        this.value = this.value.replace(/\D/g, '').slice(0, 10);
        mobileError.classList.toggle("hidden", !this.value || mobileRegex.test(this.value));
    });

    document.getElementById("eemail").addEventListener("input", function() {
        this.value = this.value.toLowerCase();
        emailError.classList.toggle("hidden", !this.value || emailRegex.test(this.value));
    });

    document.getElementById("epincode").addEventListener("input", function() {
        this.value = this.value.replace(/\D/g, '').slice(0, 6);
        pincodeError.classList.toggle("hidden", !this.value || pincodeRegex.test(this.value));
    });

    // Form submission
    document.getElementById("enquiryForm").addEventListener("submit", function(e) {
        e.preventDefault();

        const submitBtn = document.getElementById("submitBtn");
        submitBtn.disabled = true;
        submitBtn.textContent = "Submitting...";

        // Gather values
        const grade = document.getElementById("egrade").value.trim();
        const studentName = document.getElementById("estudent_name").value.trim();
        const parentName = document.getElementById("eparent_name").value.trim();
        const mobile = document.getElementById("emobile").value.trim();
        const email = document.getElementById("eemail").value.trim();
        const city = document.getElementById("ecity").value.trim();
        const pincode = document.getElementById("epincode").value.trim();
        const checkbox = document.getElementById("popupCheckbox").checked;

        let isValid = true;

        if (!grade) { classError.classList.remove("hidden"); isValid = false; } 
        else { classError.classList.add("hidden"); }

        if (!nameRegex.test(studentName)) { studentError.classList.remove("hidden"); isValid = false; }
        else { studentError.classList.add("hidden"); }

        if (!nameRegex.test(parentName)) { parentError.classList.remove("hidden"); isValid = false; }
        else { parentError.classList.add("hidden"); }

        if (!mobileRegex.test(mobile)) { mobileError.classList.remove("hidden"); isValid = false; }
        else { mobileError.classList.add("hidden"); }

        if (!emailRegex.test(email)) { emailError.classList.remove("hidden"); isValid = false; }
        else { emailError.classList.add("hidden"); }

        if (!pincodeRegex.test(pincode)) { pincodeError.classList.remove("hidden"); isValid = false; }
        else { pincodeError.classList.add("hidden"); }

        if (!checkbox) { checkboxError.classList.remove("hidden"); isValid = false; }
        else { checkboxError.classList.add("hidden"); }

        if (!isValid) {
            submitBtn.disabled = false;
            submitBtn.textContent = "Submit";
            return;
        }

        // API payload
      const source = document.getElementById("source").value.trim();

const payload = {
    grade,
    studentName,
    parentName,
    mobile,
    email,
    city,
    pincode,
    source   // ðŸ‘ˆ Added here
};


       fetch(baseUrl, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(payload)
})
.then(response => {
    if (!response.ok) throw new Error("Error: " + response.statusText);
    return response.json();
})
.then(data => {
    // Reset form
    document.getElementById("enquiryForm").reset();

    // Reset city dropdown UI
    const fakeDropdown = document.querySelector(".customSelect .selected-text");
    fakeDropdown.textContent = "Select City";
    document.getElementById("ecity").value = "";

    // Show success message
    const successMessage = document.getElementById("successMessage");
    successMessage.classList.remove("hidden");
    
    // Trigger opacity transition
    setTimeout(() => {
        successMessage.style.opacity = "1";
    }, 10);

    // Hide after 3 seconds with fade-out
    setTimeout(() => {
        successMessage.style.opacity = "0";
        // After transition, hide completely
        setTimeout(() => {
            successMessage.classList.add("hidden");
        }, 300);
    }, 3000);
})


.catch(error => {
    alert("There was an error submitting the form.");
    console.error("Error:", error);
})
.finally(() => {
    submitBtn.disabled = false;
    submitBtn.textContent = "Submit";
});

    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const select = document.getElementById("ecity");
    const fakeDropdown = select.nextElementSibling; // div showing selected text
    const optionsContainer = fakeDropdown.nextElementSibling; // ul container
    const ul = optionsContainer.querySelector("ul");
    const searchInput = optionsContainer.querySelector("input");

    // Populate the UL from hidden select
    Array.from(select.options).forEach(opt => {
        if(opt.value === "") return;
        const li = document.createElement("li");
        li.textContent = opt.textContent;
        li.setAttribute("data-value", opt.value);
        li.classList.add("cursor-pointer", "p-2", "hover:bg-gray-100");
        ul.appendChild(li);

        // Click event
        li.addEventListener("click", function() {
            select.value = this.getAttribute("data-value"); // update hidden select
            fakeDropdown.querySelector(".selected-text").textContent = this.textContent; // update display
            optionsContainer.classList.add("hidden"); // close dropdown
        });
    });

    // Show/hide dropdown
    fakeDropdown.addEventListener("click", () => {
        optionsContainer.classList.toggle("hidden");
        searchInput.value = "";
        Array.from(ul.children).forEach(li => li.classList.remove("hidden"));
    });

    // Search filter
    searchInput.addEventListener("input", function() {
        const term = this.value.toLowerCase();
        Array.from(ul.children).forEach(li => {
            li.classList.toggle("hidden", !li.textContent.toLowerCase().includes(term));
        });
    });

    // Close dropdown if click outside
    document.addEventListener("click", function(e){
        if(!fakeDropdown.contains(e.target) && !optionsContainer.contains(e.target)){
            optionsContainer.classList.add("hidden");
        }
    });
});
</script>


</body>

</html>
