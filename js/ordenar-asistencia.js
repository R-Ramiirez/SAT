let ordenColumna = 'asistencia';
let ordenAscendente = true;

function ordenarTabla(columna) {
    const tabla = document.getElementById("tablaAsistencia");
    const tbody = tabla.querySelector('tbody');
    const filas = Array.from(tbody.rows);

    console.log("Número de filas antes de ordenar:", filas.length);
    console.log("IDs antes de ordenar:", filas.map(f => f.getAttribute('data-id')));

    if (columna === ordenColumna) {
        ordenAscendente = !ordenAscendente;
    } else {
        ordenAscendente = true;
        ordenColumna = columna;
    }

    filas.sort((a, b) => {
        let valorA, valorB;
        const indiceColumna = ['rut', 'nombre', 'carrera', 'asistencia'].indexOf(columna);

        if (columna === 'asistencia') {
            valorA = a.cells[indiceColumna].innerHTML.includes("square-check") ? 1 : 0;
            valorB = b.cells[indiceColumna].innerHTML.includes("square-check") ? 1 : 0;
        } else {
            valorA = a.cells[indiceColumna].textContent.trim().toLowerCase();
            valorB = b.cells[indiceColumna].textContent.trim().toLowerCase();
        }

        console.log(`Comparando: ${a.getAttribute('data-id')} (${valorA}) con ${b.getAttribute('data-id')} (${valorB})`);

        if (valorA < valorB) return ordenAscendente ? -1 : 1;
        if (valorA > valorB) return ordenAscendente ? 1 : -1;
        return 0;
    });

    // Crear un nuevo tbody y agregar las filas ordenadas
    const nuevoTbody = document.createElement('tbody');
    filas.forEach(fila => nuevoTbody.appendChild(fila));

    // Reemplazar el tbody existente con el nuevo
    tbody.parentNode.replaceChild(nuevoTbody, tbody);

    console.log("Número de filas después de ordenar:", nuevoTbody.rows.length);
    console.log("IDs después de ordenar:", Array.from(nuevoTbody.rows).map(f => f.getAttribute('data-id')));

    actualizarIndicadoresOrden();
}

function actualizarIndicadoresOrden() {
    const encabezados = document.querySelectorAll('#tablaAsistencia th');
    encabezados.forEach(th => {
        const columna = th.getAttribute('data-sort');
        if (columna === ordenColumna) {
            th.textContent = `${th.textContent.split(' ')[0]} ${ordenAscendente ? "▲" : "▼"}`;
        } else {
            th.textContent = th.textContent.split(' ')[0];
        }
    });
}

document.addEventListener("DOMContentLoaded", function() {
    const encabezados = document.querySelectorAll('#tablaAsistencia th');
    encabezados.forEach(th => {
        th.addEventListener("click", function() {
            ordenarTabla(this.getAttribute('data-sort'));
        });
    });

    // Ordenar inicialmente por asistencia
    ordenarTabla('asistencia');
});