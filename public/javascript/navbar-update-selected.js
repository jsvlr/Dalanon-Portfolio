document.addEventListener("DOMContentLoaded", () => {
    const navbarItems = document.querySelectorAll(".nav-item");
    navbarItems.forEach((item) =>
        item.addEventListener("click", (ev) => {
            navbarItems.forEach((item) => {
                const link = item.querySelector(".nav-link");
                link.classList.remove("active");
                link.removeAttribute("aria-current");
            });
            const activeLink = item.querySelector(".nav-link");
            if (activeLink) {
                activeLink.classList.add("active");
                activeLink.setAttribute("aria-current", "page");
            }
        }),
    );
});
