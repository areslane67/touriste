document.addEventListener("DOMContentLoaded", function() {
    // Fonction toggleMenu appelée lorsque le DOM est chargé
    function toggleMenu() {
        var menu = document.getElementById("menu");
        menu.classList.toggle("active");

        // Ajouter la classe active à l'élément menu-burger également
        var burger = document.querySelector(".burger-menu");
        burger.classList.toggle("active");
    }

    // Attacher l'événement de clic au burger pour appeler toggleMenu()
    var burger = document.querySelector(".burger-menu");
    burger.addEventListener("click", toggleMenu);
});
