const editModal = document.getElementById('editModal');
editModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-id');
    const tipo = button.getAttribute('data-tipo');
    const licensePlate = button.getAttribute('data-license_plate');
    const spaceReserved = button.getAttribute('data-space_reserved');
    const fecha = button.getAttribute('data-fecha');
    const fechaSalida = button.getAttribute('data-fecha_salida');

    // Pasar datos al modal
    editModal.querySelector('#modal-id').value = id;
    editModal.querySelector('#modal-tipo').value = tipo;
    editModal.querySelector('#modal-license_plate').value = licensePlate;
    editModal.querySelector('#modal-space_reserved').value = spaceReserved;
    editModal.querySelector('#modal-fecha').value = fecha;
    editModal.querySelector('#modal-fecha_salida').value = fechaSalida;
});


const editModal2 = document.getElementById('editModal2');
editModal2.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-id');
    const cedula = button.getAttribute('data-cedula');
    const nombre = button.getAttribute('data-nombre');
    const contrasena = button.getAttribute('data-contrasena');
    const rol = button.getAttribute('data-rol');
    const telefono = button.getAttribute('data-telefono');
    const email = button.getAttribute('data-email');

    // Pasar datos al modal
    editModal2.querySelector('#modal-id').value = id;
    editModal2.querySelector('#modal-cedula').value = cedula;
    editModal2.querySelector('#modal-nombre').value = nombre;
    editModal2.querySelector('#modal-contrasena').value = contrasena;
    editModal2.querySelector('#modal-rol').value = rol;
    editModal2.querySelector('#modal-telefono').value = telefono;
    editModal2.querySelector('#modal-email').value = email;
});
