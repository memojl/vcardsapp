
// JavaScript Document
function load(page){
	var parametros = {"mode":"ajax","page":page};
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'http://localhost/MisSitios/vcardsapp/modulos/vcard/admin/backend.php?mod=vcard',
		data: parametros,
		beforeSend: function(objeto){
			$("#loader").html("<img src='apps/dashboards/loader.gif'>");
		},
		success:function(data){
			$(".outer_div").html(data);
			$("#loader").html("");
		}
	});
}

$(document).ready(function(){
	// Global Settings
	//console.log('jQuery esta funcionando');
	let edit = false;
	load(1);	
 	//listar();


	function listado(page){
		var parametros = {"mode":"ajax","page":page};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'http://localhost/MisSitios/vcardsapp/modulos/vcard/admin/backend.php?mod=vcard&action=listado',
			data: parametros,
			beforeSend: function(objeto){
				$("#loader").html("<img src='http://localhost/MisSitios/vcardsapp/modulos/vcard/img/loader.gif'>");
			},
			success:function(data){
				$(".outer_div").html(data);
				$("#loader").html("");
			}
		});
	}

	//LISTAR
	/*
	function listar(){
		$.ajax({
			url: 'http://localhost/MisSitios/vcardsapp/modulos/vcard/admin/backend.php?action=list',
			type: 'POST',
			//dataType : 'json',
			success: function(response){
				let tasks=JSON.parse(response);
				let template="";
				
				tasks.forEach(task=>{
        		template += `
                  <tr taskId="${task.ID}">
                  <td>${task.ID}</td>
                  <td>
                  <a href="#" class="task-item">${task.nom}</a>
                  </td>
                  <td>${task.descripcion}</td>
                  <td>
                    <button class="task-delete btn btn-danger">Borrar</button>
                  </td>
                  </tr>
                `
					});
				$("#task").html(template);
			}
		});
	}
	setInterval(listar,30000);*/

	//AGREGAR/EDITAR
	$("#form1").submit(function(e){
		e.preventDefault();
		tinyMCE.triggerSave();
		const postData={
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
user: $("#user").val(),
visible: $("#visible").val(),

		};
		const url = edit === false ? 'http://localhost/MisSitios/vcardsapp/modulos/vcard/admin/backend.php?mod=vcard&ext=admin/index&action=add' : 'http://localhost/MisSitios/vcardsapp/modulos/vcard/admin/backend.php?mod=vcard&ext=admin/index&action=edit';		
		console.log(postData, url);
		$.post(url,postData,function(response){
			console.log("Se ha actualizado el registro.");
			$("#form1").trigger('reset');
			$("#addVcard").modal('hide');
			$("#aviso").html(response).fadeIn("slow").delay(3000).fadeOut("slow");
			load(1);
			//edit = false;
		});
	});

	//editar_form
	/*
	$(document).on('click','.task-item',function(){	
		const element = $(this)[0].parentElement.parentElement;
      	const id = $(element).attr('taskId');
      	$.post('http://localhost/MisSitios/vcardsapp/modulos/vcard/admin/backend.php?action=edit_form', {id}, (response) => {
			console.log(response);
			const task=JSON.parse(response);
      		$("#nom").val(task.nom);
      		$("#des").val(task.descripcion);
      		$("#taskId").val(task.ID);
      		edit = true;
        });		
	});*/

	//BORRAR
	$(document).on('click', '.btn-delete', function () {
      const element = $(this)[0].parentElement.parentElement;const id = $(element).attr('id');
      //console.log(id);
	   Swal.fire({
		  title: "Esta seguro de eliminar esta Tarjeta ("+id+")?",
		  text: "Esta operacion no se puede revertir!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#d33',
		  cancelButtonColor: '#3085d6',
		  confirmButtonText: 'Borrar'
	   }).then((result) => {
		  if (result.value) {
			 //let id = $(this).closest('tr').attr('id'); //capturamos el atributo ID de la fila  
			 //eliminamos la Tarjete de firebase      
			 $.post('http://localhost/MisSitios/vcardsapp/modulos/vcard/admin/backend.php?action=delete', {id}, (response) => {
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
			 url: 'http://localhost/MisSitios/vcardsapp/modulos/vcard/admin/backend.php?action=buscar',
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
                         <h3 class="box-title">Perfil: <b>${task.profile}</b></h3>
                     <span class="controles">${sel}
					 	<a href="http://localhost/MisSitios/vcardsapp/index.php?mod=vcard&ext=admin/index&form=1&action=edit&id=${task.ID}" title="Editar"><i class="fa fa-edit"></i></a> | <span class="btn-delete" title="Borrar" style="cursor:pointer;"><i class="fa fa-trash"></i></span>
                     </span>
                  </div>
                  <div class="box-body">
                     <div class="ima-size">
                        <img src="http://localhost/MisSitios/vcardsapp/modulos/vcard/files/fotos/${task.cover}" class="ima-size img-responsive">
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
		  url: 'http://localhost/MisSitios/vcardsapp/modulos/vcard/admin/backend.php?mod=vcard&action=subir_cover',
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
			 $(".alert-dismissible").delay(1000).fadeOut("slow");
			 console.log("Subido Correctamente");
		  }
	   });
	   //return false;
	});

});//document
