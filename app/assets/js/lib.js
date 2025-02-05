/* VARIABLES CONSTANTES*/
console.log('/* VARIABLES CONSTANTES*/');
var loc = window.location;
console.log(loc);
var fec = new Date();
console.log(fec);
var year = fec.getFullYear();
console.log(year);
const protocol = window.location.protocol;
console.log('protocol=' + protocol);
const host = window.location.host;
console.log('host=' + host);
const dominio = window.location.origin + '/';
console.log('dominio=' + dominio);
const dominio1 = window.location.origin;
console.log('dominio1=' + dominio1);
const path_url = window.location.pathname;
console.log('path_url=' + path_url);
const URL = window.location.href;
console.log('URL=' + URL);
const quest = window.location.search;
console.log('quest=' + quest);
/* VARIABLES */
console.log('/* VARIABLES */');
var mod = '';
var ext = '';
var id = '';
var path_url1 = path_url.replace("/", "");
//var path_root=(host=='localhost')?path_url1:'app/';
var proyecto = 'vcardappjs'; //PROYECTO
console.log('proyecto=' + proyecto);
var sub_path = 'app/'; //SUB_PATH
console.log('sub_path=' + proyecto);
var path_root = (host == 'localhost') ? 'MisSitios/' + proyecto + '/' + sub_path : sub_path;
console.log('path_root=' + path_root);
var tema = 'default';
console.log('tema=' + tema);
var path_tema = 'temas/' + tema + '/';
console.log('path_tema=' + path_tema);
var page_url = dominio + path_root;
console.log('page_url=' + page_url);

var pag_name = filename();
console.log('pag_name=' + pag_name);

var vars = getQueryVariable();
console.log(vars);
for (var i = 0; i < vars.length; i++) {
  var GET = vars[i].split("=");
  if (GET[0] == 'mod') {mod = GET[1];}
  if (GET[0] == 'ext') {ext = GET[1];}
  if (GET[0] == 'id') {id = GET[1];}
}
mod = (mod == '') ? 'Home' : mod;
console.log('mod=' + mod);
ext = (ext == '' || ext == 'undefined' || ext == null) ? 'index' : ext;
console.log('ext=' + ext);
id = (id == '' || id == 'undefined') ? '' : id;
console.log('id=' + id);
var url_mod = page_url + 'pages/' + mod + '/' + ext + '.html';
console.log(url_mod);

var bootstrap = '<link href="' + page_url + 'assets/bootstrap/b-4.5.0/css/bootstrap.css" rel="stylesheet" type="text/css" />';
if (bootstrap != "") {
  console.log('Bootstrap Activo');
} else {
  console.log('Bootstrap No Activo');
}

console.log('/*Funciones*/');
/*FUNCIONES*/
function ssl(){
  //const protocol = window.location.protocol;console.log("protocol=" + protocol);
  if(protocol=="http:"){window.location="https://"+host+"/"+path_root;}
}
//Configuracion de la funcion: [hora.js].
function fecha_hora_update(val) {
  const inputUpdate = document.querySelector("#f_update");
  const fecha1 = fecha();
  if(val==1){
  setTimeout(fecha_hora_update, 1000);
  }
  if (mod=='tarjetas' || mod=='empresas' || mod=='perfil') {
    inputUpdate.value = fecha1;
  }
}

function fecha_hora_create(val) {
  const inputCreate = document.querySelector("#f_create");
  const fecha2 = fecha();
  if(val==1){
  setTimeout(fecha_hora_create, 1000);
  }
  if (mod=='tarjetas' || mod=='empresas' || mod=='perfil') {    
    inputCreate.value = fecha2;
  }
}

function fecha() {
  var dt = new Date();
  var hora = dt.getHours();
  var minuto = dt.getMinutes();
  var segundo = dt.getSeconds();
  var dd = dt.getDate();
  var mm = dt.getMonth() + 1;
  var year = dt.getFullYear();
  var valtime = ((hora < 10) ? "0" : "") + hora;
  valtime += ((minuto < 10) ? ":0" : ":") + minuto;
  valtime += ((segundo < 10) ? ":0" : ":") + segundo;
  mm = (mm < 10) ? '0' + mm : mm;
  dd = (dd < 10) ? '0' + dd : dd;
  var fecha = year + '-' + mm + '-' + dd + ' ' + valtime;
  return fecha;
}

function menu() {
  var m1 = (mod == 'Home') ? ' class="active"' : '';
  var m2 = (mod == 'perfil') ? ' class="active"' : '';
  var m3 = (mod == 'tarjetas') ? ' class="active"' : '';
  var m4 = (mod == 'empresas') ? ' class="active"' : '';
  var menu = `<li${m1}><a href="${page_url}"> <i class="fa fa-home"></i>Home </a></li>
    <!--li${m2}><a href="${page_url}perfil"> <i class="fa fa-user"></i>Perfil </a></li-->
    <li${m3}><a href="${page_url}tarjetas"> <i class="fa fa-vcard"></i>Mis Tarjetas </a></li>
    <li${m4}><a href="${page_url}empresas"> <i class="fa fa-industry"></i>Empresas </a></li>`;
  $('.list-unstyled').html(menu);
  footer();
}

function footer(){
  const f = document.querySelector("#footer_page");
  f.innerHTML = year + ' &copy; VcardAppJS v.1.2.14. Diseñada por <a target="_blank" href="http://multiportal.com.mx">[:MULTIPORTAL:]</a>.';
}

function modulos() {
  $(function () {
    $.ajax({
      url: url_mod,
      dataType: "html",
      success: function (data) {
        $("#app-modulo").html(data);
        console.log('La pagina Existe');
      },
      error: function () {
        $("#app-modulo").html('<div class="alert alert-danger">Error:404 La pagina No existe<br><a href="./">Inicio</a></div>');
        console.log('Error:404 La pagina No existe');
      }
    });
  });
}

function getQueryVariable() {
  var res = path_url.replace('/' + path_root, ""); //console.log(res);
  var val = res.split("/"); //console.log(val);

  var query = window.location.search.substring(1); //console.log(query);
  var vars = query.split("&");

  if (query == "") {
    vars = ['mod=' + val[0], 'ext=' + val[1], 'id=' + val[2]];
  }
  return vars;
}

function filename() {
  var rutaAbsoluta = self.location.href;
  var posicionUltimaBarra = rutaAbsoluta.lastIndexOf("/");
  var rutaRelativa = rutaAbsoluta.substring(posicionUltimaBarra + "/".length, rutaAbsoluta.length);
  return rutaRelativa;
}

function inicio() {
  console.log('Corriendo funcion inicio');
  getQueryVariable();
  menu();
  if(mod!='registro') {
    modulos();
  }
  //form_tema();    
  //setTimeout(() => { fecha_hora_update();fecha_hora_create(); }, 5000);
  if(host!='localhost'){ssl();}
}

onload = inicio();