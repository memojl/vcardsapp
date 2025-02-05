// Your web app's Firebase configuration
var firebaseConfig = {
  apiKey: "AIzaSyDeX81H_K8AsV2KjQgEbwxte6yVdSYqFXk",
  authDomain: "vcardapp-js.firebaseapp.com",
  databaseURL: "https://vcardapp-js.firebaseio.com",
  projectId: "vcardapp-js",
  storageBucket: "vcardapp-js.firebasestorage.app",//storageBucket: "vcardapp-js.appspot.com",
  messagingSenderId: "420720513571",
  appId: "1:420720513571:web:f072eeda6cd3cfa1429796",
  measurementId: "G-LDPZ4BZ1GV"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();

const db = firebase.database();
const auth = firebase.auth();
const fs = firebase.firestore();

console.log('Modulo=>' + mod);

//Tablas-Documentos
var refConfig = db.ref().child('vcard_config');
var refSignup = db.ref().child('vcard_signup');
var refVcard = db.ref().child('vcard_vcard');
var refUser = db.ref().child('vcard_user');
var refEmpresas = db.ref().child('vcard_vcard_empresas');


//APP
const dashboard = document.querySelectorAll(".dashboard");
//const contentLinks = document.querySelectorAll(".content-page");
const loginLinks = document.querySelectorAll(".login-page");
const registroLinks = document.querySelectorAll(".registro-page");

const loginCheck = (user) => {
  if (user) {
    dashboard.forEach((link) => (link.style.display = "block"));
    loginLinks.forEach((link) => (link.style.display = "none"));
    registroLinks.forEach((link) => (link.style.display = "none"));
  } else {
    dashboard.forEach((link) => (link.style.display = "none"));
    if (mod == 'registro') {
      registroLinks.forEach((link) => (link.style.display = "block"));
      loginLinks.forEach((link) => (link.style.display = "none"));
    } else {
      registroLinks.forEach((link) => (link.style.display = "none"));
      loginLinks.forEach((link) => (link.style.display = "block"));
    }
  }
}

// Logout
const logout = document.querySelector("#logout");
logout.addEventListener("click", (e) => {
  e.preventDefault();
  auth.signOut().then(() => {
    console.log("signup out");
    localStorage.clear();
    navigator.serviceWorker.getRegistrations().then(function(registrations) {
      for(let registration of registrations) {
       registration.unregister()
    }});
  });  
  if(mod!='Home'){location.href=page_url;}
});

// SignUp (Registarse con correo)
const signUpForm = document.querySelector("#registro-form");
signUpForm.addEventListener("submit", (e) => {
  e.preventDefault();
  const usuario = 'Sin Nombre';//const usuario = signUpForm["register-username"].value;
  const email = signUpForm["register-email"].value;
  const password = signUpForm["register-password"].value;
  var user = {/*uid: "",*/ displayName: usuario, email: email, photoURL: null}
  // Authenticate the User
  auth
    .createUserWithEmailAndPassword(email, password)
    .then((userCredential) => {
      console.log('Datos user: '+user);
      //guardarDatos(user);
      // clear the form
      signUpForm.reset();
      // close the modal//$("#signupModal").modal("hide");
    });
});

// SingIn (Login)
const signInForm = document.querySelector("#login-form");
signInForm.addEventListener("submit", (e) => {
  e.preventDefault();
  const email = signInForm["login-email"].value;
  const password = signInForm["login-password"].value;

  // Authenticate the User
  auth.signInWithEmailAndPassword(email, password).then((userCredential) => {
    // clear the form
    signInForm.reset();
    // close the modal//$("#signinModal").modal("hide");
  });
});

// events
// list for auth state changes
auth.onAuthStateChanged((user) => {
  if (user) {
    console.log("signin:" + user.email);//console.log(user);
    leerDatos(user.email);
    tarjetas(user.uid);
    empresas(user.uid);
    loginCheck(user);
    guardarDatos(user);
    if(mod=='tarjetas'){selectEmpresa(user.uid);}
    vuser(user.uid);
    /*fs.collection("posts").get().then((snapshot) => {
      loginCheck(user);
      setupPosts(snapshot.docs);
    });*/
  } else {
    console.log("signout");
    //setupPosts([]);
    loginCheck(user);
  }
});

// Login with Google
const googleButton = document.querySelector("#googleLogin");
googleButton.addEventListener("click", (e) => {
  e.preventDefault();
  signInForm.reset();
  //$("#signinModal").modal("hide");
  autorizar();
});

const googleButton2 = document.querySelector("#googleRegister");
googleButton2.addEventListener("click", (e) => {
  e.preventDefault();
  signInForm.reset();
  //$("#signinModal").modal("hide");
  autorizar();
});

function autorizar(){
  const provider = new firebase.auth.GoogleAuthProvider();
  auth.signInWithPopup(provider).then((result) => {
      console.log(result);
      console.log("google sign in");
    })
    .catch(err => {
      console.log(err);
    })
}

//FUNCIONES

//Guardar automaticamente
function guardarDatos(user) {
  var usuario = {
    uid: user.uid,
    usuario: user.displayName,
    email: user.email,
    foto: user.photoURL
  }
  db.ref('vcard_signup/' + user.uid).set(usuario);
}

//Leer los datos
function leerDatos(userlogin) {
  const foto = document.querySelector("#photo");
  const nom = document.querySelector("#nombre_session");
  const mail = document.querySelector("#email_session");
  const uid = document.querySelector("#id_code_google");
  db.ref("vcard_signup").on("child_added", function (s) {
    var user = s.val();
    var f = (user.foto == null)?page_url+'bloques/files/images/photos/sinfoto.png':user.foto;
    var u = (user.usuario == null)?user.email:user.usuario;
    if (user.email == userlogin) {
      const cover = '<img src="' + f + '" class="img-fluid rounded-circle">';
      const nombre = u;
      const correo = userlogin;
      const ID_user = user.uid;

      foto.innerHTML = cover;
      nom.innerHTML = nombre;
      mail.innerHTML = correo;
      uid.innerHTML = ID_user;
    }
  });
}

function add_empresa(val){
  if(val==1){
    document.getElementById('sel_empresa').innerHTML='<input type="text" class="form-control" id="empresa" name="empresa" value=""><div><a href="javascript:add_empresa(0);">Cancelar</a></div>';
  }else{
    document.getElementById('sel_empresa').innerHTML='<div class="input-group"><!--span class="input-group-addon"><i class="fa fa-industry"></i></span--><select class="form-control" id="empresa" name="empresa" style="float:left;"><option>Seleccione Empresa</option><option value="Multiportal">Multiportal</option><option value="Billnex">Billnex</option><option value="Capital">Capital</option></select></div>';
  }
}

function up(val){
	switch (val){
	case 1:
		document.getElementById('upload').innerHTML = '<span style="float:right;"><a href="javascript:up(0);"><i class="fa fa-close" title="Cerrar"></i></a></span><br><input type="file" name="userfile" class="required" size="40" style="font-size: 0.9em;"><br><input type="submit" id="Aceptar" name="Aceptar" value="Aceptar">';
	break; 
	case 2:
		document.getElementById('upload').innerHTML = '<div style="text-align:right;"><a href="javascript:up(0);"><i class="fa fa-close" title="Cerrar"></i></a></div><div id="box-load2"><input type="file" id="userfile" name="userfile"></div><input type="submit" id="Aceptar" name="Aceptar" value="Aceptar">';
	break;
	default: 
		document.getElementById('upload').innerHTML = '<a href="javascript:up(1);">Cambiar Foto</a>';
	break;
	}
}

function up2(val){
	switch (val){
  case 1:
		document.getElementById('upload2').innerHTML = '<span style="float:right;"><a href="javascript:up2(0);"><i class="fa fa-close" title="Cerrar"></i></a></span><br><input type="file" name="userfile2" class="required" size="40" style="font-size: 0.9em;"><br><input type="submit" id="Aceptar2" name="Aceptar2" value="Aceptar">';
	break; 
	default: 
		document.getElementById('upload2').innerHTML = '<a href="javascript:up2(1);">Cambiar Fondo</a>';
	break;
	}
}

function selectEmpresa(userid){
  var sel_emp='<option>Seleccione Empresa</option>'  
  refEmpresas.on('child_added',function(datos){
    var reg=datos.val(); //console.log(reg);
    if(reg.uid==userid){
      let opc=`<option value='${reg.ID}'>${reg.empresa}</option>`;
      sel_emp+=opc; //console.log(sel_emp)  
    }
    let sel = document.querySelector('#idemp');
    sel.innerHTML=sel_emp;
  });
}

function listar_vcard(){
  var template='';
  let idVcard=refVcard.orderByChild("orden").limitToFirst(10);//limitToLast(5);
  idVcard.on('child_added',function(datos){
    var reg=datos.val(); //console.log(reg);
    const {ID,cover,profile,nombre,puesto,f_create,visible} = reg;
    if(visible==1){
    template+=`
  <div class="public-user-block block">
    <div class="row d-flex align-items-center">                   
      <div class="col-lg-4 d-flex align-items-center">
        <div class="order">${ID}</div>
        <div class="avatar" style="background:url(${cover});background-repeat:no-repeat;background-size:cover;background-position:center;"></div>
        <a href="${page_url}../profile/${profile}" class="name">
          <strong class="d-block">${nombre}</strong>
          <span class="d-block">${profile}</span>
        </a>
      </div>
      <div class="col-lg-4 text-center">
        <div class="contributions">${puesto}</div>
      </div>
      <div class="col-lg-4">
        <div class="details d-flex">
          <div class="item"><i class="fa fa-calendar"></i><strong>${f_create}</strong></div>
          <!--div class="item"><i class="icon-info"></i><strong></strong></div-->
          <!--div class="item"><i class="fa fa-gg"></i><strong>200</strong></div-->
          <!--div class="item"><i class="icon-flow-branch"></i><strong></strong></div-->
        </div>
      </div>
    </div>
  </div>`  
  const lista = document.querySelector('#lista');
  lista.innerHTML=template;
    }
  });
}
if(mod=='Home'){listar_vcard();}


/**CRUD VCARD*/
let edit = true;
let bol = 1;

//Mostrar(Listar)
function tarjetas(userid){//var reg = {};    
  refVcard.on('value',function(datos){
      const content = document.querySelector("#vcontent");
      var template = '';
      var reg=datos.val();
      // Recorremos los productos y los mostramos
      $.each(reg, function(indice,valor){//console.log(indice);
        var ID = (valor.ID == null)?'':valor.ID;
        var uid = (valor.uid == null)?'':valor.uid;
        var profile = (valor.profile == null)?'':valor.profile;
        var cover = (valor.cover == null)?page_url+'bloques/files/images/photos/sinfoto.png':valor.cover;
        var nombre = (valor.nombre == null)?'':valor.nombre;
        var puesto = (valor.puesto == null)?'':valor.puesto;
        var email = (valor.email == null)?'':valor.email;
        var cell = (valor.cell == null)?'':valor.cell;
        var web = (valor.web == null)?'':valor.web;
        var visible = (valor.visible == null)?'':valor.visible;

        var estado = (visible === '1')?'activo':'no-activo';
        if(uid==userid){
          template += `
        <div vcardId="${indice}" class="col-lg-4">
          <div class="user-block block text-center">
            <div class="avatar" style="background:url(${cover});background-repeat:no-repeat;background-size:cover;background-position:center;">
              <div class="order ${estado}" title="${estado}">1st</div>
            </div><a href="#" class="user-title">
              <h3 class="h5">${nombre}</h3><span>${puesto}</span></a>
            <div class="contributions">${profile}</div>
            <div class="details d-flex">
              <div class="item"><a href="`+page_url+`../profile/${profile}"><i class="fa fa-vcard"></i><strong>Ver</strong></a></div>
              <div class="item btn-edit" data-toggle="modal" data-target="#addVcard" title="Editar" style="cursor:pointer;"><i class="fa fa-edit"></i><strong>Editar</strong></div>
              <div class="item btn-delete" title="Borrar" style="cursor:pointer;"><i class="fa fa-trash"></i><strong>Borrar</strong></div>
            </div>
          </div>
        </div>`
        }        
        if(mod=='tarjetas'){
          content.innerHTML = '<div class="container-fluid"><div class="row">' + template + '</div></div>';
        }
      });
  });
}

//BTN-AGREGAR
$('#app-modulo').on('click','.btn-add',function(){
  $("#form1").trigger('reset');
  fecha_hora_create(1);//fecha_hora_update(0);
  console.log('Boton Agregar activado');
  let idVcard=refVcard.orderByChild('ID');
  console.log(idVcard);
  idVcard.on('value',function(datos){
    var reg=datos.val();
    let val = Object.values(reg); //console.log(val);
    let n=val.length-1; //console.log('n: '+n);
    let ureg=val[n]; //console.log(ureg);
    let ID=parseInt(ureg.ID)+1; //console.log(ID);
    $('#ID').val(ID);
    let orden=parseInt(ureg.orden)-1; console.log(orden);
    $('#orden').val(orden);
  });
  let IDu=document.querySelector('#id_code_google');
  $('#uid').val(IDu.textContent);
  let name=document.querySelector('#email_session');  
  $('#user').val(name.textContent);
  //Imagen Cover
  $('#cover').val(page_url+'bloques/files/images/photos/sinfoto.png');
  $("#ima").attr('src', page_url+'bloques/files/images/photos/sinfoto.png');
  edit = false;
});

//BTN-EDITAR [Form_Editar]
$('#app-modulo').on('click','.btn-edit',function(){
  $("#form1").trigger('reset');
  fecha_hora_update(1);//fecha_hora_create(0);
  console.log('Boton Editar activado');  
  const element = $(this)[0].parentElement.parentElement.parentElement;
  let Id = $(element).attr('vcardId'); //console.log(Id);
  refVcard.child(Id).once('value',function(datos){
      valor=datos.val(); //console.log(valor);
      //Campos Ocultos
      $('#cardId').val(Id),
      $('#ID').val(valor.ID);
      $('#orden').val(valor.orden);
      $('#uid').val(valor.uid); //uid del usuario     
      $('#f_create').val(valor.f_create);
      $('#user').val(valor.user);
      //Campos de Edicion
      $('#descripcion').val(valor.descripcion);
      $('#profile').val(valor.profile);
      $('#nombre').val(valor.nombre);
      $('#puesto').val(valor.puesto);
      $('#email').val(valor.email);
      $('#cell').val(valor.cell);
      $('#tel_ofi').val(valor.tel_ofi);
      $('#idemp').val(valor.idemp);
      //$('#empresa').val(valor.empresa);
      $('#web').val(valor.web);
      $('#fb').val(valor.fb);
      //$('#tw').val(valor.tw);
      $('#lk').val(valor.lk);
      $('#ins').val(valor.ins);
      $('#visible').val(valor.visible);
      //Imagen Cover
      $('#cover').val(valor.cover);
      $("#ima").attr('src', valor.cover);
  });
  edit = true;
});

if(mod=='tarjetas'){
//Guardar(Enviar)/Editar
$('#app-modulo').on('#form1').submit(function(e){
  e.preventDefault(); console.log('Form1');
  var Id=$('#cardId').val(); console.log(Id);
  var action='';

  const postData = {
    ID: $('#ID').val(),
    orden: $('#orden').val(),
    uid: $('#uid').val(), //uid del usuario
    f_create: $('#f_create').val(),
    f_update: $('#f_update').val(),
    user: $('#user').val(),
    descripcion: $('#descripcion').val(),
    cover: $('#cover').val(),
    profile: $('#profile').val(),
    nombre: $('#nombre').val(),
    puesto: $('#puesto').val(),
    email: $('#email').val(), 
    web: $('#web').val(),
    cell: $('#cell').val(),
    tel_ofi: $('#tel_ofi').val(),
    idemp: $('#idemp').val(),
    //empresa: $('#empresa').val(),
    fb: $('#fb').val(),
    //tw: $('#tw').val(),
    lk: $('#lk').val(),
    ins: $('#ins').val(),
    visible: $('#visible').val()    
  };
  console.log(postData);
  if(edit==false){action='Guardado';
    refVcard.push(postData); // Guardamos los datos en referencia
  }else{action='Actualizado';
    refVcard.child(Id).update(postData); // Actualizamos los datos en referencia
  }
  console.log('Se ha '+action+' el registro');
  $("#form1").trigger('reset');
  $('#addVcard').modal('hide');
  edit = false;
});
}

//BORRAR
$('#app-modulo').on('click', '.btn-delete', function(){
  var tag = (mod=='tarjetas')?'Tarjeta':'Empresa';
  const element = $(this)[0].parentElement.parentElement.parentElement;
  let Id = $(element).attr('vcardId'); console.log(Id);
  Swal.fire({
    title: "Esta seguro de eliminar esta "+tag+"?",
    text: "¡Está operación no se puede revertir!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Borrar'
  }).then((result) => {
    if (result.value) {
        //let id = $(this).closest('tr').attr('id'); //capturamos el atributo ID de la fila 
        refTable = (mod=='tarjetas')?refVcard:refEmpresas;
        refTable.child(Id).remove(); //eliminamos el producto de firebase      
        Swal.fire('¡Eliminado!', 'La '+tag+' ha sido eliminada.','success')
    }
  })        
});

function alError(error){
  if (error){
    alert('Ha habido problemas al realizar la operación: '+error.code);
  }else{
    alert('Operación realizada con éxito !');
  }
}

//SUBIR COVER
$(document).on('click', '#Aceptar', function (e) {
  e.preventDefault();console.log(page_url);
  //const CLOUD_URL = (host=='localhost')? page_url : 'https://cloudvcardjs.000webhostapp.com/';
  const CLOUD_URL = 'http://localhost/MisSitios/cloudphp/';
  //const CLOUD_URL = 'https://cloudvcardjs.000webhostapp.com/';  
  var frmData = new FormData;
  frmData.append("userfile", $("input[name=userfile]")[0].files[0]);		
  $.ajax({
    url: CLOUD_URL+'upload/files/includes/backend.php?mod='+mod+'&proyecto=cloudphp&action=subir_cover',
    crossDomain: true,
    type: 'POST',
    data: frmData,
    processData: false,
    contentType: false,
    cache: false,
    beforeSend: function (data) {
    $("#imagen").html("Subiendo Imagen");
    },
    success: function (data) {
      console.log(data);
      $("#imagen").html(data);
      $(".alert-dismissible").delay(3000).fadeOut("slow");
      console.log("Subido Correctamente");
    }
  });
});

//SUBIR BACKGROUND
$(document).on('click', '#Aceptar2', function (e) {
  e.preventDefault();
  //const CLOUD_URL = (host=='localhost')? page_url : 'https://cloudvcardjs.000webhostapp.com/';
  //const CLOUD_URL = 'http://localhost/MisSitios/cloudphp/';
  const CLOUD_URL = 'https://cloudvcardjs.000webhostapp.com/';
  var frmData = new FormData;
  frmData.append("userfile2", $("input[name=userfile2]")[0].files[0]);		
  $.ajax({
    url: CLOUD_URL+'bloques/files/admin/backend.php?mod='+mod+'&action=subir_coverbg',
    crossDomain: true,
    type: 'POST',
    data: frmData,
    processData: false,
    contentType: false,
    cache: false,
    beforeSend: function (data) {
    $("#imagen2").html("Subiendo Imagen");
    },
    success: function (data) {
      $("#imagen2").html(data);
      $(".alert-dismissible").delay(3000).fadeOut("slow");
      console.log("Subido Correctamente");
    }
  });
});

//BUSCAR
$("#q").keyup(function (e) {
  if ($("#q").val()) {
    let q = $("#q").val();
    const content = document.querySelector("#lista");
    $.ajax({
      url: page_url+'bloques/files/admin/backend.php?action=buscar',
      type: 'POST',
      data: {q},
      success: function (response) {
        //let valor = JSON.parse(response);
        console.log(response);
        //var template = response;
        content.innerHTML = response;
      }
    });
  }
});

$("#searchForm").submit(function(e){
  e.preventDefault();
  const panel = document.querySelector(".search-panel");
  panel.style.display = 'none';
})

/**CRUD EMPRESA */
//Mostrar(Listar)
function empresas(userid){
  refEmpresas.on('value',function(datos){
      const content = document.querySelector("#vcontent");
      var template = '';
      var reg = datos.val();
      // Recorremos los productos y los mostramos
      $.each(reg, function(indice,valor){//console.log(indice);
        var visible = (valor.visible == null)?'':valor.visible;
        var estado = (visible === '1')?'activo':'no-activo';
        const {cover,empresa,bg_color} = valor;
        //console.log('valor.uid:'+valor.uid);
        if(valor.uid==userid){
          template += `
        <div vcardId="${indice}" class="col-lg-4">
          <div class="user-block block text-center">
            <div class="avatar" style="background:url(${cover});background-repeat:no-repeat;background-size:cover;background-position:center;">
              <div class="order ${estado}" title="${estado}">1st</div>
            </div><a href="#" class="user-title">
              <h3 class="h5">${empresa}</h3><span></span></a>
            <div class="contributions">${bg_color}</div>
            <div class="details d-flex">
              <div class="item btnEditar" data-toggle="modal" data-target="#empresaModal" title="Editar" style="cursor:pointer;"><i class="fa fa-edit"></i><strong>Editar</strong></div>
              <div class="item btn-delete" title="Borrar" style="cursor:pointer;"><i class="fa fa-trash"></i><strong>Borrar</strong></div>
            </div>
          </div>
        </div>`
        }        
        if(mod=='empresas'){
          content.innerHTML = '<div class="container-fluid"><div class="row">' + template + '</div></div>';
        }
      });
  });
}

//BTN-AGREGAR
$('#app-modulo').on('click','.btnAdd',function(){
  $("#form2").trigger('reset');
  fecha_hora_create(1);//fecha_hora_update(0);
  console.log('Boton Agregar activado');
  let idVcard=refEmpresas.orderByChild('ID');

  idVcard.on('value',function(datos){
    var reg=datos.val();
    let val = Object.values(reg); //console.log(val);
    let n=val.length-1; //console.log('n: '+n);
    let ureg=val[n]; //console.log(ureg);
    let ID=parseInt(ureg.ID)+1; //console.log(ID);
    $('#ID').val(ID);
  });
  let IDu=document.querySelector('#id_code_google');
  $('#uid').val(IDu.textContent);
  //let name=document.querySelector('#email_session');  
  //$('#user').val(name.textContent);
  //Imagen Cover
  $('#cover').val(page_url+'bloques/files/images/photos/sinlogo.jpg');
  $('#coverbg').val(page_url+'bloques/files/images/photos/sinbg.jpg');
  $("#ima").attr('src', page_url+'bloques/files/images/photos/sinlogo.jpg');
  $("#ima2").attr('src', page_url+'bloques/files/images/photos/sinbg.jpg');
  edit = false;
});

//BTN-EDITAR [Form_Editar]
$('#app-modulo').on('click','.btnEditar',function(){
  console.log('bol='+bol);
  $("#form2").trigger('reset');
  fecha_hora_update(1);//fecha_hora_create(0);
  console.log('Boton Editar activado');  
  const element = $(this)[0].parentElement.parentElement.parentElement;
  let Id = $(element).attr('vcardId'); //console.log(Id);
  refEmpresas.child(Id).once('value',function(datos){
      valor=datos.val(); console.log(valor);
      //Campos Ocultos
      $('#cardId').val(Id),
      $('#ID').val(valor.ID);
      $('#uid').val(valor.uid); //uid del usuario     
      $('#f_create').val(valor.f_create);
      //$('#user').val(valor.user);
      //Campos de Edicion
      $('#empresa').val(valor.empresa);
      $('#bg_color').val(valor.bg_color);
      $('#visible').val(valor.visible);
      //Imagen Cover
      $('#cover').val(valor.cover);
      $('#coverbg').val(valor.coverbg),
      $("#ima").attr('src', valor.cover),
      $("#ima2").attr('src', valor.coverbg);
  });
  edit = true;
});

if(mod=='empresas'){
//Guardar(Enviar)/Editar
$('#app-modulo').on('#form2').submit(function(e){
  e.preventDefault(); //console.log('Form2');
  var Id=$('#cardId').val(); console.log(Id);
  var action='';

  const postData = {
    ID: $('#ID').val(),
    uid: $('#uid').val(), //uid del usuario
    f_create: $('#f_create').val(),
    f_update: $('#f_update').val(),
    //user: $('#user').val(),
    cover: $('#cover').val(),
    coverbg: $('#coverbg').val(),
    empresa: $('#empresa').val(),
    bg_color: $('#bg_color').val(),
    visible: $('#visible').val()    
  };
  console.log(postData);
  if(edit==false){action='Guardado';
    refEmpresas.push(postData); // Guardamos los datos en referencia
  }else{action='Actualizado';
    refEmpresas.child(Id).update(postData); // Actualizamos los datos en referencia
  }
  console.log('Se ha '+action+' el registro');
  $("#form2").trigger('reset');
  $('#empresaModal').modal('hide');
  edit = false;
});
}

//CRUD USER
function vuser(uidUser){
  var n = 0;
  bol=1;

  refUser.on('value',function(datos){
    //const card=document.querySelector('#key');
    var reg=datos.val(); //console.log(reg);
    if(reg==null){vsignup(uidUser);console.log('vsignup(Activo)+null');}        
    // Recorremos los productos y los mostramos
    $.each(reg, function(indice,valor){//console.log(indice);
      const {ID,foto,usuario,email,uid,f_create,f_update,direccion,tel,level,tipoc,codi} = valor;
      if(uidUser==uid){datos_user(valor); //console.log('vuser');console.log(reg);
        var photo = (foto!='' && foto!=null && foto!='undefined')?foto:page_url+'bloques/files/images/photos/sinfoto.png';
        var nombre = (usuario!='' && usuario!=null && usuario!='undefined')?usuario:'Sin Nombre';
        var template = `<div class="user-block block text-center" vcardId="${indice}">
          <div>
            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary btnEditar3">Modificar Perfil </button>
          </div><img id="ava" src="${photo}" style="width:1px;">
          <div class="avatar" style="background:url(${photo});background-repeat:no-repeat;background-size:cover;background-position:center;">
            <div class="order activo"></div>
          </div><a href="#" class="user-title">
            <h3 class="h5">${nombre}</h3><span>${email}</span></a>
          <div class="contributions">${uid}</div>
          <div><i class="fa fa-map-marker"></i> Dirección: <span id="direc1">${direccion}</span></div>
          <div><i class="fa fa-phone"></i> Tel: <span id="tel1">${tel}</span></div>
          <div><i class="fa fa-calendar"></i> Fecha de creación: <span id="f_c">${f_create}</span></div>
          <div><i class="fa fa-calendar"></i> Fecha de Actualización: <span>${f_update}</span></div>
          <div class="details d-flex">
            <div class="item"><i class="icon-info"></i><strong id="tipoc1">${tipoc}</strong></div>
            <div class="item"><i class="fa fa-gg"></i><strong id="level1">${level}</strong></div>
            <div class="item"><i class="icon-flow-branch"></i><strong>0</strong></div>
          </div>
          <div id="codi1">${codi}</div>
          </div>`
        if(mod=='perfil'){
          const content = document.querySelector("#myProfile");
          content.innerHTML=template;
        }
        console.log('vuser(Activo)');
        n = 1;
      }//else{vsignup(uidUser);console.log('vsignup(Activo)');}

      if(n==0){vsignup(uidUser);console.log('vsignup(Activo)');}
    })
  });
}

function vsignup(uidUser){
  bol=0;
  refSignup.on('child_added',function(datos){    
    var reg=datos.val(); //console.log(reg);    
    const {ID,foto,usuario,email,uid} = reg;
    if(uidUser==uid){datos_user(reg); //console.log('vsignup');console.log(reg);
      var photo = (foto!='' && foto!=null && foto!='undefined')?foto:page_url+'bloques/files/images/photos/sinfoto.png';
      var nombre = (usuario!='' && usuario!=null && usuario!='undefined')?usuario:'Sin Nombre';
      var template = `<div class="user-block block text-center" vcardId="">
        <div>
          <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary btnEditar3">Modificar Perfil </button>
        </div><img id="ava" src="${photo}" style="width:1px;">
        <div class="avatar" style="background:url(${photo});background-repeat:no-repeat;background-size:cover;background-position:center;">
          <div class="order activo"></div>
        </div><a href="#" class="user-title">
         <h3 class="h5">${nombre}</h3><span>${email}</span></a>
        <div class="contributions">${uid}</div>
        <div><i class="fa fa-map-marker"></i> Dirección: <span id="direc1"></span></div>
        <div><i class="fa fa-phone"></i> Tel: <span id="tel1"></span></div>
        <div><i class="fa fa-calendar"></i> Fecha de creación: <span id="f_c"></span></div>
        <div><i class="fa fa-calendar"></i> Fecha de Actualización: <span></span></div>
        <div class="details d-flex">
          <div class="item"><i class="icon-info"></i><strong id="tipoc1">0</strong></div>
          <div class="item"><i class="fa fa-gg"></i><strong id="level1">0</strong></div>
          <div class="item"><i class="icon-flow-branch"></i><strong>0</strong></div>
        </div>
        <div id="codi1"></div>
      </div>`
      if(mod=='perfil'){
        const content = document.querySelector("#myProfile");
        content.innerHTML=template;
      }
    }
  });
}

//BTN-EDITAR [Form_Editar]
$('#app-modulo').on('click','.btnEditar3',function(){
  console.log('Bol='+bol);
  $("#form3").trigger('reset');
  fecha_hora_update(1);//{fecha_hora_create(0);  
  console.log('Boton Editar activado');  
  const element = $(this)[0].parentElement.parentElement;
  let Id = $(element).attr('vcardId'); console.log(Id);
  if(Id==''){fecha_hora_create(1);}

  const uid_tag=document.querySelector('.contributions').textContent;console.log(uid_tag);
  const nom_tag=document.querySelector('.h5').textContent;console.log(nom_tag);
  const email_tag=document.querySelector('#email_session').textContent;console.log(email_tag);
  const avatar=document.querySelector('#ava').getAttribute("src");console.log(avatar);//

  if(Id!=''){
  const fc=document.querySelector('#f_c').textContent;console.log(fc);
  $('#f_create').val(fc);
  const direc=document.querySelector('#direc1').textContent;console.log(direc);
  $('#direc').val(direc);
  const tel=document.querySelector('#tel1').textContent;console.log(tel);
  $('#tel').val(tel);
  const level=document.querySelector('#level1').textContent;console.log(level);
  $('#level').val(level);
  const tipoc=document.querySelector('#tipoc1').textContent;console.log(tipoc);
  $('#tipoc').val(tipoc);
  const codi=document.querySelector('#codi1').textContent;console.log(codi);
  $('#codi').val(codi);
  }

  //Campos Ocultos
  $('#cardId').val(Id);
  $('#uid').val(uid_tag); //uid del usuario

  //Campos de Edicion
  $('#nombre').val(nom_tag);
  $('#email').val(email_tag);

  //Imagen Cover
  $('#cover').val(avatar);
  $("#ima").attr('src', avatar);

  //edit = true;
});

if(mod=='perfil'){
  //Guardar(Enviar)/Editar
  $('#app-modulo').on('#form3').submit(function(e){
    e.preventDefault(); //console.log('Form2');
    var Id=$('#cardId').val(); console.log(Id);
    var action='';
    //var ima=(bol==0)?$('#cover').val():$('#cover').val();
  
    const postData = {
      foto: $('#cover').val(),
      uid: $('#uid').val(), //uid del usuario
      email: $('#email').val(),
      f_create: $('#f_create').val(),
      f_update: $('#f_update').val(),
      usuario: $('#nombre').val(),
      direccion: $('#direc').val(),
      tel: $('#tel').val(),
      level: $('#level').val(),
      tipoc: $('#tipoc').val(),
      codi: $('#codi').val()
    };
    console.log(postData);
    if(Id==''){action='Guardado';
      refUser.push(postData); // Guardamos los datos en referencia
    }else{action='Actualizado';
      refUser.child(Id).update(postData); // Actualizamos los datos en referencia
    }
    console.log('Se ha '+action+' el registro');
    $("#form2").trigger('reset');
    $('#myModal').modal('hide');
    edit = false;
  });
  }

function datos_user(regis){
  const fot = document.querySelector("#photo");
  const nom = document.querySelector("#nombre_session");
  const mail = document.querySelector("#email_session");
  const uidg = document.querySelector("#id_code_google");
  const {ID,foto,usuario,email,uid} = regis;

  var photo = (foto!='' && foto!=null && foto!='undefined')?foto:page_url+'bloques/files/images/photos/sinfoto.png';
  var nombre = (usuario!='' && usuario!=null && usuario!='undefined')?usuario:'Sin Nombre';

  fot.innerHTML = '<img src="' + photo + '" class="img-fluid rounded-circle">';
  nom.innerHTML = '<h1 class="h5">' + nombre + '</h1>';
  mail.innerHTML = email;
  uidg.innerHTML = uid;
}


//FIN DEL SCRIPT