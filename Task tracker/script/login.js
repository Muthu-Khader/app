"use strict";

const adminEl = document.querySelector(".admin");
const btnDarkEl = document.querySelector(".btn--dark");
const adminHeadingEl = document.querySelector(".primary-heading--grey");
const employeeHeadingEl = document.querySelector(".primary-heading--white");
const signInTextEl = document.querySelector(".employee-signin--text");
const formEl = document.querySelector("form");
const showEl = document.querySelector(".show");
const emailEl = document.querySelector("#email");
const passwordEl = document.querySelector(".password");

btnDarkEl.addEventListener("click", function () {
  const tempHead = employeeHeadingEl.textContent;

  // Resetting Input Content
  emailEl.value = "";
  passwordEl.value = "";

  if (adminEl.classList.contains("slide-in")) {
    adminEl.classList.remove("slide-in");
    // Swapping headings
    employeeHeadingEl.textContent = adminHeadingEl.textContent;
    adminHeadingEl.textContent = tempHead;

    // changing texts
    signInTextEl.textContent =
      "Please log in to access details about your assigned tasks.";
    signInTextEl.style.textAlign = "left";

    // Changing action file
    formEl.setAttribute("action", "backend/admin.php");
  } else {
    adminEl.classList.add("slide-in");

    // Swapping headings
    employeeHeadingEl.textContent = adminHeadingEl.textContent;
    adminHeadingEl.textContent = tempHead;

    // Changing texts
    signInTextEl.textContent = "Please log in to assign tasks to employees.";
    signInTextEl.style.textAlign = "center";

    // Changing action file
    formEl.setAttribute("action", "backend/employee.php");
  }
});

showEl.addEventListener("click", function () {
  if (passwordEl.type === "password") {
    passwordEl.type = "text";
  } else {
    passwordEl.type = "password";
  }
});
