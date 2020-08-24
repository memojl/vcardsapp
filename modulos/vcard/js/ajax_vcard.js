
// JavaScript Document
$(document).ready(function () {
	// Global Settings
	//console.log('jQuery esta funcionando');
	let edit = false;
	load(1);
 
	//BOTONES
	/*Boton Agregar*/
	$('.btn-add').click(function () {
		$("#ima").attr('src', './modulos/vcard/fotos/nodisponible1.jpg');
		$("#form1").trigger('reset');
		edit = false;
	});

	function load(page) {
	   var parametros = {
		  "mode": "ajax",
		  "page": page
	   };
	   $("#loader").fadeIn('slow');
	   $.ajax({
		  url: 'modulos/vcard/admin/backend.php?mod=vcard',
		  data: parametros,
		  beforeSend: function (objeto) {
			 $("#loader").html("<img src='apps/dashboards/loader.gif'>");
		  },
		  success: function (data) {
			 $(".outer_div").html(data);
			 $("#loader").html("");
		  }
	   });
	}
 
	function listado(page) {
	   var parametros = {
		  "mode": "ajax",
		  "page": page
	   };
	   $("#loader").fadeIn('slow');
	   $.ajax({
		  url: 'modulos/vcard/admin/backend.php?mod=vcard&action=listado',
		  data: parametros,
		  beforeSend: function (objeto) {
			 $("#loader").html("<img src='apps/dashboards/loader.gif'>");
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
nombre: $("#nombre").val(),
puesto: $("#puesto").val(),
email: $("#email").val(),
cell: $("#cell").val(),
tel: $("#tel").val(),
tel_ofi: $("#tel_ofi").val(),
empresa: $("#empresa").val(),
web: $("#web").val(),
fb: $("#fb").val(),
lk: $("#lk").val(),
ins: $("#ins").val(),
f_create: $("#f_create").val(),
f_update: $("#f_update").val(),
vcard: $("#vcard").val(),
user: $("#user").val(),
visible: $("#visible").val(),

	   };
	   const url = edit === false ? 'modulos/vcard/admin/backend.php?mod=vcard&ext=admin/index&action=add' : 'modulos/vcard/admin/backend.php?mod=vcard&ext=admin/index&action=edit';
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
		//const element = $(this)[0].parentElement.parentElement;const id = $(element).attr('id');
		//let tr = $(this).parents("tr");const Id = tr.attr("id");console.log(Id);
		const id = $(this).closest('tr').attr('id'); //capturamos el atributo ID de la fila
		console.log(id);
      $.post('modulos/vcard/admin/backend.php?action=form_id', {id}, (response) => {
      let tasks=JSON.parse(response);
      let task=tasks[0];
      //console.log(response);console.log(task);
      $('#ID').val(task.ID);
$('#cover').val(task.cover);
$('#profile').val(task.profile);
$('#nombre').val(task.nombre);
$('#puesto').val(task.puesto);
$('#email').val(task.email);
$('#cell').val(task.cell);
$('#tel').val(task.tel);
$('#tel_ofi').val(task.tel_ofi);
$('#empresa').val(task.empresa);
$('#web').val(task.web);
$('#fb').val(task.fb);
$('#lk').val(task.lk);
$('#ins').val(task.ins);
$('#f_create').val(task.f_create);
$('#f_update').val(task.f_update);
$('#vcard').val(task.vcard);
$('#visible').val(task.visible);

      const cover = task.cover;
      $("#ima").attr('src', './modulos/vcard/fotos/' + cover);      		
   });
	   edit = true;
	});
  
	//BORRAR
	$(document).on('click', '.btn-delete', function () {
	   Swal.fire({
		  title: "Esta seguro de eliminar el producto?",
		  text: "Esta operacion no se puede revertir!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#d33',
		  cancelButtonColor: '#3085d6',
		  confirmButtonText: 'Borrar'
	   }).then((result) => {
		  if (result.value) {
			 let id = $(this).closest('tr').attr('id'); //capturamos el atributo ID de la fila  
			 //eliminamos el producto de firebase      
			 $.post('modulos/vcard/admin/backend.php?action=delete', {id}, (response) => {
				console.log(response);
				load(1);
			 });
			 Swal.fire('Eliminado!', 'El producto ha sido eliminado.', 'success')
		  }
	   })
	});
 
	//BUSCAR
	$("#q").keyup(function (e) {
	   if ($("#q").val()) {
		  let q = $("#q").val();
		  $.ajax({
			 url: 'modulos/vcard/admin/backend.php?action=buscar',
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
			 <div class="box-header with-border">
					<h3 class="box-title">C&oacute;digo: <b>${task.profile}</b></h3>
				<span class="controles">${sel}
				   <!--a href="http://localhost/MisSitios/vcardsapp/index.php?mod=vcard&ext=admin/index&form=1&action=edit&id=${task.ID}" title="Editar"><i class="fa fa-edit"></i></a> | <a href="#" taskid="${task.ID}" class="task-delete" title="Borrar"><i class="fa fa-trash"></i></a-->
				   <span class="btn-edit" data-toggle="modal" data-target="#addVcard" title="Editar"><i class="fa fa-edit"></i></span> | <span class="btn-delete" title="Borrar"><i class="fa fa-trash"></i></span>
				</span>
			 </div>
			 <div class="box-body">
				<div class="ima-size">
				   <img src="http://localhost/MisSitios/vcardsapp/modulos/vcard/fotos/${task.cover}" class="ima-size img-responsive">
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
		  url: 'modulos/vcard/admin/backend.php?mod=vcard&action=subir_cover',
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
