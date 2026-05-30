<?php

/**
 * Reusable read-more / read-less toggle for long text blocks.
 * Targets elements with class "facility-text" or "readmore-text".
 */
?>
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".facility-text, .readmore-text").forEach(function (p) {
        var strongTag = p.querySelector("strong");
        var strongText = strongTag ? strongTag.outerHTML : "";
        var fullTextOnly = p.innerText.replace(strongTag ? strongTag.innerText : "", "").trim();
        var fullTextWords = fullTextOnly.split(/\s+/).filter(Boolean);
        var readMoreColor = p.getAttribute("data-readmore-color") || "text-blue-600";

        if (fullTextWords.length <= 12) {
            return;
        }

        var shortText = fullTextWords.slice(0, 12).join(" ") + "...";
        var toggleContainer = document.createElement("div");
        toggleContainer.className = "text-left text-[15px] mt-2 font-[600]";

        var toggleBtn = document.createElement("span");
        toggleBtn.textContent = "Read More...";
        toggleBtn.className = readMoreColor + " cursor-pointer block";

        var expanded = false;

        toggleBtn.addEventListener("click", function () {
            expanded = !expanded;
            if (expanded) {
                p.innerHTML = strongText + " " + fullTextOnly;
                toggleBtn.textContent = "Read Less";
            } else {
                p.innerHTML = strongText + " " + shortText;
                toggleBtn.textContent = "Read More...";
            }
            p.appendChild(toggleContainer);
            toggleContainer.appendChild(toggleBtn);
        });

        p.innerHTML = strongText + " " + shortText;
        toggleContainer.appendChild(toggleBtn);
        p.appendChild(toggleContainer);
    });
});
</script>
