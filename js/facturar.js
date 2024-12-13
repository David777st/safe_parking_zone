document.getElementById('enviar').addEventListener('click', function() {
    console.log("recargo");
    setTimeout(function() {
        location.reload(); // Recarga la página actual
    }, 1000);
    
});