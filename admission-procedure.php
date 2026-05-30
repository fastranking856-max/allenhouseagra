<?php
include "includes/apis.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://allenhouseagra.com/admission-procedure" />
    <!-- <title>Learn About the Admission Process | Allenhouse School, Agra</title>
    <meta name="description" content="Follow our simple step-by-step admission process to join Allenhouse School, Agra, for a better future for your child today."> -->
    <?php include 'includes/meta.php'; ?>
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
      "name": "Admission Procedure",
      "item": "https://allenhouseagra.com/admission-procedure"
    }
  ]
}
</script>

    <?php include "includes/head.php" ?>
</head>

<body>

    <?php include "includes/header.php" ?>
    <div class="main relative mb-[40px] sm:mb-[120px]">
        <div class="bg-center flex items-center text-left h-[300px] comman-banner">
            <div>
                <h2 class="text-[32px] sm:hidden block font-[700] text-white text-left mb-5 sm:mb-8 hr-line relative leading-9 pl-4">
                    Admission Procedure
                </h2>
            </div>
            <div class="md:w-[100%]">
                <h2 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    Admission <span class="sm:hidden"></span> Procedure
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
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="text-xs font-medium ms-1 sm:text-sm text-blue-main">Admission</p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 rtl:rotate-180 text-blue-main" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="admission-procedure" class="text-xs font-medium ms-1 sm:text-sm text-blue-main">Admission Procedure</a>
                    </div>
                </li>
            </ol>
        </div>

        <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
            <div class="relative sm:mt-10">
                <div>
                    <div class="md:w-[100%]">
                        <div>
                            <p class="font-[700] mt-4 text-gray-700">Allenhouse Public School believes in preparing future-ready global citizens by encouraging Academic Excellence, Creativity, and Holistic Development in a values-driven environment.</p>
                            <p class="mt-2 text-gray-700">The academic year commences in early April and concludes in late March of the following year. The admission process starts in December with registration, followed by a school-administered written entrance test. Shortlisted students and their parents then have an interaction with the Principal.</p>
                            <p class="mt-2 text-gray-700">For admissions, parents must complete the application form on the same day their child appears for the entrance test. Playgroup admissions include a one-on-one interaction between the child and the teacher.</p>
                            <p class="mt-2 text-gray-700">Admissions from Grade 1 to Grade 7 are based on the results of the entrance test conducted by the school, along with case-specific evaluations in accordance with the school's educational policies.</p>
                        </div>

                        <div class="mt-5">
                            <p class="text-[18px] text-gray-700 font-[700]">At the time of registration, the following documents have to be submitted in the school office</p>
                            <ul class="text-[16px] mt-2 ml-4 text-gray-700" style="list-style:disc">
                                <li>Filled-in form and two passport-size photographs.</li>
                                <li>Attested copy of the Birth Certificate of the Child.</li>
                                <li>Original birth certificate for verification.</li>
                                <li>Report card of previous class (Attested).</li>
                                <li>T.C. (original) is to be submitted within one month from the admission date.</li>
                                <li>Original Character certificate for (Class VII and above)</li>
                                <li>Copy of the Aadhar Card of the Child and the Parents, both.</li>
                                <li>Caste certificate for SC / ST / OBC / EWS.</li>
                                <li>Certificate for disability, if any.</li>
                                <li>PEN (Permanent Education Number)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sm:mt-20 mt-10 mx-4 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-4">
                <div class="relative">
                    <h2 class="text-center sm:text-[32px] text-[28px] font-[700] text-blue-main leading-9">
                        Enquiry Form | Session 2026–2027
                    </h2>

                    <div class="mt-10">
                        <form id="AdmissionForm" method="post">
                            <div class="mt-4">
                                <select name="session" required id="asession" class="w-full p-2 text-gray-500 border border-gray-300 rounded-md">
                                    <option value="" disabled selected>Select Session</option>
                                    <?php
                                    $sessions = include "includes/session-api.php";
                                    foreach ($sessions as $item):
                                    ?>
                                        <option value="<?= htmlspecialchars($item['session']) ?>"><?= htmlspecialchars($item['session']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mt-4">
                                <select name="grade" id="agrade" required class="w-full border border-gray-300 p-[11px] rounded-md text-[#808080cc]">
                                    <option value="" disabled selected>Select Grade</option>
                                    <?php
                                    $grades = include "includes/grade-api.php";
                                    if (is_array($grades)) {
                                        foreach ($grades as $grade) {
                                            $name = trim((string) ($grade['grades'] ?? $grade['name'] ?? ''));
                                            if ($name === '') {
                                                continue;
                                            }
                                            echo '<option value="' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '">'
                                                . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- STUDENT NAME -->
                            <div class="mt-4">
                                <input type="text" id="astudent_name" placeholder="Student Name" maxlength="50"
                                    class="w-full border border-gray-300 p-[11px] rounded-md outline-none" required>
                                <span id="astudent-error" class="hidden mt-1 text-sm text-red-500">Only letters and spaces allowed.</span>
                                <span id="astudent-length-error" class="hidden mt-1 text-sm text-red-500">Max 50 characters allowed.</span>
                            </div>

                            <!-- PARENT NAME -->
                            <div class="mt-4">
                                <input type="text" id="aparent_name" placeholder="Parents Name" maxlength="50"
                                    class="w-full border border-gray-300 p-[11px] rounded-md outline-none">
                                <span id="aparent-error" class="hidden mt-1 text-sm text-red-500">Only letters and spaces allowed.</span>
                                <span id="aparent-length-error" class="hidden mt-1 text-sm text-red-500">Max 50 characters allowed.</span>
                            </div>

                            <!-- MOBILE -->
                            <div class="mt-4">
                                <input type="text" id="amobile" placeholder="Mobile Number" maxlength="10"
                                    class="w-full border border-gray-300 p-[11px] rounded-md outline-none" required>
                                <div id="amobile-error" class="hidden mt-1 text-sm text-red-500">Please enter a valid 10-digit Indian mobile number.</div>
                            </div>

                            <!-- EMAIL -->
                            <div class="mt-4">
                                <input type="email" id="aemail" placeholder="Email"
                                    class="w-full border border-gray-300 p-[11px] rounded-md outline-none">
                                <span id="aemail-error" class="hidden mt-1 text-sm text-red-500">Please enter a valid email address.</span>
                            </div>

                            <!-- CITY DROPDOWN -->
                            <div class="relative mt-4 customSelect">
                                <select id="acity" name="city" class="hidden">
                                    <option value="">Select City</option>
                                    <?php
                                    $cities = include 'includes/get-city.php';
                                    if (is_array($cities)) {
                                        foreach ($cities as $city) {
                                            $cityName = trim((string) ($city['name'] ?? ''));
                                            if ($cityName === '') {
                                                continue;
                                            }
                                            echo '<option value="' . htmlspecialchars($cityName, ENT_QUOTES, 'UTF-8') . '">'
                                                . htmlspecialchars($cityName, ENT_QUOTES, 'UTF-8') . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="border border-gray-300 p-[11px] rounded-md bg-white cursor-pointer flex justify-between items-center">
                                    <span class="selected-text text-[#808080cc]">Select City</span>
                                    <span>▼</span>
                                </div>
                                <div class="absolute z-50 hidden w-full mt-1 bg-white border border-gray-300 rounded-md shadow-md">
                                    <input type="text" placeholder="Search..." class="w-full p-2 border-b border-gray-300 outline-none">
                                    <ul class="overflow-y-auto max-h-48"></ul>
                                </div>
                            </div>

                            <!-- PINCODE -->
                            <div class="mt-4">
                                <input type="text" id="apincode" placeholder="Pincode" maxlength="6"
                                    class="w-full border border-gray-300 p-[11px] rounded-md outline-none" required>
                                <span id="apincode-error" class="hidden mt-1 text-sm text-red-500">Please enter a valid 6-digit pincode.</span>
                            </div>

                            <div class="flex items-center gap-2 mt-4">
                                <input type="checkbox" id="terms" required>
                                <label for="terms">I agree to <a href="termsandconditions" class="text-blue-500 underline">Terms and Conditions</a>.</label>
                            </div>

                            <input type="hidden" name="source" id="source">

                            <div id="AdmissionFormPopup" class="relative hidden px-4 py-2 mt-5 mb-5 text-white bg-green-500 rounded" style="z-index:999">
                                Form submitted successfully!
                            </div>

                            <div class="mt-4">
                                <button type="submit" id="AsubmitBtn"
                                    class="p-4 bg-blue-main w-full text-white font-semibold text-[18px] rounded hover:bg-red-500 transition">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once __DIR__ . '/includes/environment.php';
    $siteBaseUrl = rtrim(
        ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http')
        . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost')
        . rtrim(site_base_url(), '/'),
        '/'
    );
    ?>
    <?php include __DIR__ . '/includes/form-proxy-client.php'; ?>
    <script>
        const SITE_BASE_URL = <?= json_encode($siteBaseUrl, JSON_UNESCAPED_SLASHES) ?>;
        (function() {
            function getParam(name) {
                const urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(name);
            }

            // Capture initial source: UTM > referrer
            var source = getParam("utm_source") || document.referrer || "";

            console.log("Initial Source:", source);

            // Normalize sources
            if (!source) {
                // Case 1: Direct visit
                source = "Website";
            } else if (source.includes("google.")) {
                source = "Google-Ads by Agency";
                console.log("Referrer is Google, setting source to 'Google-Ads by Agency'");
            } else if (source.includes("facebook.")) {
                source = "Facebook by Agency";
            } else if (source.includes("instagram.")) {
                source = "Instagram by Agency";
                // } else if (!getParam("utm_source")) {
                //      source = "Google by Agency";
            }

            // Save in sessionStorage (first touch only)
            if (!sessionStorage.getItem("leadSource")) {
                sessionStorage.setItem("leadSource", source);
            }

            var finalSource = sessionStorage.getItem("leadSource");

            // Fill hidden field if it exists
            var sourceInput = document.getElementById("source");
            if (sourceInput) {
                sourceInput.value = finalSource;
            }

            console.log("Captured Source:", finalSource);
        })();


        // Validation regex patterns
        const nameRegex = /^[A-Za-z\s]+$/;
        const mobileRegex = /^[6-9]\d{9}$/;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const pincodeRegex = /^[1-9][0-9]{5}$/;

        // Error elements
        const studentError = document.getElementById("astudent-error");
        const parentError = document.getElementById("aparent-error");
        const mobileError = document.getElementById("amobile-error");
        const emailError = document.getElementById("aemail-error");
        const pincodeError = document.getElementById("apincode-error");


        document.getElementById("astudent_name").addEventListener("input", function() {
            studentError.classList.toggle("hidden", !this.value || nameRegex.test(this.value));
        });

        document.getElementById("aparent_name").addEventListener("input", function() {
            parentError.classList.toggle("hidden", !this.value || nameRegex.test(this.value));
        });

        document.getElementById("amobile").addEventListener("input", function() {
            this.value = this.value.replace(/\D/g, '').slice(0, 10);
            mobileError.classList.toggle("hidden", !this.value || mobileRegex.test(this.value));
        });

        document.getElementById("aemail").addEventListener("input", function() {
            this.value = this.value.toLowerCase();
            emailError.classList.toggle("hidden", !this.value || emailRegex.test(this.value));
        });

        document.getElementById("apincode").addEventListener("input", function() {
            this.value = this.value.replace(/\D/g, '').slice(0, 6);
            pincodeError.classList.toggle("hidden", !this.value || pincodeRegex.test(this.value));
        });

        // Submit Validation
        document.getElementById("AdmissionForm").addEventListener("submit", function(e) {
            e.preventDefault();

            // Inputs
            const agrade = document.getElementById("agrade").value.trim();
            const astudent_name = document.getElementById("astudent_name").value.trim();
            const aparent_name = document.getElementById("aparent_name").value.trim();
            const amobile = document.getElementById("amobile").value.trim();
            const aemail = document.getElementById("aemail").value.trim();
            const acity = document.getElementById("acity").value.trim();
            const apincode = document.getElementById("apincode").value.trim();
            const source = sessionStorage.getItem("leadSource") || "Website";
            const asession = document.getElementById("asession").value.trim();

            let isValid = true;

            if (!nameRegex.test(astudent_name)) {
                studentError.textContent = "Only letters and spaces allowed.";
                isValid = false;
            }

            if (!nameRegex.test(aparent_name)) {
                parentError.textContent = "Only letters and spaces allowed.";
                isValid = false;
            }

            if (!mobileRegex.test(amobile)) {
                mobileError.classList.remove("hidden");
                isValid = false;
            }

            if (!emailRegex.test(aemail)) {
                emailError.classList.remove("hidden");
                isValid = false;
            }

            if (!pincodeRegex.test(apincode)) {
                pincodeError.classList.remove("hidden");
                isValid = false;
            }

            if (!isValid) return; // STOP submission if any field is invalid

            const submitBtn = document.getElementById("AsubmitBtn");
            const originalBtnText = submitBtn.textContent; 
            submitBtn.disabled = true;
            submitBtn.textContent = "Submitting...";

            // API Payload
            const payload = {
                session: asession,
                grade: agrade,
                studentName: astudent_name,
                parentName: aparent_name,
                mobile: amobile,
                email: aemail,
                city: acity,
                pincode: apincode,
                source: source,
                source_type: "Website",
            };

            fetch(SITE_BASE_URL + "/proxy/admission-proxy", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify(payload)
                })
                .then(function (response) {
                    return window.cmsParseProxyJson(response);
                })
                .then(function () {
                    document.getElementById("AdmissionFormPopup").classList.remove("hidden");
                    closePopup()
                    setTimeout(() => {
                        document.getElementById("AdmissionFormPopup").classList.add("hidden");
                    }, 20000);
                    document.getElementById("AdmissionForm").reset();
                    sessionStorage.removeItem("leadSource"); // optional: clear after submit
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalBtnText;
                })
                .catch(error => {
                    alert("There was an error submitting the form.");
                    console.error("Error:", error);
                     submitBtn.disabled = false;
                    submitBtn.textContent = originalBtnText;
                });
        });

        // Force dropdown reset on load
        document.addEventListener("DOMContentLoaded", () => {
            const asession = document.getElementById("asession");
            const agrade = document.getElementById("agrade");
            if (asession) asession.selectedIndex = 0;
            if (agrade) agrade.selectedIndex = 0;
        });
    </script>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>
</body>

</html>