document.addEventListener("DOMContentLoaded", function() {
    function toggleMenu() {
        var menu = document.getElementById("menu");
        menu.classList.toggle("active");

        var burger = document.querySelector(".burger-menu");
        burger.classList.toggle("active");
    }

    var burger = document.querySelector(".burger-menu");
    burger.addEventListener("click", toggleMenu);
});
