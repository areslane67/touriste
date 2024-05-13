document.getElementById("btn_supprimer").addEventListener("click", function() {
    if(confirm("Êtes-vous sûr de vouloir supprimer vos donnees ? Cette action est irréversible.")) {
        document.getElementById("form_supprimer").submit();
    }
});
