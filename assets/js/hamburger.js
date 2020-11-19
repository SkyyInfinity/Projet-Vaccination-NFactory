var hamburger = document.getElementById("hamburger");
var navigation = document.getElementById("nav-links");

hamburger.addEventListener("click", e => {
    navigation.classList.toggle("nav-links")
    navigation.classList.toggle("nav-links-active")
})