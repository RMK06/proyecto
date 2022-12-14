//inicializar jquery
$(document).ready(function(){
	$('.modal').modal();
	$('select').formSelect();
	$('.tooltipped').tooltip();
	$('.tabs').tabs();
	$('.collapsible').collapsible();
	$('.tap-target').tapTarget();
});
  
//iniciar sesion
$('.iniciar_sesion').click(function() {
	if ($('#correo').val() == "" || $('#correo').val() == " ") { 
		M.toast({html: 'Colocar un correo Valido'});
		$('#correo').focus();
	} 	else if ($('#contrasena').val() == '' || $('#contrasena').val() == ' ') {
			M.toast({html: 'Colocar una contraseña valida'});
			$('#contrasena').focus();
		}
	else {
		let datos = {
			correo: $('#correo').val(),
			contrasena: $('#contrasena').val(),
		};
		$.ajax({
			url: 'controllers/Login.php',
			type: 'POST',
			data: datos,
			success: function(result){
				if (result == 1) {
					M.toast({html: 'Redirigiendo'});
					$(location).attr('href','views/home.php');
				} else if(result == 2) {
					M.toast({html: 'contraseña o correo incorrecto'});
				} else if (result == 3) {
					M.toast({html: 'no existe la base de datos'});
				} else if (result == 4) {
					M.toast({html: 'Error en la validacion'});
				}
			}
		});
	}
});

$(".agregarMov").click(function(){
	let id_activo = $(this).attr('data-id');
	$("#idActivo").val(id_activo);
	$("#devolucion").css('display','none');
	$("#detalles").css('display','none');
	$("#cambioActivo").css('display','none');
	let Modalelem = document.querySelector('.modal');
	let instance = M.Modal.init(Modalelem);
	instance.open();
	$("#selectMov").change(function(){
		if ($("#selectMov").val() == 1) {
			$("#devolucion").css('display','block');
			$("#detalles").css('display','none');
		} else {
			$("#devolucion").css('display','none');
			$("#detalles").css('display','block');
		}
	});
	$("#cambio").change(function(){
		if ($("#cambioSel").val() == 1) {
			$("#cambioActivo").css('display','block');
		} else if ($("#cambioSel").val() == 2) {
			$("#cambioActivo").css('display','none');
		}
	});
	
});

$(".mAgregar").click(function() {
	let id_activo = $("#idActivo").val();;
	let data = {
		metodo: 'agregar_mov',
		id: id_activo,
		selectMov: $("#selectMov").val(),
		mDevolucion: $("#mDevolucion").val(),
		MotDetalles: $("#MotDetalles").val(),
		estadoAcivo: $("#estadoAcivo").val(),
		cambioSel: $("#cambioSel").val(),
		estadoActivo: $("#estadoActivo").val(),
		obActivo: $("#obActivo").val(),
		motDetalles: $("#motDetalles").val(),
		detalles: $("#detalles").val(),
		detallesAct: $("#detallesAct").val(),
		activoCambio: $("#activoCambio").val(),
		ObsActi: $("#ObsActi").val(),
	};
	$.ajax({
		url: "../consultas/activos.php",
		type: 'POST',
		data: data,
		success: function(result) {
			console.log(result);
		}
	})
});



//usuarios
	$('#administrador').click(function() {
		$('.modal').modal();
		M.toast({html: 'Cargando'});
		$(location).attr('href','administrador.php');
		$('.modal').modal('open');
	});

	
	$(document).ready(function () {
		$("#permisos_especiales_formulario").css('display','none');
		$( '#permisos_especiales' ).click(function() {
		    if( $(this).is(':checked') ){
		        $("#permisos_especiales_formulario").css('display','block');
		    } else {
		        $("#permisos_especiales_formulario").css('display','none');
		    }
			
		});
		$('#correo_usuario').change(function(){
			let data = {
				correo: $('#correo_usuario').val(),
			}
			$.ajax({
				url: '../controllers/administradorC.php',
				type: 'POST',
				data: data,
				success: function(result) {
					if (result == 1) {
						M.toast({html: 'Ya hay un correo creado'});
						$('#correo_usuario').focus();
						$('#correo_usuario').val('');
					}
				}
			})
		})
		
		$('#cedula_usuario').change(function(){
			let data = {
				numero_usuario: $('#cedula_usuario').val(),
			}
			$.ajax({
				url: '../controllers/administradorC.php',
				type: 'POST',
				data: data,
				success: function(result) {
					if (result == 1) {
						M.toast({html: 'Ya hay una Cedula con este numero'});
						$('#cedula_usuario').focus();
						$('#cedula_usuario').val('');
					}
				}
			})
		})

		$('#actualizar_usuario_btn').click(function(){
			if ($('#cedula_usuario').val() == "" || $('#cedula_usuario').val() == " ") {
				M.toast({html: 'Llenar Campo de numero de cedula'});
				$('#cedula_usuario').focus();
			} else if($('#correo_usuario').val() == "" || $('#correo_usuario').val() == " ") {
				M.toast({html: 'Llenar Campo de numero de Correo'});
				$('#correo_usuario').focus();
			}else if($('#nombre_usuario').val() == "" || $('#nombre_usuario').val() == " ") {
				M.toast({html: 'Se require el nombre'});
				$('#nombre_usuario').focus();
			}else {
				datausuarios();
			}
		});

		function datausuarios() {
			let data = {
				metodo : 'agregar_usuario',
				permisos_especiales: $('#permisos_especiales:checked').val()?1:0,
				nombre_usuario: $('#nombre_usuario').val(),
				apellido_usuario: $('#apellido_usuario').val(),
				numero_usuario: $('#numero_usuario').val(),
				tipo_identificacion: $('#tipo_identificacion').val(),
				cedula_usuario: $('#cedula_usuario').val(),
				sexo: $('#sexo').val(),
				correo_usuario: $('#correo_usuario').val(),
				direccion_usuario: $('#direccion_usuario').val(),
				barrio_usuario: $('#barrio_usuario').val(),
				localidad_usuario: $('#localidad_usuario').val(),
				cargo: $('#selectCargo').val(),
				activos: $('#activos:checked').val()?1:0,
				activos_asigandos: $('#activos_asigandos:checked').val()?1:0,
				empleados: $('#empleados:checked').val()?1:0,
				pass: $('#contrasena').val(),
				historial: $('#historial:checked').val()?1:0,
				usuarios: $('#usuarios:checked').val()?1:0,
				reportes: $('#reportes:checked').val()?1:0,
				Pendientes: $('#Pendientes:checked').val()?1:0,
				agregarUsuarios: $('#agregarUsuarios:checked').val()?1:0,
			};
			$.ajax({
				url: "../controllers/administradorC.php",
				type: 'POST',
				metodo : 'agregar_usuario',
				data: data,
				success: function(result) {
					console.log(result);
					if (result == 1) {
						M.toast({html: 'Agregado Correctamente'});
						setTimeout(function(){
							location.reload();
						},2000);
					}else if(result == 2) {
						M.toast({html: 'Ususario con permisos Especiales ha sido creado Correctamente'});
						setTimeout(function(){
							location.reload();
						},2000);
					}else {
						M.toast({html: 'No se agrego, Revise los datos nuevamente'});
					}

				}
			})
			
			
			
		};
		//eliminar usuario
		$('.eliminar_usuario').click(function(){
			let opcion = confirm("¿Esta seguro que desea eliminar este Usuario?");
			if (opcion == true) {
				let id = $(this).attr('data-id');
				let data = {
					id_usuario: id,
				}
				$.ajax({
					url: "../controllers/administradorC.php",
					type: 'POST',
					data: data,
					success: function(result) {
						if (result == 1) {
							M.toast({html: 'Eliminado Correctamente'});
							//setTimeout(function(){
								location.reload();
							//},2000);
						}else {
							M.toast({html: 'No se logo eliminar'});
						}

					}
				})
			}
			
		})
			
	})

	$('#actualizarBtn').click(function() {
		let idUsuario = $(this).attr("data-id");
		let data = {
			id: idUsuario,
			nombre_usuario: $('#nombre_usuario').val(),
			apellido_usuario: $('#apellido_usuario').val(),
			numero_usuario: $('#numero_usuario').val(),
			tipoDocumento: $('#tipoDocumento').val(),
			sexo: $('#sexo').val(),
			correo_usuario: $('#correo_usuario').val(),
			direccion_usuario: $('#direccion_usuario').val(),
			barrio_usuario: $('#barrio_usuario').val(),
			localidad_usuario: $('#localidad_usuario').val(),
			cargo_select: $('#cargo_select').val(),
			estado: $('#estado').val(),
			cedula_usuario: $('#cedula_usuario').val(),
			activos: $('#activos:checked').val()?1:0,
			activos_asigandos: $('#activos_asigandos:checked').val()?1:0,
			empleados: $('#empleados:checked').val()?1:0,
			usuarios: $('#usuarios:checked').val()?1:0,
			reportes: $('#reportes:checked').val()?1:0,
		}
		$.ajax({
			url: "../controllers/colaboradoresC.php",
			type: 'POST',
			data: data,
			success: function(result) {
				if (result == 1) {
					M.toast({html: 'El usuario se ha editado correectamente'});
				} else if(result == 2) {
					M.toast({html: 'El usuario No se logro editar'});
				}
				
			}
		})
	});

	$('.eliminar_colaborador').click(function(){
		let idUsuario = $(this).attr("data-id");
		let data = {
			id: idUsuario,
		}
		$.ajax({
			url: "../controllers/colaboradoresC.php",
			type: 'POST',
			data: data,
			success: function(result) {
				if (result == 1) {
					M.toast({html: 'El usuario se ha eliminado correectamente'});
					location.reload();
				} else if(result == 2) {
					M.toast({html: 'El usuario No se logro eliminar'});
				}
				
			}
		})
	});

	$('#btnActivo').click(function(){
		if ($('#Nombre').val() == '' || $('#Nombre').val() == ' ') {
			M.toast({html: 'Campo Obligatorio'});
			$('#Nombre').focus();
		}else if ($('#Serial').val() == '' || $('#Serial').val() == ' ') {
			M.toast({html: 'Campo Obligatorio'});
			$('#Serial').focus();
		} else {
			let data = {
				Nombre: $('#Nombre').val(),
				SerialActivo: $('#Serial').val(),
				Placa: $('#Placa').val(),
				Tipo: $('#Tipo').val(),
				Marca: $('#Marca').val(),
				Precio: $('#Precio').val(),
				estado: $('#estado').val(),
				Detalles: $('#Detalles').val(),
			}
			$.ajax({
				url: "../controllers/activosC.php",
				type: 'POST',
				data: data,
				success: function(result) {
					if (result == 1) {
						M.toast({html: 'Se ha agregado el Activo correctamente'});
						location.reload();
					} else if(result == 2) {
						M.toast({html: 'No se logro agregar el activo'});
					}
				}
			})
		}
	});
	
	$('.borrarActivo').click(function(){
		
		let opcion = confirm("¿Esta seguro que desea eliminar este Usuario?");
			if (opcion) {
				let idActivo = $(this).attr("data-id");
				let data = {
					id_activo: idActivo,
				}
				$.ajax({
					url: "../controllers/activosC.php",
					type: 'POST',
					data: data,
					success: function(result) {
						if (result == 1) {
							M.toast({html: 'Se elimino el Activo'});
							location.reload();
						} else if(result == 2) {
							M.toast({html: 'No se logro elimnar el activo'});
						}
					}
				})
			}
		
	});
	
	$('.icono-ver-mas').click(function(){
		$('#Detalles').parent().find('label').addClass('active');
		let id = $(this).attr("data-id");
		let data = {
			idActivo: id,
		}
		$.ajax({
			data: data,
			type: "POST",
			url: "../controllers/activosC.php",
			success:function(result) {
				let content = JSON.parse(result);
				$("#idActi").val(content[0]['id']);
				$("#Nombre").val(content[0]['nombre']);
				$("#Serial").val(content[0]['serial']);
				$("#Placa").val(content[0]['placa']);
				$("#Tipo").val(content[0]['tipo']);
				$("#Marca").val(content[0]['marca']);
				$("#Precio").val(content[0]['precio']);
				$("#Detalles").val(content[0]['detalles']);
				let Modalelem = document.querySelector('.modal');
				let instance = M.Modal.init(Modalelem);
				instance.open();
				$('#actualizarActivo').click(function(){
					let activoId = $("#idActi").val();
					let data = {
						Activo: activoId,
						Nombre: $("#Nombre").val(),
						Serial: $("#Serial").val(),
						Placa: $("#Placa").val(),
						Tipo: $("#Tipo").val(),
						Marca: $("#Marca").val(),
						Precio: $("#Precio").val(),
						Detalles: $("#Detalles").val(),
					}
					$.ajax({
						url: "../controllers/activosC.php",
						type: 'POST',
						data: data,
						success: function(result) {
							if (result == 1) {
								M.toast({html: 'Se ha actualizado el Activo'});
							} else if(result == 2) {
								M.toast({html: 'No se logro Actualizar el activo'});
							}
							$('#close').click(function(){
								location.reload();
							});
							$(document).on('keydown', function(event) {
								if (event.key == "Escape") {
									location.reload();
								}
							});
						}
					})
				});
			}
		});
	});

//cerrar session
	$('.salir').click(function() {
	let datos = { 
		metodo: 'cerrar',
	};
	$.ajax({
		url: "../php/login.php",
		data: datos,
		type: 'post',
		success: function(result){
			window.location.href="../index.php";
	}});
});
//fin

 


    



