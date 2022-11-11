// This file gets the id of password input and icon and toggles show or hide password when clicked

const showPassword = document.querySelector("#show-password");
const passWordField = document.querySelector("#password");

showPassword.addEventListener("click", function() {

    // switches class of icon when clicked
    this.classList.toggle("fa-eye-slash");

    // Gets attribute of passwordfield, if type is equal to password, switch to text and vice versa
    const type = passWordField.getAttribute("type") === "password" ? "text" : "password";
    passWordField.setAttribute("type", type);

})


