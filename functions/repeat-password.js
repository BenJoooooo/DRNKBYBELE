// This file gets the id of repeat password input and icon and toggles show or hide password when clicked

const showRepeatPassword = document.querySelector("#show-repeat-password");
const passWordFieldRepeat = document.querySelector("#repeatPassword");

showRepeatPassword.addEventListener("click", function() {

    // switches class of icon when clicked
    this.classList.toggle("fa-eye-slash");

    // Gets attribute of passwordfield, if type is equal to password, switch to text and vice versa
    const type = passWordFieldRepeat.getAttribute("type") === "password" ? "text" : "password";
    passWordFieldRepeat.setAttribute("type", type);

})