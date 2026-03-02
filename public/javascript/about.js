document.addEventListener("DOMContentLoaded", () => {
    const imgElem = document.querySelector("#about-background-image");
    const imgInput = document.querySelector("#image-input");

    imgInput.addEventListener("change", function () {
        const file = this.files[0];
        const reader = new FileReader();
        reader.onload = function (e) {
            imgElem.src = e.target.result;
        };
        reader.readAsDataURL(file);
    });
});
