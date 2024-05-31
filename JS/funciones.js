function mostrarRegistroForm() {
  document.getElementById('loginDiv').style.display = 'none';
  document.getElementById('registroDiv').style.display = 'block';

  let eyeRegistro = document.getElementById('eyeRegistro');
  let inputRegistro = document.getElementById('clave_usuario_reg');

  eyeRegistro.addEventListener("click", function() {
    if (inputRegistro.type === "password") {
      inputRegistro.type = "text";
      eyeRegistro.style.opacity = 0.8;
    } else {
      inputRegistro.type = "password";
      eyeRegistro.style.opacity = 0.3;
    }
  });
}

function mostrarLoginForm() {
  document.getElementById('registroDiv').style.display = 'none';
  document.getElementById('loginDiv').style.display = 'block';
}

function verClaveLogin() {
  let inputLogin = document.getElementById('clave_usuario');
  let eyeLogin = document.getElementById('eyeLogin');

  if (inputLogin.type === "password") {
    inputLogin.type = "text";
    eyeLogin.style.opacity = 0.8;
  } else {
    inputLogin.type = "password";
    eyeLogin.style.opacity = 0.3;
  }
}

window.onclick = function(event) {
  let adminModal = document.getElementById('formulario_crear_administrador');
  let userModal = document.getElementById('formulario_crear_usuario');
  if (event.target == adminModal) {
      adminModal.style.display = 'none';
  }
  if (event.target == userModal) {
      userModal.style.display = 'none';
  }
}

function mostrarYOcultarError() {
  let errorMensaje = document.getElementById('error-div');
  if (errorMensaje) {
      setTimeout(function() {
          errorMensaje.style.display = 'none';
      }, 10000);
  }
}

function mostrarYOcultarOk() {
  let okMensaje = document.getElementById('ok-div');
  if (okMensaje) {
      setTimeout(function() {
        okMensaje.style.display = 'none';
      }, 10000);
  }
}

(() => {
  'use strict';
  const forms = document.querySelectorAll('.needs-validation');
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }

      form.classList.add('was-validated');
    }, false);
  });
})();


  



function validarReg() {
  let nombre = document.getElementById("nombre_usuario_reg");
  let correo = document.getElementById("correo_usuario_reg");
  let telefono = document.getElementById("telefono_usuario_reg");
  let apellidos = document.getElementById("apellidos_usuario_reg");
  let clave = document.getElementById("clave_usuario_reg");
  let fecha = document.getElementById("edad_usuario_reg");
  console.log(nombre.value === "")
  console.log(correo)
  console.log(telefono)
  console.log(apellidos)
  console.log(clave)
  console.log(fecha);

  
  let nombreExp = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
  let correoExp = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  let telefonoExp = /^\d{9}$/;
  let apellidosExp = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
  let errores = [];

  if (nombre.value === "") {
    // pasa por aqui cuando nombre no tiene contenido
    nombre.classList.add("input-error");
    errores.push('Introduce un nombre');
  } else if (!nombreExp.test(nombre.value)) {
    nombre.classList.add("input-error");
    errores.push('Introduce un nombre válido');
  } else {
    nombre.classList.remove("input-error");
  }

  if (apellidos.value === "") {
    apellidos.classList.add("input-error");
    errores.push('Introduce unos apellidos');
  } else if (!apellidosExp.test(apellidos.value)) {
    apellidos.classList.add("input-error");
    errores.push('Introduce unos apellidos válidos');
  } else {
    apellidos.classList.remove("input-error");
  }

  if (fecha.value === "") {
    fecha.classList.add("input-error");
    errores.push('Introduce una fecha');
  } else {
    fecha.classList.remove("input-error");
    let fechaNacimiento = new Date(fecha.value);
    let hoy = new Date();
    if (fechaNacimiento >= hoy) {
      fecha.classList.add("input-error");
      errores.push('La fecha de nacimiento no puede ser mayor a la');
    } else {
      let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
      let mes = hoy.getMonth() - fechaNacimiento.getMonth();
      if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNacimiento.getDate())) {
        edad--;
      }
      if (edad < 18) {
        fecha.classList.add("input-error");
        errores.push('Debe ser mayor de edad');
      }
    }
  }

  if (telefono.value === "") {
    telefono.classList.add("input-error");
    errores.push('Introduce un teléfono');
  } else if (!telefonoExp.test(telefono.value)) {
    telefono.classList.add("input-error");
    errores.push('Introduce un teléfono válido');
  } else {
    telefono.classList.remove("input-error");
  }

  if (correo.value === "") {
    correo.classList.add("input-error");
    errores.push('Introduce un correo');
  } else if (!correoExp.test(correo.value)) {
    correo.classList.add("input-error");
    errores.push('Introduce un correo válido');
  } else {
    correo.classList.remove("input-error");
  }

  if (clave.value === "") {
    clave.classList.add("input-error");
    errores.push('Introduce una contraseña');
  } else {
    clave.classList.remove("input-error");
  }
  console.log(errores.length);
  event.preventDefault();


  /*if (errores.length > 0) {
    let mensajeError = errores.join("<br>");
    mostrarError(mensajeError);
    return false; 
  } else {
    return true;
  }*/
}


function validarRegModal() {
  let nombre = document.getElementById("nombre_usuario_reg");
  let correo = document.getElementById("correo_usuario_reg");
  let telefono = document.getElementById("telefono_usuario_reg");
  let apellidos = document.getElementById("apellidos_usuario_reg");
  let clave = document.getElementById("clave_usuario_reg");
  let fecha = document.getElementById("edad_usuario_reg");
  
  let nombreExp = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
  let correoExp = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  let telefonoExp = /^\d{9}$/;
  let apellidosExp = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
  let errores = [];

  if (nombre.value === "") {
    nombre.classList.add("input-error");
    errores.push('Introduce un nombre');
  } else if (!nombreExp.test(nombre.value)) {
    nombre.classList.add("input-error");
    errores.push('Introduce un nombre válido');
  } else {
    nombre.classList.remove("input-error");
  }

  if (apellidos.value === "") {
    apellidos.classList.add("input-error");
    errores.push('Introduce unos apellidos');
  } else if (!apellidosExp.test(apellidos.value)) {
    apellidos.classList.add("input-error");
    errores.push('Introduce unos apellidos válidos');
  } else {
    apellidos.classList.remove("input-error");
  }

  if (fecha.value === "") {
    fecha.classList.add("input-error");
    errores.push('Introduce una fecha');
  } else {
    fecha.classList.remove("input-error");
  }

  if (telefono.value === "") {
    telefono.classList.add("input-error");
    errores.push('Introduce un teléfono');
  } else if (!telefonoExp.test(telefono.value)) {
    telefono.classList.add("input-error");
    errores.push('Introduce un teléfono válido');
  } else {
    telefono.classList.remove("input-error");
  }

  if (correo.value === "") {
    correo.classList.add("input-error");
    errores.push('Introduce un correo');
  } else if (!correoExp.test(correo.value)) {
    correo.classList.add("input-error");
    errores.push('Introduce un correo válido');
  } else {
    correo.classList.remove("input-error");
  }

  if (clave.value === "") {
    clave.classList.add("input-error");
    errores.push('Introduce una contraseña');
  } else {
    clave.classList.remove("input-error");
  }

  if (errores.length > 0) {
    let mensajeError = errores.join("<br>");
    mostrarErrorModal(mensajeError);
    return false; 
  } else {
    return true;
  }
}

function mostrarError(mensaje) {
  let errorDiv = document.getElementById('error-div');
  errorDiv.innerHTML = mensaje;
  errorDiv.style.display = 'block';
}

function mostrarErrorModal(mensaje) {
  let errorModal = document.getElementById('erroresModal');
  errorModal.innerHTML = mensaje;
  errorModal.style.display = 'block';
}
