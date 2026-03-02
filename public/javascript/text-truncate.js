document.addEventListener("DOMContentLoaded", (ev) => {
    const truncate = document.querySelectorAll(".truncate-text");

    truncate.forEach((t) => (t.textContent = truncateText(t.textContent, 100)));

    function truncateText(text, maxChars) {
        return text.length > maxChars ? text.slice(0, maxChars) + "..." : text;
    }
});
