
function correcto(){
    $("#mensajeExito").removeClass("d-none");
    $("#mensajeError").addClass("d-none");
    $("#formulario")[0].reset();
}
function phperror(texto){
    $("#mensajeError").removeClass("d-none");
    $("#mensajeError").html(texto);
}