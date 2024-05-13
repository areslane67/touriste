document.addEventListener("DOMContentLoaded", function() {
    // Fonction pour gérer l'affichage du champ Siret en fonction de la catégorie sélectionnée
    function toggleSiretField() {
        let role = document.getElementById("role").value;
        let siretLabel = document.getElementById("labelSiret");
        let siretField = document.getElementById("siret");

        if (role === "prestataire") {
            siretLabel.style.display = "block";
            siretField.style.display = "block";
        } else {
            siretLabel.style.display = "none";
            siretField.style.display = "none";
        }
    }

    // Appeler toggleSiretField() lors du chargement de la page pour gérer l'affichage initial du champ Siret
    toggleSiretField();

    // Attacher un événement de changement au sélecteur de rôle pour gérer l'affichage du champ Siret en fonction de la catégorie sélectionnée
    document.getElementById("role").addEventListener("change", toggleSiretField);
});
