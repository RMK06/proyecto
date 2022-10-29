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
		var datos = {
			metodo: 'validar_correo',
			correo: $('#correo').val(),
			contrasena: $('#contrasena').val(),
		};
		$.ajax({
			url: 'php/login.php',
			type: 'POST',
			data: datos,
			success: function(result){
				if (result == 1) {
					M.toast({html: 'Redirigiendo'});
					$(location).attr('href','vistas/home.php');
				} else if(result == 2) {
					M.toast({html: 'contraseña o correo incorrecto'});
				} else if (result == 3) {
					M.toast({html: 'no existe la base de datos'});
				} else {
					M.toast({html: 'error en la validacion'});
				}
			}
		});
	}
});
//fin
$(document).ready(function(){
	$(".data-table").click(function(){
		let id = $(this).attr('data-id');
		var datos = {
			metodo: 'verUsuarios',
			id: id,
		};
		$.ajax({
			url: '../consultas/usuario.php',
			type: 'POST',
			data: datos,
			success: function(result){
				var Modalelem = document.querySelector('.modal');
				var instance = M.Modal.init(Modalelem);
				instance.open();
				var content = JSON.parse(result);
				let id_usuario = content[0]['id'];
				//console.log(content[0]['id']);
				$(".nombre").val(content[0]['nombre']);
				$(".apellidos").val(content[0]['apellidos']);
				$(".telefono").val(content[0]['celular']);
				var datos1 = {
					metodo: 'verPermisos',
					id_usuario: id_usuario,
				};
				$.ajax({
					url: '../consultas/usuario.php',
					type: 'POST',
					data: datos1,
					success: function(result){
						var content = JSON.parse(result);
						if (content[0]['activos'] == 1 ) {
							$("#Activos").prop('checked', true);
						} else {
							$("#Activos").prop('checked', false);
						} if (content[0]['activos_asignados'] == 1) {
							$("#Asignados").prop('checked', true);
						} else {
							$("#Asignados").prop('checked', false);
						}  if (content[0]['empleados'] == 1) {
							$("#Colaboradores").prop('checked', true);
						} else {
							$("#Colaboradores").prop('checked', false);
						} if (content[0]['historial'] == 1) {
							$("#Historial").prop('checked', true);
						} else {
							$("#Historial").prop('checked', false);
						} if (content[0]['reportes'] == 1) {
							$("#Reportes").prop('checked', true);
						} else {
							$("#Reportes").prop('checked', false);
						} if (content[0]['administrador'] == 1) {
							$("#Administrador").prop('checked', true);
						} else {
							$("#Administrador").prop('checked', false);
						}
						
						//$("#Asignados").prop('checked', false);
	
					}
				});

			}
		});
	 });
  })

//agregar movimiento
$(".agregarMov").click(function(){
	var id_activo = $(this).attr('data-id');
	$("#idActivo").val(id_activo);
	$("#devolucion").css('display','none');
	$("#detalles").css('display','none');
	$("#cambioActivo").css('display','none');
	var Modalelem = document.querySelector('.modal');
	var instance = M.Modal.init(Modalelem);
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
	var id_activo = $("#idActivo").val();;
	var data = {
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
	//console.log(data);
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
		let pass2 = $('[name=pass2]');
		let valor1 = pass1.val();
		let valor2 = pass2.val();

		$(valor1).change(function() {
			console.log(valor1);
		});
		
		$('#actualizarBtn').click(function() {
			
		});
			$('#actualizar_usuario_btn').click(function() {
				console.log(123);
				var pass1 = $('#repeticion').val()
				var pass2 = $('#contrasena').val()
				
				var data = {
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
						//console.log(result);
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
			var opcion = confirm("¿Esta seguro que desea eliminar este Usuario?");
			if (opcion == true) {
				let id = $(this).attr('data-id');
				var data = {
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
		var opcion = confirm("¿Esta seguro que desea Asignar Este activo?");
		if (opcion == true) {
			var data = {
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
		
		//console.log($('#fecha_inicio').val());
	});

//colaboradores
	$('#colaboradores').click(function() {
		$(location).attr('href','colaboradores.php');
		//$('#colaboradores').css('background', '#7d60f5');
	});

//activos
	
	$('.icono-ver-mas').click(function(){
		id_activo = $(this).attr('data-id');
		var datos = {
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
				$('.activar').parent().find('label').addClass('active');
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
	var datos = { 
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
var btn_salir = 0;
	$('.salir').click(function() {
		if (btn_salir == 0) {
			btn_salir = 1;
			M.toast({html: 'Cargando'});
			var datos = {
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
 document.addEventListener('DOMContentLoaded', function() {
    let elems = document.querySelectorAll('.sidenav');
    let instances = M.Sidenav.init(elems);
  });
	 // Obtener una referencia al elemento canvas del DOM
	var $grafica = document.querySelector("#grafica");
	// Las etiquetas son las que van en el eje X. 
	var etiquetas = ["Enero", "Febrero", "Marzo", "Abril"]
	// Podemos tener varios conjuntos de datos. Comencemos con uno
	let datosVentas2020 = {
    	label: "Ventas por mes",
    	data: [5000, 1500, 8000, 5102], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    	backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
    	borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
    	borderWidth: 1,// Ancho del borde
	};
	Chart($grafica, {
    	type: 'bar',// Tipo de gráfica
    	data: {
        	labels: etiquetas,
       		 datasets: [
            datosVentas2020,
            // Aquí más datos...
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        },
    }
});
	// Obtener una referencia al elemento canvas del DOM
	var $gra = document.querySelector("#gra");
	// Las etiquetas son las que van en el eje X. 
	var eti = ["Enero", "Febrero", "Marzo", "Abril"]
	// Podemos tener varios conjuntos de datos. Comencemos con uno
	var datos2020 = {
    	label: "Ventas por mes",
    	data: [4000, 1900, 8000, 5102], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de eti
    	backgroundColor: 'rgba(60, 162, 235, 0.2)', // Color de fondo
    	borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
    	borderWidth: 1,// Ancho del borde
};
new Chart($gra, {
    type: 'line',// Tipo de gráfica
    data: {
        labels: eti,
        datasets: [
            datos2020,
            // Aquí más datos...
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        },
    }
});
// Obtener una referencia al elemento canvas del DOM
var $graf = document.querySelector("#graf");
// Las etiquetas son las porciones de la gráfica
var etique = ["Ventas", "Donaciones", "Trabajos"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
var datosIngresos = {
    data: [1500, 400, 2000, 7000], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etique
    // Ahora debería haber tantos background colors como datos, es decir, para este ejemplo, 4
    backgroundColor: [
        'rgba(163,221,203,0.2)',
        'rgba(232,233,161,0.2)',
        'rgba(230,181,102,0.2)',
        'rgba(229,112,126,0.2)',
    ],// Color de fondo
    borderColor: [
        'rgba(163,221,203,1)',
        'rgba(232,233,161,1)',
        'rgba(230,181,102,1)',
        'rgba(229,112,126,1)',
    ],// Color del borde
    borderWidth: 1,// Ancho del borde
};
new Chart($graf, {
    type: 'pie',// Tipo de gráfica. Puede ser dougnhut o pie
    data: {
        labels: etique,
        datasets: [
            datosIngresos,
            // Aquí más datos...
        ]
    },
});

$(document).ready(function() {
	$('#administrador').click(function() {
		M.toast({html: 'Cargando'});
		$('.panel').html('');
		var datos = {
			metodo : 'v_ver_bloqueadas',
			vista : 'yes',
		};
		$.ajax({
			url: "php/administrador.php",
			async: true,
			type: 'POST',
			data: datos,
			success: function(result) {
				$('.panel').html(result);
				M.Toast.dismissAll();
				$('.modal').modal();
				//clicks
				$('.ver_usuarioIcon').click(ver_usuarioIcon);
		}
	});
});
    
$('#calendario').click(function() { 
        
        M.toast({html: 'Cargando'});
        $('panel').html('');
        var datos = {
            metodo : 'v_calendario',
            vista : 'yes',
        };
        $.ajax({
            url: "php/calendario.php",
            async: true,
            type: 'POST',
            data: datos,
            success: function(result) {
                $('#panel').html(result);
                M.Toast.dismissAll();
                $('.tooltipped').tooltip();
            }
        });
    
    });
    $('#correo').on('click', function(){
        $.ajax({
            type: "POST",
            url: "php/inicio.php",
            success: function(response) {
                $('#panel').html(response);
            }
        });
    });
    $('#usuarios').on('click', function(){
        $.ajax({
            type: "POST",
            url: "php/usuarios.php",
            success: function(response) {
                $('#panel').html(response);
            }
        });
    });
});



