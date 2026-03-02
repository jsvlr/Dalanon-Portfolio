document.addEventListener("DOMContentLoaded", (ev) => {
    const formsContact = document.querySelectorAll(".form-contact");
    const editFormContactBtn = document.querySelectorAll(".edit-contact");
    const formContactModal = document.querySelector("#edit-contact-modal");

    // formsContact.forEach((form) =>
    //     form.addEventListener("submit", (ev) => {
    //         ev.preventDefault();
    //         if (confirm("Do you want to delete this contact?")) {
    //             form.submit();
    //         }
    //     }),
    // );

    editFormContactBtn.forEach((btn) =>
        btn.addEventListener("click", (ev) => {
            if (formContactModal != null) {
                const btnSubmit = formContactModal.querySelector("#btn-submit");
                btnSubmit.innerHTML = "Saved";
            }
        }),
    );
});
