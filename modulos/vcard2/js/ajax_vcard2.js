
// JavaScript Document
function load(page) {
   var parametros = {"mode":"ajax","page":page};
   $("#loader").fadeIn('slow');
   $.ajax({
     url: 'http://localhost/MisSitios/vcardsapp/modulos/vcard2/admin/backend.php?mod=vcard2',
     data: parametros,
     beforeSend: function (objeto) {
       $("#loader").html("<img src='http://localhost/MisSitios/vcardsapp/apps/dashboards/loader.gif'>");
     },
     success: function (data) {
       $(".outer_div").html(data);
       $("#loader").html("");
     }
   });
}

$(document).ready(function () {
	// Global Settings
	//console.log('jQuery esta funcionando');
	let edit = false;
	load(1);
 
	//BOTONES
	/*Boton Agregar*/
	$('.btn-add').click(function () {
		$("#ima").attr('src', 'http://localhost/MisSitios/vcardsapp/modulos/vcard2/fotos/nodisponible1.jpg');
		$("#form1").trigger('reset');
		edit = false;
	});
 
	function listado(page) {
	   var parametros = {"mode":"ajax","page":page};
	   $("#loader").fadeIn('slow');
	   $.ajax({
		  url: 'http://localhost/MisSitios/vcardsapp/modulos/vcard2/admin/backend.php?mod=vcard&action=listado',
		  data: parametros,
		  beforeSend: function (objeto) {
			 $("#loader").html("<img src='http://localhost/MisSitios/vcardsapp/apps/dashboards/loader.gif'>");
		  },
		  success: function (data) {
			 $(".outer_div").html(data);
			 $("#loader").html("");
		  }
	   });
	}
 
	//AGREGAR/EDITAR
	$("#form1").submit(function (e) {
	   e.preventDefault();
	   tinyMCE.triggerSave();
	   const postData = {
         ID: $("#ID").val(),
cover: $("#cover").val(),
profile: $("#profile").val(),
logo: $("#logo").val(),
nombre: $("#nombre").val(),
descripcion: $("#descripcion").val(),
puesto: $("#puesto").val(),
empresa: $("#empresa").val(),
tel: $("#tel").val(),
tel_ofi: $("#tel_ofi").val(),
cell: $("#cell").val(),
email: $("#email").val(),
web: $("#web").val(),
fb: $("#fb").val(),
tw: $("#tw").val(),
lk: $("#lk").val(),
ins: $("#ins").val(),
f_create: $("#f_create").val(),
f_update: $("#f_update").val(),
vcard: $("#vcard").val(),
ID_user: $("#ID_user").val(),
user: $("#user").val(),
visible: $("#visible").val(),

	   };
	   const url = edit === false ? 'http://localhost/MisSitios/vcardsapp/modulos/vcard2/admin/backend.php?mod=vcard&ext=admin/index&action=add' : 'http://localhost/MisSitios/vcardsapp/modulos/vcard2/admin/backend.php?mod=vcard&ext=admin/index&action=edit';
	   console.log(postData, url);
	   $.post(url, postData, function (response) {
		  console.log("Se ha actualizado el registro.");
		  $("#form1").trigger('reset');
		  $("#addVcard").modal('hide');
		  $("#aviso").html(response).delay(1000).slideToggle("slow").delay(3000).slideToggle("slow");
		  load(1);
		  //edit = false;
	   });
	});
 
	//editar_form
	$(document).on('click','.btn-edit',function(){	
		const element = $(this)[0].parentElement.parentElement;const id = $(element).attr('id');
		//let tr = $(this).parents("tr");const Id = tr.attr("id");console.log(Id);
		//const id = $(this).closest('tr').attr('id'); //capturamos el atributo ID de la fila
		console.log(id);
      $.post('http://localhost/MisSitios/vcardsapp/modulos/vcard2/admin/backend.php?action=form_id', {id}, (response) => {
      let tasks=JSON.parse(response);
      let task=tasks[0];
      //console.log(response);console.log(task);
      $('#ID').val(task.ID);
$('#cover').val(task.cover);
$('#profile').val(task.profile);
$('#nombre').val(task.nombre);
$('#puesto').val(task.puesto);
$('#empresa').val(task.empresa);
$('#tel_ofi').val(task.tel_ofi);
$('#cell').val(task.cell);
$('#email').val(task.email);
$('#web').val(task.web);
$('#fb').val(task.fb);
$('#tw').val(task.tw);
$('#lk').val(task.lk);
$('#ins').val(task.ins);
$('#f_create').val(task.f_create);
$('#f_update').val(task.f_update);
$('#ID_user').val(task.ID_user);
$('#visible').val(task.visible);

      const cover = task.cover;
      $("#ima").attr('src', 'http://localhost/MisSitios/vcardsapp/modulos/vcard2/fotos/' + cover);      		
   });
	   edit = true;
	});
  
	//BORRAR
	$(document).on('click', '.btn-delete', function () {
      const element = $(this)[0].parentElement.parentElement;const id = $(element).attr('id');
      //console.log(id);
	   Swal.fire({
		  title: "Esta seguro de eliminar la Tarjeta ("+id+")?",
		  text: "Esta operacion no se puede revertir!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#d33',
		  cancelButtonColor: '#3085d6',
		  confirmButtonText: 'Borrar'
	   }).then((result) => {
		  if (result.value) {
			 //let id = $(this).closest('tr').attr('id'); //capturamos el atributo ID de la fila  
			 //eliminamos la Tarjeta de firebase      
			 $.post('http://localhost/MisSitios/vcardsapp/modulos/vcard2/admin/backend.php?action=delete', {id}, (response) => {
				console.log(response);
				load(1);
			 });
			 Swal.fire('Eliminado!', 'La Tarjeta ha sido eliminado.', 'success')
		  }
	   })
	});
 
	//BUSCAR
	$("#q").keyup(function (e) {
	   if ($("#q").val()) {
		  let q = $("#q").val();
		  $.ajax({
			 url: 'http://localhost/MisSitios/vcardsapp/modulos/vcard2/admin/backend.php?action=buscar',
			 type: 'POST',
			 data: {q},
			 success: function (response) {
				let tasks = JSON.parse(response);
				console.log(response);
				let template = '<div class="box-body">';
				let sel = "";
				tasks.forEach(task => {
				   visible = `${task.visible}`;
				   sel = (visible == 0) ? '<span style="color:#e00;"><i class="fa fa-close" title="Desactivado"></i></span>' : '<span style="color:#0f0;"><i class="fa fa-check" title="Activo"></i></span>';
				   template += `
            <div class="col-md-3 col-xs-12">
               <div class="box box-primary">
                  <div class="box-header with-border" id="${task.ID}" >
                         <h3 class="box-title">C&oacute;digo: <b>${task.profile}</b></h3>
                     <span class="controles">${sel}
                        <span class="btn-edit" data-toggle="modal" data-target="#addVcard" title="Editar"><i class="fa fa-edit"></i></span> | <span class="btn-delete" title="Borrar"><i class="fa fa-trash"></i></span>
                     </span>
                  </div>
                  <div class="box-body">
                     <div class="ima-size">
                        <img src="http://localhost/MisSitios/vcardsapp/modulos/vcard2/fotos/${task.cover}" class="ima-size img-responsive">
                     </div>
                     <div id="title"><strong>${task.nombre}</strong></div>	
                  </div><!-- /.box-body -->
               </div>
            </div>`
				});
				$(".outer_div").html(template + "</div>");
			 }
		  });
	   }
	});
  
	//SUBIR COVER
	$(document).on('click', '#Aceptar', function (e) {
	   e.preventDefault();
	   var frmData = new FormData;
	   frmData.append("userfile", $("input[name=userfile]")[0].files[0]);
	   //console.log('Se cargo Imagen');		
	   $.ajax({
		  url: 'http://localhost/MisSitios/vcardsapp/modulos/vcard2/admin/backend.php?mod=vcard&action=subir_cover',
		  type: 'POST',
		  data: frmData,
		  processData: false,
		  contentType: false,
		  cache: false,
		  beforeSend: function (data) {
			 $("#imagen").html("Subiendo Imagen");
		  },
		  success: function (data) {
			 //$("#form1").trigger("reset");
			 $("#imagen").html(data);
			 $(".alert-dismissible").delay(3000).fadeOut("slow");
			 console.log("Subido Correctamente");
		  }
	   });
	   //return false;
	});

});//document
