
function Mensaje_Guardado_ok() {
    Swal.fire(
        'Datos Guardados',
        'El usuario se guardo correctamente',
        'success'
    )
}

function Mensaje_Actulizado_ok() {
    Swal.fire(
        'Datos Actualizados',
        'El usuario se Actualizo correctamente',
        'success'
    )
}

function Mensaje_Error(mensaje1,mensaje2) {
    Swal.fire(
        mensaje1,
        mensaje2,
        'error'
    )
}

function Mensaje_Ok(mensaje1,mensaje2) {
    Swal.fire(
        mensaje1,
        mensaje2,
        'success'
    )
}
