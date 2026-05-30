<div id="esuccessPopup" class="relative fixed bg-green-500 text-white px-4 py-2 rounded mb-5 hidden" style="z-index:9999; position: fixed; right: 0; top: 20%;">
    Form submitted successfully!
</div>
<div class="fixed right-0 top-1/2 -translate-y-1/2 pointer-events-none z-[9999] transform rotate-90 right-[-50px] mobileEnquiry">
    <a href="#" id="openPopupMobile" class="text-gray-500 border-[1px] border-white bg-blue-main px-5 py-2 text-lg origin-right pointer-events-auto no-underline text-white transition">
        Enquire Now
    </a>
</div>

<div id="popupForm" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-[9998]">
    <div class="bg-white p-6 rounded-2xl shadow-2xl w-full max-w-md relative">
        <button type="button" id="closePopup" aria-label="Close enquiry form" onclick="if(window.closePopup){window.closePopup();} return false;" class="absolute top-3 right-3 text-gray-500 hover:text-red-500 text-xl font-bold z-10">&times;</button>
        <h2 class="text-2xl font-semibold mb-4">Enquiry Form</h2>
        <form class="space-y-4" id="enquiryForm" action="" method="POST">
            <div>
                <select name="session" required id="esession" class="w-full border border-gray-300 p-2 rounded-md text-gray-500">
                    <option value="" disabled selected>Enquiry For Session</option>
                    <?php
                    $sessions = include __DIR__ . '/session-api.php';
                    if (is_array($sessions)):
                    foreach ($sessions as $item):
                    ?>
                        <option value="<?= htmlspecialchars($item['session'] ?? '') ?>">
                            <?= htmlspecialchars($item['session'] ?? 'Unknown Session') ?>
                        </option>
                    <?php endforeach; endif; ?>
                </select>
            </div>
            <div>
                <select name="class-selection" required id="egrade" class="w-full border border-gray-300 p-2 rounded-md text-gray-500">
                    <option value="" disabled selected>Select Grade</option>
                    <?php
                    $grades = include __DIR__ . '/grade-api.php';
                    if (is_array($grades) && !empty($grades)) {
                        foreach ($grades as $g) {
                            $grade = trim((string) ($g['grades'] ?? $g['name'] ?? ''));
                            if ($grade === '') {
                                continue;
                            }
                    ?>
                            <option value="<?= htmlspecialchars($grade, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($grade, ENT_QUOTES, 'UTF-8') ?></option>
                    <?php
                        }
                    } else {
                        echo '<option value="">No grades available</option>';
                    }
                    ?>
                </select>
                <span id="classError" class="text-red-500 text-sm hidden">Please select a class.</span>
            </div>
            <div>
                <input type="text" name="student-name" id="estudent_name" placeholder="Student Name" class="w-full border border-gray-300 p-2 rounded-md" required maxlength="50">
                <span id="student-error" class="text-red-500 text-sm mt-1 hidden">Only letters and spaces allowed.</span>
            </div>
            <div>
                <input type="text" name="parent-name" id="eparent_name" placeholder="Parents Name" class="w-full border border-gray-300 p-2 rounded-md" required maxlength="50">
                <span id="parent-error" class="text-red-500 text-sm mt-1 hidden">Only letters and spaces allowed.</span>
            </div>
            <div>
                <input type="text" name="mobile" id="emobile" placeholder="Mobile No." class="w-full border border-gray-300 p-2 rounded-md" required maxlength="10">
                <span id="mobile-error" class="text-red-500 text-sm mt-1 hidden">Please enter valid phone number</span>
            </div>
            <div>
                <input type="text" name="email" id="eemail" placeholder="E-mail" class="w-full border border-gray-300 p-2 rounded-md" required>
                <span id="email-error" class="text-red-500 text-sm mt-1 hidden">Please enter a valid email address.</span>
            </div>
            <div class="mt-4 relative customSelect">
                <select id="ecity" name="ecity" class="hidden">
                    <option value="">Select City</option>
                    <?php
                    $cities = include __DIR__ . '/get-city.php';
                    if (is_array($cities) && !empty($cities)):
                        foreach ($cities as $city):
                            if (empty($city['name'])) {
                                continue;
                            }
                    ?>
                            <option value="<?= htmlspecialchars($city['name'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($city['name'], ENT_QUOTES, 'UTF-8') ?></option>
                    <?php
                        endforeach;
                    else:
                    ?>
                        <option value="">No cities available</option>
                    <?php endif; ?>
                </select>
                <div class="border border-gray-300 p-[11px] rounded-md bg-white cursor-pointer flex justify-between items-center">
                    <span class="selected-text text-[#808080cc]">Select City</span>
                    <span>▼</span>
                </div>
                <div class="absolute mt-1 border border-gray-300 rounded-md bg-white shadow-md hidden z-50 w-full">
                    <input type="text" placeholder="Search..." class="w-full p-2 border-b border-gray-300 outline-none">
                    <ul class="max-h-48 overflow-y-auto"></ul>
                </div>
            </div>
            <span id="city-error" class="text-red-500 text-sm mt-1 hidden">Please select a city.</span>
            <div>
                <input type="text" name="pincode" id="epincode" placeholder="Enter your Pincode" class="w-full border border-gray-300 p-2 rounded-md" maxlength="6" oninput="this.value=this.value.replace(/\D/g,'')" required>
                <span id="pincode-error" class="text-red-500 text-sm hidden">Please enter a valid Pincode.</span>
            </div>
            <div class="flex items-start gap-2">
                <input type="checkbox" id="popupCheckbox" required />
                <label for="popupCheckbox" class="text-sm">I agree to <a href="termsandconditions" class="text-blue-600 underline">Terms and Conditions</a>.</label>
                <span id="checkboxError" class="text-red-500 text-sm hidden">You must agree to the terms and conditions.</span>
            </div>
            <input type="hidden" id="source" value="">
            <button type="submit" id="submitBtn" class="w-full py-2 bg-blue-main text-white rounded-md hover:bg-red-500 transition">Submit</button>
        </form>
    </div>
</div>
