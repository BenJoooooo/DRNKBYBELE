const showPassword = document.querySelector("#show-password");
const showRepeatPassword = document.querySelector("#show-repeat-password");
const passWordField = document.querySelector("#password");
const passWordFieldRepeat = document.querySelector("#repeatPassword");

showPassword.addEventListener("click", function() {

    // switches class of icon when clicked
    this.classList.toggle("fa-eye-slash");

    // Gets attribute of passwordfield, if type is equal to password, switch to text and vice versa
    const type = passWordField.getAttribute("type") === "password" ? "text" : "password";
    passWordField.setAttribute("type", type);

})

showRepeatPassword.addEventListener("click", function() {

    // switches class of icon when clicked
    this.classList.toggle("fa-eye-slash");

    // Gets attribute of passwordfield, if type is equal to password, switch to text and vice versa
    const type = passWordFieldRepeat.getAttribute("type") === "password" ? "text" : "password";
    passWordFieldRepeat.setAttribute("type", type);

})
