$(document).ready(function ()
{
    $("#solicitudes").click(ocultarSolicitudes);
});

function ocultarSolicitudes(event)
{
    $("#lssolicitudes").show();
    $("#solicitudes").click(mostrarSolicitudes);
    event.preventDefault();
}

function mostrarSolicitudes(event)
{
    $("#lssolicitudes").hide();
    $("#solicitudes").click(ocultarSolicitudes);
    event.preventDefault();
}
