/* VARIABLES CONSTANTES*/
console.log('/* VARIABLES CONSTANTES*/');
var loc = window.location;
var fecha = new Date();
const {protocol, host, origin, pathname} = window.location;

function accion(type){
  if(type!='inicio'){$("#close").show();}else{$("#close").hide();}
  if(type=='inicio'){$("#inicio").fadeIn();}else{$("#inicio").hide();}
  if(type=='contacto'){$("#contacto").fadeIn();}else{$("#contacto").hide();}
  if(type=='ubicacion'){$("#ubicacion").fadeIn();}else{$("#ubicacion").hide();}
  if(type=='compartir'){$("#compartir").fadeIn();}else{$("#compartir").hide();}
  if(type=='guardar'){$("#guardar").fadeIn();}else{$("#guardar").hide();}
  if(type=='acceso'){$("#acceso").fadeIn();}else{$("#acceso").hide();}
}

/*FUNCIONES */
function filename(){
  var rutaAbsoluta = self.location.href;
  var posicionUltimaBarra = rutaAbsoluta.lastIndexOf("/");
  var rutaRelativa = rutaAbsoluta.substring( posicionUltimaBarra + "/".length , rutaAbsoluta.length );
  return rutaRelativa;
}

function action(type){
  if(type=='viewcopy'){
    $('#inputCopiar').select();
       var res = document.execCommand("copy");
      if (!res) { console.log("> No copy to clipboard");}else{console.log('Texto Copiado');document.getElementById('aviso').innerHTML='<div class="alert alert-success">Texto Copiado!</div>';}
  }
}

function menuFooter() {
  const menu = document.querySelector("#footerbar");
  if (menu) {
    menu.addEventListener("click", (e) => {
      //console.log(e);
      setTimeout(() => {
        location.href = URL + "#td2";
      }, 200);
    });
  }
}

document.onload = load();

function ssl() {
  //const protocol = window.location.protocol;console.log("protocol=" + protocol);
  if (protocol == "http:") {
    window.location = "https://" + host + "/" + path_root;
  }
}

function sslProfile() {
  //const protocol = window.location.protocol;console.log("protocol=" + protocol);
  if (protocol == "http:") {
    window.location = URL;
  }
}

function load() {
  accion("inicio");
  menuFooter();
}
