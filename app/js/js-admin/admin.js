// add active class in activated list item
const currentLocation = location.href.split("?");
const navList = document.querySelectorAll(".nav__link");
const navLink = document.querySelectorAll(".nav__link a");
const navLength = navList.length;
for (i = 0; i < navLength; i++) {
  if (navLink[i].href === currentLocation[0]) {
    navList[i].classList.add("hovered");
  }
}

// MenuToggle
let toggle = document.querySelector(".toggle");
let nav = document.querySelector(".nav");
let main = document.querySelector(".main_");

toggle.onclick = function () {
  nav.classList.toggle("active");
  main.classList.toggle("active");
};
