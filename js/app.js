document.addEventListener("DOMContentLoaded", function() {
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

    toggleSiretField();

    document.getElementById("role").addEventListener("change", toggleSiretField);
});
