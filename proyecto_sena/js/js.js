//graficas
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    
    });
	    // Obtener una referencia al elemento canvas del DOM
	   var $grafica = document.querySelector("#grafica");
	   // Las etiquetas son las que van en el eje X. 
	   var etiquetas = ["Enero", "Febrero", "Marzo", "Abril"]
	   // Podemos tener varios conjuntos de datos. Comencemos con uno
	   var datosVentas2020 = {
    	   label: "Ventas por mes",
    	   data: [5000, 1500, 8000, 5102], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    	   backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
    	   borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
    	   borderWidth: 1,// Ancho del borde
	   };
	       new Chart($grafica, {
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
//cambiar de ventanas
$(document).ready(function() {
    $('#inicio').on('click',function(){
        $.ajax({
            type: "POST",
            url: "php/inicio.php",
            success: function(response){
                $('#panel').html(response);
                var elems = document.querySelectorAll('.tooltipped');
                var instances = M.Tooltip.init(elems);
                exitDelay: 0;
            }
        });
    });

    $('#calendario').on('click', function(){
        $.ajax({
            type: "POST",
            url: "php/calendario.php",
            success: function(response) {
                $('#panel').html(response);
            }
        });
    });

    $('#correo').on('click', function(){
        $.ajax({
            type: "POST",
            url: "php/correo.php",
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

                //primero modulo
                $('#usuario').on('click', function(){
                     $.ajax({
                         type:"POST",
                         url: "php/usu.php",
                         success:function(response){
                             $('#panel2').html(response);
                         }
                     });
                 });
                //segundo modulo
                 $('#agregar').on('click', function(){
                     $.ajax({
                         type:"POST",
                         url: "php/agregar.php",
                         success: function(response){
                             $('#panel2').html(response);

                             document.addEventListener('DOMContentLoaded', function() {
                               var elems = document.querySelectorAll('select');
                               var instances = M.FormSelect.init(elems, options);
                             });
                         }
                     });
                 });
            }
        });
    });
    $('#inventario').on('click', function(){
        $.ajax({
            type:"POST",
            url: "php/inventario.php",
            success:function(response){
                $('#panel').html(response);
            }
        });
    });
    $('#activos').on('click', function(){
        $.ajax({
            type:"POST",
            url: "php/activos.php",
            success: function(response){
                $('#panel').html(response);
            }
        });
    });
    $('#agregar').on('click', function(){
        $.ajax({
            type:"POST",
            url: "php/agregar.php",
            success: function(response){
                $('#tarjeta5').html(response);
            }
        });
    });
});

//icnono de salir
 document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems);
    exitDelay: 0;
      });

 //select

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });