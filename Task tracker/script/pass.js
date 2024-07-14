"use strict";

const oldPassword = document.getElementById("update-old-password");
const newPassword = document.getElementById("update-new-password");
const confirmPassword = document.getElementById("update-confirm-password");
const power = document.querySelector(".power-point");
const updateFormBtn = document.querySelector(".update-form-btn");
const passMessage = document.querySelector(".message");
const updateForm = document.querySelector(".update-form");
const showPassword = document.querySelector(".eye");
// PASSWORD STRENGTH CHECKER
newPassword.oninput = function () {
  let point = 0;
  let value = newPassword.value;
  let widthPower = ["1%", "25%", "50%", "75%", "100%"];
  let colorPower = ["#D73F40", "#DC6551", "#F2B84F", "#BDE952", "#3ba62F"];

  if (value.length >= 6) {
    let arrayTest = [/[0-9]/, /[a-z]/, /[A-Z]/, /[^0-9a-zA-Z]/];
    arrayTest.forEach((item) => {
      if (item.test(value)) {
        point += 1;
      }
    });
  }
  power.style.width = widthPower[point];
  power.style.backgroundColor = colorPower[point];
};

// SHOW PASSWORD
showPassword.addEventListener("click", function () {
  if (showPassword.name === "eye-outline") {
    showPassword.name = "eye-off-outline";
    showPassword.style.color = "red";

    // password visibility
    oldPassword.type = "text";
    newPassword.type = "text";
    confirmPassword.type = "text";
  } else {
    showPassword.name = "eye-outline";
    showPassword.style.color = "#7fbf00";

    // password visibility
    oldPassword.type = "password";
    newPassword.type = "password";
    confirmPassword.type = "password";
  }
});

//VERIFY PASSWORD
const verifyPassword = function (event) {
  if (confirmPassword.value !== newPassword.value) {
    event.preventDefault();
    passMessage.textContent = "Password doesn't Match :(";
    passMessage.style.color = "red";
  }
};

updateForm.addEventListener("submit", verifyPassword);
