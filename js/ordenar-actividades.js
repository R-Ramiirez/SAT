let ordenColumna = 'fecha';
let ordenAscendente = false;

function ordenarTabla(columna) {
    const tabla = document.querySelector(".table_id");
    const filas = Array.from(tabla.rows).slice(1); // Excluye la fila de encabezado

    if (columna === ordenColumna) {
        ordenAscendente = !ordenAscendente;
    } else {
        ordenAscendente = true;
        ordenColumna = columna;
    }

    filas.sort((a, b) => {
        let valorA, valorB;
        const indiceColumna = ['id_actividades', 'actividad', 'descripcion', 'fecha'].indexOf(columna);

        valorA = a.cells[indiceColumna].textContent.trim();
        valorB = b.cells[indiceColumna].textContent.trim();

        if (columna === 'id_actividades') {
            return ordenAscendente ? 
                parseInt(valorA) - parseInt(valorB) : 
                parseInt(valorB) - parseInt(valorA);
        } else if (columna === 'fecha') {
            // Convertir dd-mm-yyyy a yyyy-mm-dd para comparación correcta
            const fechaA = valorA.split('-').reverse().join('-');
            const fechaB = valorB.split('-').reverse().join('-');
            return ordenAscendente ? 
                new Date(fechaA) - new Date(fechaB) :
                new Date(fechaB) - new Date(fechaA);
        } else {
            return ordenAscendente ? 
                valorA.localeCompare(valorB) : 
                valorB.localeCompare(valorA);
        }
    });

    filas.forEach(fila => tabla.appendChild(fila));
    actualizarIndicadoresOrden();
}

function actualizarIndicadoresOrden() {
    const encabezados = document.querySelectorAll('.table_id th');
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
    const encabezados = document.querySelectorAll('.table_id th[data-sort]');
    encabezados.forEach(th => {
        th.addEventListener("click", function() {
            ordenarTabla(this.getAttribute('data-sort'));
        });
    });

    // Ordenar inicialmente por fecha en orden descendente (más reciente primero)
    ordenarTabla('fecha');
});