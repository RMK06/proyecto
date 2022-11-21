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
		$( '#permisos_especiales' ).on( 'click', function() {
		    if( $(this).is(':checked') ){
		        // Hacer algo si el checkbox ha sido seleccionado
		        $("#permisos_especiales_formulario").css('display','block');
		    } else {
		        // Hacer algo si el checkbox ha sido deseleccionado
		        $("#permisos_especiales_formulario").css('display','none');
		    }
		});
	})

	$(document).ready(function () {
		//actualizar administrador
		let pass1 = $('[name=pass1]');
		let valor1 = pass1.val();

		$(valor1).change(function() {
			console.log(valor1);
		});
		
		$('#actualizarBtn').click(function() {
			alert(123);
		});
			$('#actualizar_usuario_btn').click(function() {
				console.log(123);
				let pass1 = $('#repeticion').val()
				
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
					pass: pass1,
					activos: $('#activos:checked').val()?1:0,
					activos_asigandos: $('#activos_asigandos:checked').val()?1:0,
					empleados: $('#empleados:checked').val()?1:0,
					historial: $('#historial:checked').val()?1:0,
					usuarios: $('#usuarios:checked').val()?1:0,
					reportes: $('#reportes:checked').val()?1:0,
					Pendientes: $('#Pendientes:checked').val()?1:0,
					agregarUsuarios: $('#agregarUsuarios:checked').val()?1:0,
				
				};
				$.ajax({
					url: "../consultas/usuario.php",
					type: 'POST',
					metodo : 'agregar_usuario',
					data: data,
					success: function(result) {
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
				
				
				
			});
		//eliminar usuario
		$('.eliminar_usuario').click(function(){
			let opcion = confirm("¿Esta seguro que desea eliminar este Usuario?");
			if (opcion == true) {
				let id = $(this).attr('data-id');
				let data = {
					metodo: 'eliminar_usuario',
					id_usuario: id,
				}
				$.ajax({
					url: "../consultas/usuario.php",
					type: 'POST',
					data: data,
					success: function(result) {
						console.log(result);
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
	//asignar activos
	$('#btn_asignar_activo').click(function() {
		let opcion = confirm("¿Esta seguro que desea Asignar Este activo?");
		if (opcion == true) {
			let data = {
				metodo: 'asignar_activo',
				activo: $('#idActivo').val(),
				usuario: $('#idUsuario').val(),
				observaciones: $('#texDetalles').val(),
				cantidad: $('#cantidadInv').val(),
				ubicacion: $('#ubicacionInv').val(),
				fecha_incio: $('#fecha_inicio').val(),
				fecha_fin: $('#fecha_fin').val(),
			}
			$.ajax({
				url: "../consultas/asignar_activo.php",
				type: 'POST',
				data: data,
				success: function(result) {
					console.log(result);
					if (result == 1) {
						M.toast({html: 'Se asigno el activo Correctamente'});
						setTimeout(function(){
							location.reload();
						},2000);
					}
				}
			})
		}
		
	});

//colaboradores
	

//activos
	
	$('.icono-ver-mas').click(function(){
		let id_activo = $(this).attr('data-id');
		let datos = {
			metodo : 'v_actualizar_usuario',
			id: id_activo,
			vista: 'yes',
		};
		$.ajax({
			url: "activos.php",
			type: 'POST',
			data: datos,
			success: function(result) {
				$('#container').html(result);
				$('.modal').modal();
				$('.actilet').parent().find('label').addClass('active');
				$('.modal').modal('open');
				

				console.log(result);
			}
		})
	});



	//pendientes
	$('#pendientes').click(function() {
		$(location).attr('href','pendientes.php');
	});

//reportes
	$('#reportes').click(function() {
		$(location).attr('href','reportes.php');
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
let btn_salir = 0;
	$('.salir').click(function() {
		if (btn_salir == 0) {
			btn_salir = 1;
			M.toast({html: 'Cargando'});
			let datos = {
				metodo : 'btn_salir',
			};
			$.ajax({
				url: "php/usuarios.php",
				async: true,
				type: 'POST',
				data: datos,
				success: function(result) {
					M.Toast.dismissAll();
					if (result == 1) {
						M.toast({html: 'Redirigiendo'});
						setTimeout(function() {
							$(location).attr('href','index.php');
						},1000);
					} else {
						M.toast({html: result});
					}
				}
			});
		}
	});
	$('.notificaciones').click(function(){
		$(".contenido-notificaciones").css('bottom','241px');
		$(".contenido-notificaciones").css('opacity','1');
	});
	$('#cerrar-notificaciones').click(function(){
		$(".contenido-notificaciones").css('bottom','840px');
		$(".contenido-notificaciones").css('opacity','0');

	});
 


    



