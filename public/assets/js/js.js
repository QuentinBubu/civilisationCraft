/*
let hauteur = document.getElementById("profil_top_bar").offsetHeight;
document.getElementById("profil_top_bar").style.width = hauteur + "px";
*/
const mobileMenu = document.getElementById("phoneMenu");
const menu = document.querySelector("header>nav");

mobileMenu.addEventListener("click", function() {
    if (window.getComputedStyle(menu, null).getPropertyValue("display") === "none") {
        menu.style.display = "block";
        menu.style.position = "fixed";
        mobileMenu.style.position = "fixed";
    } else if (window.getComputedStyle(mobileMenu, null).getPropertyValue("display") === "block") {
        menu.style.display = "none";
        menu.style.position = "static";
        mobileMenu.style.position = "static";
    }
}, false);