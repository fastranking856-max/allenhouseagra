<?php
include "includes/apis.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AllenHouse Agra| Teacher Details's</title>
    <?php include "includes/head.php" ?>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative mb-[120px]">
        <!-- Start -->
        <div class="bg-center flex items-center text-left h-[300px] comman-banner">
            <div>
                <h2
                    class="text-[32px] sm:hidden block font-[700] text-white text-left mb-5 sm:mb-8 hr-line relative leading-9 pl-4 ">
                    Teacher Details's
                </h2>
            </div>

            <div class="md:w-[100%]">
                <h2
                    class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    Teacher
                    <span class="sm:hidden"></span> Details's
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
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="ms-1 text-sm font-medium text-blue-main">Admission
                        </p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="ms-1 text-sm font-medium text-blue-main">Information
                        </p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="teacher-details" class="ms-1 text-sm font-medium text-blue-main"> Teacher
                            Details's</a>
                    </div>
                </li>
            </ol>
        </div>
        <!-- End -->
        <!-- <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
            <div class="sm:mt-10 relative">

                <div>

                    <div class="md:w-[100%]">


                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-10">
                            <table class="table-auto w-full border-collapse border border-gray-400">
                                <thead>
                                    <tr class="bg-gray-200">
                                        <th class="border border-gray-400 px-4 py-2">S.NO.</th>
                                        <th class="border border-gray-400 px-4 py-2">NAME</th>
                                        <th class="border border-gray-400 px-4 py-2">DESIGNATION</th>
                                        <th class="border border-gray-400 px-4 py-2">SUBJECTS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">1</td>
                                        <td class="border border-gray-400 px-4 py-2">MS. POONAM ARORA</td>
                                        <td class="border border-gray-400 px-4 py-2">PRINCIPAL</td>
                                        <td class="border border-gray-400 px-4 py-2">N.A.</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">2</td>
                                        <td class="border border-gray-400 px-4 py-2">MS. SHALINI SRIVASTAVA</td>
                                        <td class="border border-gray-400 px-4 py-2">HEADMISTRESS</td>
                                        <td class="border border-gray-400 px-4 py-2">N.A.</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">3</td>
                                        <td class="border border-gray-400 px-4 py-2">MR. MARTIN TIMOTHY</td>
                                        <td class="border border-gray-400 px-4 py-2">PGT</td>
                                        <td class="border border-gray-400 px-4 py-2">SST, ECO & BST</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">4</td>
                                        <td class="border border-gray-400 px-4 py-2">MS. MADHULIKA CHAKRAVORTY</td>
                                        <td class="border border-gray-400 px-4 py-2">PRT</td>
                                        <td class="border border-gray-400 px-4 py-2">ENGLISH</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">5</td>
                                        <td class="border border-gray-400 px-4 py-2">MS. AMANDEEP KAUR</td>
                                        <td class="border border-gray-400 px-4 py-2">PRT</td>
                                        <td class="border border-gray-400 px-4 py-2">ENGLISH & SST</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">6</td>
                                        <td class="border border-gray-400 px-4 py-2">MR. GAGAN PREET</td>
                                        <td class="border border-gray-400 px-4 py-2">PRT</td>
                                        <td class="border border-gray-400 px-4 py-2">ALL</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">7</td>
                                        <td class="border border-gray-400 px-4 py-2">MS. HEMA</td>
                                        <td class="border border-gray-400 px-4 py-2">PRT</td>
                                        <td class="border border-gray-400 px-4 py-2">G.K. & SFL</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">8</td>
                                        <td class="border border-gray-400 px-4 py-2">MS. PREETI MADNANI</td>
                                        <td class="border border-gray-400 px-4 py-2">PRT</td>
                                        <td class="border border-gray-400 px-4 py-2">SST, FMM</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">9</td>
                                        <td class="border border-gray-400 px-4 py-2">MS. NIKITA MUGRAI</td>
                                        <td class="border border-gray-400 px-4 py-2">PRT</td>
                                        <td class="border border-gray-400 px-4 py-2">ENGLISH, MATHS, EVS</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">10</td>
                                        <td class="border border-gray-400 px-4 py-2">MS. KAVITA PANT TRIPATHI</td>
                                        <td class="border border-gray-400 px-4 py-2">PRT</td>
                                        <td class="border border-gray-400 px-4 py-2">HINDI</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">11</td>
                                        <td class="border border-gray-400 px-4 py-2">MS. NIHARIKA GUJRAL</td>
                                        <td class="border border-gray-400 px-4 py-2">PRT</td>
                                        <td class="border border-gray-400 px-4 py-2">SST, MATHS</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">12</td>
                                        <td class="border border-gray-400 px-4 py-2">MS. DEVANSHI TIWARI</td>
                                        <td class="border border-gray-400 px-4 py-2">PRT</td>
                                        <td class="border border-gray-400 px-4 py-2">DANCE TEACHER</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">13</td>
                                        <td class="border border-gray-400 px-4 py-2">MS. SNEHA TRIPATHI</td>
                                        <td class="border border-gray-400 px-4 py-2">PRT</td>
                                        <td class="border border-gray-400 px-4 py-2">ICT</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">14</td>
                                        <td class="border border-gray-400 px-4 py-2">MS. NIDHI MISHRA</td>
                                        <td class="border border-gray-400 px-4 py-2">AUXILIARY TEACHER</td>
                                        <td class="border border-gray-400 px-4 py-2">N.A.</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">15</td>
                                        <td class="border border-gray-400 px-4 py-2">MR. DHARMENDRA</td>
                                        <td class="border border-gray-400 px-4 py-2">PTI</td>
                                        <td class="border border-gray-400 px-4 py-2">SWIMMING COACH</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">16</td>
                                        <td class="border border-gray-400 px-4 py-2">MS. SHWETA VERMA</td>
                                        <td class="border border-gray-400 px-4 py-2">PRT</td>
                                        <td class="border border-gray-400 px-4 py-2">MATHS SCIENCE</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">17</td>
                                        <td class="border border-gray-400 px-4 py-2">MS. KANCHAN SRIVASTAVA</td>
                                        <td class="border border-gray-400 px-4 py-2">PRT</td>
                                        <td class="border border-gray-400 px-4 py-2">HINDI</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">18</td>
                                        <td class="border border-gray-400 px-4 py-2">MS. APOORWA VAISH</td>
                                        <td class="border border-gray-400 px-4 py-2">PRT</td>
                                        <td class="border border-gray-400 px-4 py-2">ENGLISH, MATHS, EVS</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">19</td>
                                        <td class="border border-gray-400 px-4 py-2">MR. SHIRISH</td>
                                        <td class="border border-gray-400 px-4 py-2">PART TIMER</td>
                                        <td class="border border-gray-400 px-4 py-2">FRENCH</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">20</td>
                                        <td class="border border-gray-400 px-4 py-2">MS. PRIYA ARORA</td>
                                        <td class="border border-gray-400 px-4 py-2">ASSOCIATE TEACHER</td>
                                        <td class="border border-gray-400 px-4 py-2">ALL</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">21</td>
                                        <td class="border border-gray-400 px-4 py-2">MS. EILA SRIVASTAVA</td>
                                        <td class="border border-gray-400 px-4 py-2">PRT</td>
                                        <td class="border border-gray-400 px-4 py-2">ALL</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">22</td>
                                        <td class="border border-gray-400 px-4 py-2">MS. POOJA SRIVASTAVA</td>
                                        <td class="border border-gray-400 px-4 py-2">PRT</td>
                                        <td class="border border-gray-400 px-4 py-2">ALL</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">23</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. POOJA SRIVASTAVA</td>
                                        <td class="border border-gray-300 px-4 py-2">PRT</td>
                                        <td class="border border-gray-300 px-4 py-2">ALL</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">24</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. SHRUTI SHUKLA</td>
                                        <td class="border border-gray-300 px-4 py-2">PRT</td>
                                        <td class="border border-gray-300 px-4 py-2">ENGLISH, MATHS, EVS</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">25</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. MANISHA</td>
                                        <td class="border border-gray-300 px-4 py-2">PRT</td>
                                        <td class="border border-gray-300 px-4 py-2">SCIENCE</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">26</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. NAYANIKA</td>
                                        <td class="border border-gray-300 px-4 py-2">PRT</td>
                                        <td class="border border-gray-300 px-4 py-2">ALL</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">27</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. RASHMI PANWAR</td>
                                        <td class="border border-gray-300 px-4 py-2">ASSOCIATE TEACHER</td>
                                        <td class="border border-gray-300 px-4 py-2">ALL</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">28</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. POOJA PANDEY</td>
                                        <td class="border border-gray-300 px-4 py-2">PRT</td>
                                        <td class="border border-gray-300 px-4 py-2">MUSIC</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">29</td>
                                        <td class="border border-gray-300 px-4 py-2">MR. ROHIT KHARE</td>
                                        <td class="border border-gray-300 px-4 py-2">TGT</td>
                                        <td class="border border-gray-300 px-4 py-2">MUSIC</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">30</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. RANJANA SAXENA</td>
                                        <td class="border border-gray-300 px-4 py-2">TGT</td>
                                        <td class="border border-gray-300 px-4 py-2">HINDI SANSKRIT</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">31</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. SEEMA VAISH</td>
                                        <td class="border border-gray-300 px-4 py-2">TGT</td>
                                        <td class="border border-gray-300 px-4 py-2">HINDI SANSKRIT</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">32</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. SWATI RASTOGI</td>
                                        <td class="border border-gray-300 px-4 py-2">TGT</td>
                                        <td class="border border-gray-300 px-4 py-2">ENGLISH</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">33</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. GUNJAN TIWARI</td>
                                        <td class="border border-gray-300 px-4 py-2">TGT</td>
                                        <td class="border border-gray-300 px-4 py-2">SCIENCE</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">34</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. LIPPY PANDEY</td>
                                        <td class="border border-gray-300 px-4 py-2">TGT</td>
                                        <td class="border border-gray-300 px-4 py-2">SCIENCE</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">35</td>
                                        <td class="border border-gray-300 px-4 py-2">MR. RAJIV SINGH</td>
                                        <td class="border border-gray-300 px-4 py-2">TGT</td>
                                        <td class="border border-gray-300 px-4 py-2">PED</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">36</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. VEENA HEGDE</td>
                                        <td class="border border-gray-300 px-4 py-2">TGT</td>
                                        <td class="border border-gray-300 px-4 py-2">CA</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">37</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. SONIA SHAH</td>
                                        <td class="border border-gray-300 px-4 py-2">PGT</td>
                                        <td class="border border-gray-300 px-4 py-2">CS, AI</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">38</td>
                                        <td class="border border-gray-300 px-4 py-2">MR. ZUBAIR KHAN</td>
                                        <td class="border border-gray-300 px-4 py-2">PGT</td>
                                        <td class="border border-gray-300 px-4 py-2">MATHS</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">39</td>
                                        <td class="border border-gray-300 px-4 py-2">MR. GAGAN DEEP SINGH</td>
                                        <td class="border border-gray-300 px-4 py-2">TGT</td>
                                        <td class="border border-gray-300 px-4 py-2">PHYSICS</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">40</td>
                                        <td class="border border-gray-300 px-4 py-2">MR. ANIL KUMAR RATHOUR</td>
                                        <td class="border border-gray-300 px-4 py-2">PGT</td>
                                        <td class="border border-gray-300 px-4 py-2">ACCOUNTS, FMM</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">41</td>
                                        <td class="border border-gray-300 px-4 py-2">DR. SIDDHARTH VISHWAKARMA</td>
                                        <td class="border border-gray-300 px-4 py-2">PGT</td>
                                        <td class="border border-gray-300 px-4 py-2">CHEMISTRY</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">42</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. VANDANA PANDEY</td>
                                        <td class="border border-gray-300 px-4 py-2">PGT</td>
                                        <td class="border border-gray-300 px-4 py-2">SFL, PSYCHOLOGY</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">43</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. JAYA CHATURVEDI</td>
                                        <td class="border border-gray-300 px-4 py-2">PGT</td>
                                        <td class="border border-gray-300 px-4 py-2">SST</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">44</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. ALBINA WASIM</td>
                                        <td class="border border-gray-300 px-4 py-2">PGT</td>
                                        <td class="border border-gray-300 px-4 py-2">BIO</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">45</td>
                                        <td class="border border-gray-300 px-4 py-2">MR. AKASH</td>
                                        <td class="border border-gray-300 px-4 py-2">SWIMMING COACH</td>
                                        <td class="border border-gray-300 px-4 py-2">N.A.</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">46</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. SARITA KANNOJIA</td>
                                        <td class="border border-gray-300 px-4 py-2">SWIMMING COACH</td>
                                        <td class="border border-gray-300 px-4 py-2">N.A.</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">47</td>
                                        <td class="border border-gray-300 px-4 py-2">MR. RAJ KUMAR SINGH</td>
                                        <td class="border border-gray-300 px-4 py-2">PGT</td>
                                        <td class="border border-gray-300 px-4 py-2">ANIMATION & MULTI MEDIA</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">48</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. ARCHANA DUBEY</td>
                                        <td class="border border-gray-300 px-4 py-2">LIBRARIAN</td>
                                        <td class="border border-gray-300 px-4 py-2">N.A.</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">49</td>
                                        <td class="border border-gray-300 px-4 py-2">MR. PUNEET CHAUHAN</td>
                                        <td class="border border-gray-300 px-4 py-2">IT HEAD</td>
                                        <td class="border border-gray-300 px-4 py-2">N.A.</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">50</td>
                                        <td class="border border-gray-300 px-4 py-2">MR. SANJAY SINGH</td>
                                        <td class="border border-gray-300 px-4 py-2">LAB ASST</td>
                                        <td class="border border-gray-300 px-4 py-2">N.A.</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">51</td>
                                        <td class="border border-gray-300 px-4 py-2">MR. PARVENDER</td>
                                        <td class="border border-gray-300 px-4 py-2">TGT ART & CRAFT</td>
                                        <td class="border border-gray-300 px-4 py-2">ART & CRAFT</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">52</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. NIDHI KHAN</td>
                                        <td class="border border-gray-300 px-4 py-2">PRT</td>
                                        <td class="border border-gray-300 px-4 py-2">ALL</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">53</td>
                                        <td class="border border-gray-300 px-4 py-2">MS. SUCHI DUGGAL</td>
                                        <td class="border border-gray-300 px-4 py-2">TGT ENGLISH</td>
                                        <td class="border border-gray-300 px-4 py-2">ENGLISH</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div> -->

          <p class="text-center font-[700]">NOT PROVIDED</p>
    </div>
    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>

</body>

</html>