document.addEventListener("DOMContentLoaded", (ev) => {
    const readMessagebtns = document.querySelectorAll(".read-message-btn");
    const readMessageModal = document.querySelector("#read-message-modal");

    readMessagebtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            const attributeSyntax = "data-message";
            const id = btn.getAttribute(`${attributeSyntax}-id`);
            const fullname = btn.getAttribute(`${attributeSyntax}-fullname`);
            const email = btn.getAttribute(`${attributeSyntax}-email`);
            const message = btn.getAttribute(`${attributeSyntax}-content`);

            readMessageModal.querySelector(`#message-fullname`).textContent =
                fullname;

            readMessageModal.querySelector(`#message-email`).textContent =
                email;

            readMessageModal.querySelector(`#message-content`).textContent =
                message;

            readMessageModal
                .querySelector(`#message-reply-btn`)
                .setAttribute("href", `mailto:${email}`);
        });
    });
});
