$(document).ready(function ()
{
    $("#solicitudes").click(ocultarSolicitudes);
    $("#busquedas").click(ocultarBusquedas);
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

function ocultarBusquedas(event)
{
    $("#lsbusquedas").show();
    $("#busquedas").click(mostrarBusquedas);
    event.preventDefault();
}

function mostrarBusquedas(event)
{
    $("#lsbusquedas").hide();
    $("#busquedas").click(ocultarBusquedas);
    event.preventDefault();
}
