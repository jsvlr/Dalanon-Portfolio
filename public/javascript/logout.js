const logoutForm = document.querySelector(`#logout-form`);

if (logoutForm != null) {
    logoutForm.addEventListener("submit", (ev) => {
        ev.preventDefault();

        if (confirm("Do you want to logout?")) {
            logoutForm.submit();
        }
    });
}
