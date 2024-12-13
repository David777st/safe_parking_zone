// Este script puede ser usado para realizar operaciones relacionadas con el cliente, como cargar las reservas
document.addEventListener('DOMContentLoaded', function() {
    // Supón que tienes un botón para cargar las reservas o realizar alguna acción
    const loadReservationsButton = document.getElementById('loadReservations');
    const reservationsContainer = document.getElementById('reservationsContainer');

    loadReservationsButton.addEventListener('click', function() {
        // Aquí podrías hacer una llamada AJAX para obtener las reservas
        fetch('reservar.php', {
            method: 'GET',  // O POST dependiendo de tu implementación
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Mostrar las reservas en el contenedor
                let reservationsHTML = "<h2>Tus Reservas:</h2><table border='1'><tr><th>Espacio reservado</th><th>Fecha</th><th>Hora</th></tr>";
                data.reservas.forEach(reserva => {
                    reservationsHTML += `<tr>
                                            <td>${reserva.space_reserved}</td>
                                            <td>${reserva.fecha}</td>
                                            <td>${reserva.hora}</td>
                                          </tr>`;
                });
                reservationsHTML += "</table>";
                reservationsContainer.innerHTML = reservationsHTML;
            } else {
                reservationsContainer.innerHTML = "<p>No tienes reservas registradas.</p>";
            }
        })
        .catch(error => {
            console.error('Error al cargar las reservas:', error);
            reservationsContainer.innerHTML = "<p>Error al cargar las reservas.</p>";
        });
    });
});
