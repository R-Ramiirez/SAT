$(document).ready(function() {
  $('table.table_id').on('click', 'a.btn.btn-success.center', function() {
    var id_actividades = $(this).data('id');
    $('#exampleModal').modal('show');
    $('#id_actividades').val(id_actividades);
  });

  $('#submit-id').click(function() {
    var id = $('#id_actividades').val();
    // Haga algo con el valor del ID, como enviarlo a un script PHP utilizando AJAX
  });
});

// Agregar un controlador de eventos para el clic del botón utilizando jQuery
$("#myButton").click(function() {
  // Obtener el valor del atributo data-id del botón utilizando jQuery
  var id = $(this).data("id");
  // Hacer algo con el valor del ID, como mostrarlo en la consola
  console.log("ID:", id);
});