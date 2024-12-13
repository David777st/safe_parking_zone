const parkingLot = document.getElementById('parkingLot');
const selectedSpaceInput = document.getElementById('selectedSpace');

// Generar 50 espacios (A1-G7)
const rows = ['D', 'E', 'F', 'G'];
let spaceCounter = 0;

for (let row of rows) {
    for (let col = 1; col <= 9; col++) {
        if (spaceCounter >= 36) break;

        const space = document.createElement('button');
        space.classList.add('space');
        space.textContent = `${row}${col}`;
        space.setAttribute('name', `${row}${col}`); 
        space.addEventListener('click', () => selectSpace(space));
        parkingLot.appendChild(space);

        spaceCounter++;
    }
}



function selectSpace(space) {
    if (space.classList.contains('reserved')) return;

    const previouslySelected = document.querySelector('.space.selected');
    if (previouslySelected) previouslySelected.classList.remove('selected');

    space.classList.add('selected');
    selectedSpaceInput.value = space.textContent;
}



const vehicleType = document.getElementById('vehicleType');
const rows2 = ['D', 'E', 'F', 'G'];

vehicleType.addEventListener('change', () => {
    const selectedValue = vehicleType.value; // Obtenemos el valor seleccionado

    // Restablecer todos los botones eliminando la clase 'space2'
    for (let row2 of rows2) {
        for (let col2 = 1; col2 <= 9; col2++) {
            let strCovert = row2 + col2;
            let botonSeleccionado = document.getElementsByName(strCovert)[0];

            if (botonSeleccionado) {
                botonSeleccionado.classList.remove('space2');
            }
        }
    }

    // Lógica para 'Carro'
    if (selectedValue === "Carro") {
        for (let row2 of rows2) {
            for (let col2 of [1, 2, 8, 9]) { // Aplica a las columnas 1, 2, 8 y 9
                let strCovert = row2 + col2;
                let botonSeleccionado = document.getElementsByName(strCovert)[0];

                if (botonSeleccionado) {
                    botonSeleccionado.classList.add('space2');
                }
            }
        }
    }

    // Lógica para 'moto'
    if (selectedValue === "moto") {
        for (let row2 of rows2) {
            for (let col2 = 3; col2 <= 7; col2++) { // Aplica a las columnas 3 a 7
                let strCovert = row2 + col2;
                let botonSeleccionado = document.getElementsByName(strCovert)[0];

                if (botonSeleccionado) {
                    botonSeleccionado.classList.add('space2');
                }
            }
        }
    }
});

// Marcar espacios reservados para carros y motos
reservedSpaces.forEach(spaceId => {
    const space = Array.from(document.querySelectorAll('.space')).find(el => el.textContent === spaceId);
    if (space) {
        space.classList.add('reserved');
    }
});