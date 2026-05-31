// ------Auth Forms------
const signUpButton = document.getElementById("signUpButton");
const signInButton = document.getElementById("signInButton");
const signUpForm = document.getElementById("signup");
const signInForm = document.getElementById("sigIn");

if (signUpButton && signInButton && signUpForm && signInForm) {
  signUpButton.addEventListener("click", function (e) {
    e.preventDefault();
    signInForm.style.display = "none";
    signUpForm.style.display = "block";
  });

  signInButton.addEventListener("click", function (e) {
    e.preventDefault();
    signUpForm.style.display = "none";
    signInForm.style.display = "block";
  });
}

// ------Menu & Navigation------
function closeMenus() {
  document.querySelector(".navbar")?.classList.remove("active");
  document.querySelectorAll(".dropdown-menu").forEach((menu) => menu.classList.remove("active"));
  document.body.classList.remove("menu-open");
}

function toggleMenu(event) {
  if (event) event.stopPropagation();
  const dropdown = document.querySelector(".dropdown-menu");
  const navbar = document.querySelector(".navbar");

  if (window.innerWidth <= 1200) {
    navbar?.classList.toggle("active");
    document.querySelectorAll(".dropdown-menu").forEach((menu) => menu.classList.remove("active"));
    document.body.classList.toggle("menu-open", navbar?.classList.contains("active"));
  } else {
    dropdown?.classList.toggle("active");
    document.body.classList.remove("menu-open");
  }
}

document.querySelectorAll(".navbar a, .dropdown-menu a").forEach((link) => {
  link.addEventListener("click", () => closeMenus());
});

// ------Event Listeners------
window.addEventListener("click", function (event) {
  const nav = document.querySelector(".nav");
  if (nav && !nav.contains(event.target)) closeMenus();
});

window.addEventListener("resize", closeMenus);

window.addEventListener("scroll", function () {
  const header = document.querySelector(".nav");
  if (header) header.classList.toggle("sticky", window.scrollY > 0);
});

document.addEventListener("keydown", function (event) {
  if (event.key === "Escape") closeMenus();
});