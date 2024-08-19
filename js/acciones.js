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

const links = document.querySelectorAll('a[data-toggle="modal"]');

links.forEach((link) => {
    link.addEventListener('click', () => {
        const id = link.getAttribute('data-id');
        console.log('Selected ID:', id);
        // Use the ID value for something else...
    });
});

$('#exampleModal').on('show.bs.modal', function (event) {
    // do something when the modal is shown
});

$('#exampleModal').on('hidden.bs.modal', function (event) {
    // do something when the modal is hidden
});