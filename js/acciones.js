$(document).ready(function () {
    $(document).on('click', '.edit', function () {
        var id = $(this).val();
        var nombre = $('#rut' + id).text();
        var precio = $('#nombre' + id).text();
        var imagen = $('#carrera' + id).text();
        var imagen = $('#telefono' + id).text();
        var imagen = $('#fecha' + id).text();
        var imagen = $('#rol' + id).text();


    });

    $(document).on('click', '.delete', function () {
        var id = $(this).val();
        var folio = $('#id_producto' + id).text();
        var name = $('#nombre' + id).text();

        $('#id_producto').val(folio);
        document.getElementById('name_product').innerHTML = name;
        $('#delete').modal('show');

    });

});

// Actualizar la imagen en la edicion
function updateimage() {
    const $seleccionArchivos = document.querySelector("#imagen"),
        $imagenPrevisualizacion = document.querySelector("#img");

    // Escuchar cuando cambie
    $seleccionArchivos.addEventListener("change", () => {
        // Los archivos seleccionados, pueden ser muchos o uno
        const archivos = $seleccionArchivos.files;
        // Si no hay archivos salimos de la función y quitamos la imagen
        if (!archivos || !archivos.length) {
            $imagenPrevisualizacion.src = "";
            return;
        }
        // Ahora tomamos el primer archivo, el cual vamos a previsualizar
        const primerArchivo = archivos[0];
        // Lo convertimos a un objeto de tipo objectURL
        const objectURL = URL.createObjectURL(primerArchivo);
        // Y a la fuente de la imagen le ponemos el objectURL
        $imagenPrevisualizacion.src = objectURL;
    });

    function enviar(event){
        event.preventDefault();
    }
    
    function setProgress(){
        var valor_obtenido = document.getElementById('inputText22').value;
        var bar1 = document.getElementById('bar1');
        var width = 0;
    
        if(valor_obtenido >= 0 && valor_obtenido <= 15){
            bar1.className = "progress-bar progress-bar-striped";
            bar1.style.width = "15%";
        }else if(valor_obtenido >= 16 && valor_obtenido <= 40){
            bar1.className = "progress-bar progress-bar-striped bg-success";
            bar1.style.width = "40%";
        }else if(valor_obtenido >= 41 && valor_obtenido <= 60){
            bar1.className = "progress-bar progress-bar-striped bg-warning";
            bar1.style.width = "60%";
        }else if(valor_obtenido >= 61 && valor_obtenido <= 100){
            bar1.className = "progress-bar progress-bar-striped bg-danger"
            bar1.style.width = "100%";
        }
    }
}

