/* global error, Num_personas, validarreservaciones */

//(funcion)(){
var formulario = document.getElementById('formulario'),
        Nombre = formulario.Nombre,
        Telefono = formulario.Telefono,
        Correo = formulario.Correo,
        Fecha_reserva = formulario.Fecha_reserva,
        Numero_personas = formulario.Num_personas,
   
        error = document.getElementById('error');
        function validarNombre(e){
        if (Nombre.value == '' || Nombre == null){
        console.log('Completa el nombre');
                error.style.display = 'block';
                error.innerHTML = error.innerHTML + '<li>Ingresa Un Nombre</li>';
                e.preventDefault();
                } else{
        error.style.display = 'none';
                }
        }

function validarTelefono(e){
if (Telefono.value == '' || Telefono == null){
console.log('Completa el telefono');
        error.style.display = 'block';
        error.innerHTML = error.innerHTML + '<li>Ingresa un telefono</li>';
        e.preventDefault();
        } else{
error.style.display = 'none';
        }
}

function validarCorreo(e){
if (Correo.value == '' || Correo == null){
console.log('Completa el correo');
        error.style.display = 'block';
        error.innerHTML = error.innerHTML + '<li>Ingresa un correo</li>';
        e.preventDefault();
        } else{
error.style.display = 'none';
        }
}

function validarFecha_reserva(e){
if (Fecha_reserva.value == '' || Fecha_reserva== null){
console.log('Completa la fecha de la reserva');
        error.style.display = 'block';
        error.innerHTML = error.innerHTML + '<li>Ingresa una fecha</li>';
        e.preventDefault();
        } else{
error.style.display = 'none';
        }
}
function validarNum_personas(e){
if (Num_personas.value == '' || Num_personas.value == null){
console.log('Selecciona un numero');
        error.style.display = 'block';
        error.innerHTML = error.innerHTML + '<li>Selecciona un numero</li>';
        e.preventDefault();
} else{
error.style.display = 'none';
        }
}


function validarRegistro(e){
error.innerHTML = '';
        error.style.display = 'block';
        validarNombre(e);
        validarTelefono(e);
        validarCorreo(e);
        validarFecha_reserva(e);
        validarNum_personas(e);
        
        }


formulario.addEventListener('submit', validarreservaciones);
//}())