document.addEventListener("DOMContentLoaded",e=>{
    document.querySelectorAll("section[data-uid]").forEach(e => {
        e.addEventListener("click", ev => {
            let uid = e.getAttribute("data-uid");
            window.location.href = `gesmodifprestation.php?id-presta=${uid}`;
        });
    });
})