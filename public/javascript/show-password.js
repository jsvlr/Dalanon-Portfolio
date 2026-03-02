const showPasswordChkBox = document.querySelector("#show-password-chkbox");
const showPasswordToggler = document.querySelector("#show-password-toggler");
const passwordInput = document.querySelector("input[id='password-input']");
let hideIcon = `<i class="fa-solid fa-eye-slash opacity-50" ></i>`;
let showIcon = `<i class="fa-solid fa-eye opacity-50"></i>`;
let show = false;

if (showPasswordChkBox != null) {
    showPasswordChkBox.addEventListener("input", () => {
        show = !show;
        passwordInput.type = show ? "text" : "password";
        showPasswordToggler.innerHTML = !show ? showIcon : hideIcon;
    });
}
if (showPasswordToggler != null) {
    showPasswordToggler.addEventListener("mousedown", () => {
        showPasswordToggler.innerHTML = hideIcon;
        passwordInput.type = "text";
        show = true;
    });

    showPasswordToggler.addEventListener("mouseup", () => {
        showPasswordToggler.innerHTML = showIcon;
        passwordInput.type = "password";
        show = false;
        showPasswordChkBox.checked = false;
    });
}
