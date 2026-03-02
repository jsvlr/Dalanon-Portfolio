const needsConfirmations = document.querySelectorAll(".needs-confirmation");

needsConfirmations.forEach((form) =>
    form.addEventListener("submit", (ev) => {
        const confirmationMessage = form.getAttribute(
            "data-confirmation-message",
        );
        ev.preventDefault();
        if (
            confirm(
                confirmationMessage == null
                    ? "Do yo want delete this record?"
                    : confirmationMessage,
            )
        ) {
            form.submit();
        }
    }),
);
