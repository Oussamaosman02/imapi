// creamos las variables
const nombre = document.getElementById("nombre");
const politica = document.getElementById("politica");
const pass = document.getElementById("passwd");
const repass = document.getElementById("repasswd");
const mail = document.getElementById("mail");
//regex
const mailf = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

//función que controla el submit
function handleSubmit() {
  if (!nombre.value) {
    //si no ha puesto el nombre
    alert("Hace falta el nombre");
    return false;
  } else if (!(mail.value.match(mailf) && mail.value)) {
    //si no ha puesto el mail
    //o no coincide con la regex
    alert("Mail inválido");
    return false;
  } else if (!(pass.value == repass.value && pass.value)) {
    //si no ha puesto la contraseña
    //o no coinciden ambas
    alert("Las contraseñas no coinciden");
    return false;
  } else if (!politica.checked) {
    //si no acepta la política de privacidad
    alert("Debes aceptar la política de privacidad");
    return false;
  }
}
