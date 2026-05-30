<?php require_once __DIR__ . '/environment.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.2/glide.js"></script>
<script src="<?= site_asset_url('assets/js/wind.js') ?>"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const scrollBtn = document.getElementById("scroll");

        if (scrollBtn) {
            window.addEventListener("scroll", function() {
                if (window.scrollY > 100) {
                    scrollBtn.style.display = "block";
                } else {
                    scrollBtn.style.display = "none";
                }
            });

            scrollBtn.addEventListener("click", function() {
                setTimeout(function() {
                    window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    });
                }, 500); // 500ms delay
            });
        }
    });
</script>

<script>
    if (document.querySelector('.glide-marque')) {
        var glide09 = new Glide('.glide-marque', {
            type: 'carousel',
            autoplay: 4000,
            animationDuration: 4500,
            animationTimingFunc: 'linear',
            perView: 3,
            classes: {
                activeNav: '[&>*]:bg-slate-700',
            },
            breakpoints: {
                1024: {
                    perView: 2
                },
                640: {
                    perView: 1,
                    gap: 36
                }
            },
        });

        glide09.mount();
    }
</script>

<script>
    (function () {
        function hideEnquiryPopup() {
            var popup = document.getElementById('popupForm');
            if (popup) popup.classList.add('hidden');
        }
        function showEnquiryPopup() {
            var popup = document.getElementById('popupForm');
            if (popup) popup.classList.remove('hidden');
        }
        window.closePopup = hideEnquiryPopup;
        window.openPopup = showEnquiryPopup;

        document.addEventListener('click', function (e) {
            var closeBtn = e.target.closest('#closePopup');
            if (closeBtn) {
                e.preventDefault();
                e.stopPropagation();
                hideEnquiryPopup();
                return;
            }
            var openBtn = e.target.closest('#openPopup, #openPopupMobile');
            if (openBtn) {
                e.preventDefault();
                showEnquiryPopup();
            }
        });

        var popupForm2 = document.getElementById('popupForm');
        if (popupForm2) {
            popupForm2.addEventListener('click', function (e) {
                if (e.target === popupForm2) hideEnquiryPopup();
            });
        }
    })();
</script>
<script>
    const openEnquiryBtn = document.getElementById('ctaEnquireBtn');
    const closeEnquiryBtn = document.getElementById('customCloseBtn');
    const enquiryPopup = document.getElementById('customEnquiryPopup');

    if (openEnquiryBtn && closeEnquiryBtn && enquiryPopup) {
        openEnquiryBtn.addEventListener('click', (e) => {
            e.preventDefault();
            enquiryPopup.classList.remove('hidden');
        });

        closeEnquiryBtn.addEventListener('click', () => {
            enquiryPopup.classList.add('hidden');
        });

        enquiryPopup.addEventListener('click', (e) => {
            if (e.target === enquiryPopup) {
                enquiryPopup.classList.add('hidden');
            }
        });
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggles = document.querySelectorAll('input[type="checkbox"]');

        toggles.forEach((toggle) => {
            toggle.addEventListener('change', function() {
                if (this.checked) {
                    toggles.forEach((otherToggle) => {
                        if (otherToggle !== this) {
                            otherToggle.checked = false;
                        }
                    });
                }
            });
        });
    });
</script>

<!-- <script>
    document.getElementById("openPopup").addEventListener("click", function(e) {
        e.preventDefault();
        document.getElementById("popupForm").classList.remove("hidden");
    });
    document.getElementById("closePopup").addEventListener("click", function() {
        document.getElementById("popupForm").classList.add("hidden");
    });
    function closePopup() {
        document.getElementById("popupForm").classList.add("hidden");
    }
</script> -->
 

<script>
    <?php include __DIR__ . '/form-proxy-client.php'; ?>
    const BASE_URL = "<?= rtrim(((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . rtrim(site_base_url(), '/'), '/') ?>";
    const popupForm = document.getElementById("popupForm");
    const sessionSelect = document.getElementById("esession");
    const gradeSelect = document.getElementById("egrade");
    const citySelect = document.getElementById("ecity");
    const openPopupBtn = document.getElementById("openPopup");
    const closePopupBtn = document.getElementById("closePopup");
    
    let apiLoaded = false;

    function openPopup() {
        if (!popupForm) return;
        popupForm.classList.remove("hidden");

        if (!apiLoaded) {
            if (sessionSelect) {
                fetch(`${BASE_URL}/includes/session-api.php`)
                    .then(res => res.text())
                    .then(html => sessionSelect.innerHTML = html)
                    .catch(err => console.error("Session API error", err));
            }

            if (gradeSelect) {
                fetch(`${BASE_URL}/includes/grade-api.php`)
                    .then(res => res.text())
                    .then(html => gradeSelect.innerHTML = html)
                    .catch(err => console.error("Grade API error", err));
            }

            if (citySelect) {
                fetch(`${BASE_URL}/includes/get-city.php`)
                    .then(res => res.text())
                    .then(html => citySelect.innerHTML = html)
                    .catch(err => console.error("City API error", err));
            }

            apiLoaded = true;
        }
    }

    function closePopup() {
        if (!popupForm) return;
        popupForm.classList.add("hidden");
    }

    window.openPopup = openPopup;
    window.closePopup = closePopup;

    if (openPopupBtn) {
        openPopupBtn.addEventListener("click", function(e) {
            e.preventDefault();
            openPopup();
        });
    }

    if (closePopupBtn) {
        closePopupBtn.addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();
            closePopup();
        });
    }

    (function() {
        function getParam(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }
        // Capture initial source: UTM > referrer
        var source = getParam("utm_source") || document.referrer || "";
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
            // } 
            // else if (!getParam("utm_source")) {
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
    
    const studentError = document.getElementById("student-error");
    const parentError = document.getElementById("parent-error");
    const mobileError = document.getElementById("mobile-error");
    const emailError = document.getElementById("email-error");
    const pincodeError = document.getElementById("pincode-error");
    const enquiryForm = document.getElementById("enquiryForm");
    const submitBtn = document.getElementById("submitBtn");

    const inputBindings = [
        { id: "estudent_name", handler: function() {
            if (studentError) studentError.classList.toggle("hidden", !this.value || nameRegex.test(this.value));
        }},
        { id: "eparent_name", handler: function() {
            if (parentError) parentError.classList.toggle("hidden", !this.value || nameRegex.test(this.value));
        }},
        { id: "emobile", handler: function() {
            this.value = this.value.replace(/\D/g, '').slice(0, 10);
            if (mobileError) mobileError.classList.toggle("hidden", !this.value || mobileRegex.test(this.value));
        }},
        { id: "eemail", handler: function() {
            this.value = this.value.toLowerCase();
            if (emailError) emailError.classList.toggle("hidden", !this.value || emailRegex.test(this.value));
        }},
        { id: "epincode", handler: function() {
            this.value = this.value.replace(/\D/g, '').slice(0, 6);
            if (pincodeError) pincodeError.classList.toggle("hidden", !this.value || pincodeRegex.test(this.value));
        }}
    ];

    inputBindings.forEach(binding => {
        const input = document.getElementById(binding.id);
        if (input) {
            input.addEventListener("input", binding.handler);
        }
    });

    if (enquiryForm) {
        enquiryForm.addEventListener("submit", function(e) {
            e.preventDefault();

            const egradeEl = document.getElementById("egrade");
            const estudentEl = document.getElementById("estudent_name");
            const eparentEl = document.getElementById("eparent_name");
            const emobileEl = document.getElementById("emobile");
            const eemailEl = document.getElementById("eemail");
            const ecityEl = document.getElementById("ecity");
            const epincodeEl = document.getElementById("epincode");
            const esessionEl = document.getElementById("esession");

            const egrade = egradeEl ? egradeEl.value.trim() : "";
            const estudent_name = estudentEl ? estudentEl.value.trim() : "";
            const eparent_name = eparentEl ? eparentEl.value.trim() : "";
            const emobile = emobileEl ? emobileEl.value.trim() : "";
            const eemail = eemailEl ? eemailEl.value.trim() : "";
            const ecity = ecityEl ? ecityEl.value.trim() : "";
            const epincode = epincodeEl ? epincodeEl.value.trim() : "";
            const esession = esessionEl ? esessionEl.value.trim() : "";
            const source = sessionStorage.getItem("leadSource") || "Website";

            let isValid = true;
            if (!nameRegex.test(estudent_name) && studentError) {
                studentError.textContent = "Only letters and spaces allowed.";
                isValid = false;
            }
            if (!nameRegex.test(eparent_name) && parentError) {
                parentError.textContent = "Only letters and spaces allowed.";
                isValid = false;
            }
            if (!mobileRegex.test(emobile) && mobileError) {
                mobileError.classList.remove("hidden");
                isValid = false;
            }
            if (!emailRegex.test(eemail) && emailError) {
                emailError.classList.remove("hidden");
                isValid = false;
            }
            if (!pincodeRegex.test(epincode) && pincodeError) {
                pincodeError.classList.remove("hidden");
                isValid = false;
            }
            if (!egrade && classError) {
                classError.classList.remove("hidden");
                isValid = false;
            }
            if (!ecity) {
                const cityError = document.getElementById("city-error");
                if (cityError) cityError.classList.remove("hidden");
                isValid = false;
            }
            if (!esession) {
                isValid = false;
            }
            if (!isValid) return;
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.textContent = "Submitting...";
            }

            const payload = {
                session: esession,
                grade: egrade,
                studentName: estudent_name,
                parentName: eparent_name,
                mobile: emobile,
                email: eemail,
                city: ecity,
                pincode: epincode,
                source: source,
                source_type: "Website",
            };

            fetch(`${BASE_URL}/proxy/admission-proxy`, {
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
                    const successPopup = document.getElementById("esuccessPopup");
                    if (successPopup) {
                        successPopup.classList.remove("hidden");
                    }

                    closePopup();

                    if (successPopup) {
                        setTimeout(() => {
                            successPopup.classList.add("hidden");
                        }, 20000);
                    }

                    if (enquiryForm) {
                        enquiryForm.reset();
                    }
                    sessionStorage.removeItem("leadSource");

                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.textContent = "Submit";
                    }
                })
                .catch(error => {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.textContent = "Submit";
                    }
                    console.error(error);
                });
        });
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Find all custom selects
        document.querySelectorAll(".customSelect").forEach(wrapper => {
            const realSelect = wrapper.querySelector("select");
            const display = wrapper.querySelector(".selected-text");
            const dropdown = wrapper.querySelector("div.absolute");
            const searchInput = dropdown.querySelector("input");
            const optionsList = dropdown.querySelector("ul");

            // Load options into custom dropdown
            function loadOptions(filter = "") {
                optionsList.innerHTML = "";
                Array.from(realSelect.options).forEach(opt => {
                    if (opt.value && opt.text.toLowerCase().includes(filter.toLowerCase())) {
                        let li = document.createElement("li");
                        li.textContent = opt.text;
                        li.className = "p-2 hover:bg-gray-100 cursor-pointer";
                        li.dataset.value = opt.value;
                        optionsList.appendChild(li);
                    }
                });
            }

            // Show dropdown
            display.parentElement.addEventListener("click", () => {
                dropdown.classList.toggle("hidden");
                searchInput.value = "";
                loadOptions();
                searchInput.focus();
            });

            // Filter on search
            searchInput.addEventListener("input", () => {
                loadOptions(searchInput.value);
            });

            // Select option
            optionsList.addEventListener("click", (e) => {
                if (e.target.tagName === "LI") {
                    const value = e.target.dataset.value;
                    const text = e.target.textContent;
                    realSelect.value = value; // Set value in real select
                    display.textContent = text;
                    dropdown.classList.add("hidden");
                }
            });

            // Click outside to close
            document.addEventListener("click", (e) => {
                if (!wrapper.contains(e.target)) {
                    dropdown.classList.add("hidden");
                }
            });
        });
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const popup = document.getElementById("popupForm");

    if (!popup) return;

    function forceResetForm() {

        const form = popup.querySelector("#enquiryForm");
        if (!form) return;

        // Reset form
        form.reset();

        // Clear inputs
        form.querySelectorAll("input").forEach(input => {
            if (input.type === "checkbox") {
                input.checked = false;
            } else if (input.type !== "hidden") {
                input.value = "";
            }
        });

        // Reset selects
        form.querySelectorAll("select").forEach(select => {
            select.selectedIndex = 0;
        });

        // Reset custom city dropdown
        const cityText = popup.querySelector(".selected-text");
        if (cityText) {
            cityText.textContent = "Select City";
        }

        // Hide validation errors
        popup.querySelectorAll("span.text-red-500").forEach(el => {
            el.classList.add("hidden");
        });

        // 🔥 Reset Submit Button
        const submitBtn = form.querySelector('button[type="submit"], input[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.innerText = "Submit"; // change if your default text is different
        }
    }

    const observer = new MutationObserver(() => {
        if (popup.classList.contains("hidden")) {
            setTimeout(forceResetForm, 150);
        }
    });

    observer.observe(popup, {
        attributes: true,
        attributeFilter: ["class"]
    });

});
</script>

<script>
(function(){

function rebindFormSafely() {

    const popup = document.getElementById("popupForm");
    const form = document.getElementById("enquiryForm");

    if (!popup || !form) return;

    const estudent = document.getElementById("estudent_name");
    const eparent = document.getElementById("eparent_name");
    const emobile = document.getElementById("emobile");
    const eemail = document.getElementById("eemail");
    const epincode = document.getElementById("epincode");

    if (!estudent || estudent.dataset.bound) return;

    const studentError = document.getElementById("student-error");
    const parentError = document.getElementById("parent-error");
    const mobileError = document.getElementById("mobile-error");
    const emailError = document.getElementById("email-error");
    const pincodeError = document.getElementById("pincode-error");

    const nameRegex = /^[A-Za-z\s]+$/;
    const mobileRegex = /^[6-9]\d{9}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const pincodeRegex = /^[1-9][0-9]{5}$/;

    estudent.addEventListener("input", function() {
        studentError.classList.toggle("hidden", !this.value || nameRegex.test(this.value));
    });

    eparent.addEventListener("input", function() {
        parentError.classList.toggle("hidden", !this.value || nameRegex.test(this.value));
    });

    emobile.addEventListener("input", function() {
        this.value = this.value.replace(/\D/g,'').slice(0,10);
        mobileError.classList.toggle("hidden", !this.value || mobileRegex.test(this.value));
    });

    eemail.addEventListener("input", function() {
        this.value = this.value.toLowerCase();
        emailError.classList.toggle("hidden", !this.value || emailRegex.test(this.value));
    });

    epincode.addEventListener("input", function() {
        this.value = this.value.replace(/\D/g,'').slice(0,6);
        pincodeError.classList.toggle("hidden", !this.value || pincodeRegex.test(this.value));
    });

    // Mark as bound so we don't double-bind
    estudent.dataset.bound = "true";

}

function watchPopup() {

    const popup = document.getElementById("popupForm");
    if (!popup) return;

    const observer = new MutationObserver(() => {

        if (!popup.classList.contains("hidden")) {

            setTimeout(() => {
                rebindFormSafely();
            }, 200);

        }

    });

    observer.observe(popup, {
        attributes: true,
        attributeFilter: ['class']
    });

}

document.addEventListener("DOMContentLoaded", watchPopup);

})();
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.dps-menu-toggle').forEach(function (toggle) {
        toggle.addEventListener('click', function (e) {
            e.preventDefault();
            const submenu = this.nextElementSibling;
            if (submenu && submenu.classList.contains('dps-menu-open')) {
                submenu.classList.toggle('hidden-menu');
            }
        });
    });
});
</script>