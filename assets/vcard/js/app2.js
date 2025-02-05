/* VARIABLES CONSTANTES*/
console.log('/* VARIABLES CONSTANTES*/');
var loc = window.location;
var fecha = new Date();
const {protocol, host, origin, pathname} = window.location;
const dominio = origin+'/';
const dominio1 = origin;
const path_url = pathname;
const URL = window.location.href;
//if(host == 'localhost'){
console.log(loc);
console.log(fecha);
console.log('protocol='+protocol);
console.log('host='+host);
console.log('dominio='+dominio);
console.log('dominio1='+dominio1);
console.log('path_url='+path_url);
console.log('path_url='+path_url);
console.log('URL='+URL);
//}
/* VARIABLES */
console.log('/* VARIABLES */');
var path_url1 = path_url.replace("/", "");
//var path_root=(host=='localhost')?path_url1:'';
var path_root=(host=='localhost')?'MisSitios/vcardappjs/':'';
var page_url = dominio+path_root;
var perfil = filename();
if(host == 'localhost'){
console.log('path_root='+path_root);
console.log('page_url='+page_url);
console.log(perfil);
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

function accion(type){
    const closed = document.querySelector("#close");
    if(type!='inicio'){$("#close").show();}else{$("#close").hide();}
    
    if(type=='inicio'){$("#inicio").fadeIn();}else{$("#inicio").hide();}
    if(type=='contacto'){$("#contacto").fadeIn();}else{$("#contacto").hide();}
    if(type=='ubicacion'){$("#ubicacion").fadeIn();}else{$("#ubicacion").hide();}
    if(type=='compartir'){$("#compartir").fadeIn();}else{$("#compartir").hide();}
    if(type=='guardar'){$("#guardar").fadeIn();}else{$("#guardar").hide();}
    if(type=='acceso'){$("#acceso").fadeIn();}else{$("#acceso").hide();}
}

function menuFooter(){
  const menu = document.querySelector("#footerbar");
  if(menu){
    menu.addEventListener('click',(e)=>{//console.log(e);
      setTimeout(() => {
        location.href=URL+'#td2';      
      }, 200);
    });
  }
}

function ssl(){
  //const protocol = window.location.protocol;console.log("protocol=" + protocol);
  if(protocol=="http:"){window.location="https://"+host+"/"+path_root;}
}

function sslProfile(){
  //const protocol = window.location.protocol;console.log("protocol=" + protocol);
  if(protocol=="http:"){window.location=URL;}
}

function load(){
  accion('inicio');
  menuFooter();
}

document.onload = load();

