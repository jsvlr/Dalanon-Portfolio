document.addEventListener("DOMContentLoaded", () => {
    const forms = document.querySelectorAll(".needs-validation");

    const passwordResetModal = new bootstrap.Modal(
        document.getElementById("passwordResetModal"),
    );

    const sendOTPModal = new bootstrap.Modal(
        document.getElementById("sendOTPModal"),
    );

    const sendOTPBtn = document.getElementById("send-otp-btn");
    const verifyOTPBtn = document.getElementById("verify-otp-btn");

    const email = document.querySelector(`#otp-email-input`);
    const otp = document.querySelector(`#otp-verify-input`);

    const origin = window.location.origin;

    verifyOTPBtn.setAttribute("disabled", "");

    forms.forEach((form) =>
        form.addEventListener(
            "submit",
            (ev) => {
                if (!form.checkValidity()) {
                    ev.preventDefault();
                    ev.stopPropagation();
                }
                form.classList.add("was-validated");
            },
            false,
        ),
    );

    sendOTPBtn.addEventListener("click", async () => {
        try {
            const res = await fetch(`${origin}/api/forgot-password/send-otp`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                },
                body: JSON.stringify({
                    email: email.value,
                }),
            });

            const data = await res.json();

            if (!res.ok) {
                console.error("Validation errors:", data.errors);
                alert(data.message);
                return;
            }

            console.log("Success:", data);
            email.setAttribute("disabled", "");
            sendOTPBtn.setAttribute("disabled", "");

            otp.removeAttribute("disabled");
            verifyOTPBtn.removeAttribute("disabled");
        } catch (err) {
            console.log("Network error:", err);
        }
    });

    verifyOTPBtn.addEventListener("click", async () => {
        try {
            console.log("Sending:", email.value.trim(), otp.value.trim());

            const res = await fetch(
                `${origin}/api/forgot-password/verify-otp`,
                {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                    },
                    body: JSON.stringify({
                        email: email.value.trim(),
                        otp: otp.value.trim(),
                    }),
                },
            );

            const data = await res.json();

            if (!res.ok) {
                console.error("Validation errors:", data.errors);
                alert(data.message);
                return;
            }

            console.log("Success:", data);
            verifyOTPBtn.setAttribute("disabled", "");
            sendOTPModal.hide();
            passwordResetModal.show();
        } catch (err) {
            console.error("Network error:", err);
        }
    });
});
