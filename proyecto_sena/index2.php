<!DOCTYPE html>
<html lang>
<head>
	<title>Bienvenido</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">  
	<link rel="stylesheet" type="text/css" href="estilos/estilos2.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	 <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
	 <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	

</head>
<body">

	
  	<ul id="slide-out" class="sidenav sidenav-fixed">
    	<li><div class="user-view">
    	  <div class="background">
        
        	<video src="img/INVENTORY CONTRO CO (1).mp4" autoplay muted loop width="100%" height="100%" ></video>

      </div>
      	<a href="#user"><img class="circle" src="https://images.pexels.com/photos/6533803/pexels-photo-6533803.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"></a>
      	<a href="#name"><span class="white-text name">Camilo Mora</span></a>
      	<a href="#email"><span class="white-text email">camilo@camilo.com</span></a>
     	</div></li>
    	
    	<li><a class="boton white-text" id="inicio"> <i class="material-icons" style="color: white">home</i>Home</a></li>
   
    	
    	<li><a class="subheader">Aplicaciones</a></li>
    	<li><a class="waves-light boton white-text" id="calendario"> <i class="material-icons" style="color: #5DADE2">events</i>Calendario</a></li>
    	<li><a class="boton white-text" id="usuarios"><i class="material-icons" style="color: #58D68D">people</i>Usuarios</a></li>
    	<li><a class="white-text" id="correo"> <i class="material-icons" style="color: #E59866">email</i>Mensajes</a></li>
    	<li><a class="white-text" id="inventario"> <i class="material-icons" style="color: #F4D03F">inventory</i>Inventario</a></li>
    	<li><a class="white-text" id="activos"> <i class="material-icons" style="color: #D98880">computer</i>Activos</a></li>
    
   	    <li><a class="subheader">Ajustes</a></li>
        <li><a class="white-text" href="#!"> <i class="material-icons" style="color: white;">settings</i>Configuracion</a></li>
        <li><a class="white-text" href="#!"> <i class="material-icons" style="color: white;">lock</i>Ip bloquedas</a></li>
        <li><a class="white-text" href="#!"> <i class="material-icons" style="color: white;">history</i>Historial</a></li>
     
         
  </ul>
         <a href="#" data-target="slide-out" class="sidenav-trigger hide-on-large-only"><i class="material-icons">menu</i></a>
 	

  <div class="panel" id="panel">
  	<div class="row">
        	<div class="col l12 m12 s12">
        		<div class="col l12">
        			<p class="center white-text">Inicio<a href="#!" class=" waves-circle  btn-floating secondary-content tooltipped" data-position="left" data-tooltip="Cerrar sesion">
                        <i class="material-icons">exit_to_app</i>
                    </a></p>
                  
                   
        		</div>
        	
        	</div>
      

        	<div class="row">
        		
        		<div class="col l4 m4 s12">
        				<div class="col l12 m12 s12 grey lighten-3 tarjeta1">	
        					<p>Activos en uso</p>

        					<span>18<i class="material-icons" style="color: #239B56;">arrow_drop_up</i></span>
        				</div>
        			</div>
        			<div class="col l4 m4 s6">
        				<div class="col l12 m12 s12 grey lighten-3 tarjeta1">	
        					<p>Total trabajadores</p>
        					<span>125<i class="material-icons" style="color: #239B56;">arrow_drop_up</i></span>
        				</div>
        			</div>
        			<div class="col l4 m4 s6">
        				<div class="col l12 m12 s12 grey lighten-3 tarjeta1">	
        					<p>Cambios en la pagina</p>
        					<span>18<i class="material-icons" style="color: #239B56;">arrow_drop_up</i></span>
        				</div>
        			</div>
        	</div>
   		
        		<div class="row">
        		<div class="col l4 m5 s12">
        			<div class="col l12 s12 m12  grey lighten-3 tarjeta2">
        				 <canvas id="grafica"></canvas>
    					<script src="js/js.js"></script>				
        			</div>
        		</div>
        		
        		<div class="col l4 m4 s12">
        			<div class="col l12 m12 s12 grey lighten-3 tarjeta2">
        				
        				 <canvas id="gra"></canvas>
    					<script src="js/js.js"></script>
        			
					
        			</div>
        		</div>
        		<div class="col l4 s3 m3 s12">
        			<div class="col l12 m12 s12 grey lighten-3 tarjeta2">
        				 <canvas id="graf"></canvas>
    					<script src="js/js.js"></script>
					
        			</div>
        		</div>
        	</div>
        	
        				
        			

        		<div class="row">
        			<div class="col l8 m12 s12">
        				<div class="col l12 m12 grey lighten-3 tarjeta3">
        					<span>Historial</span>
						 <table>
        					<thead>
         					 <tr>
            				  <th>ID</th>
            				  <th>Fecha</th>
             					 <th>Accion</th>
         					 </tr>
    				 	   </thead>
					
    				 	 	  <tbody>
    				 	   		 <tr>
    				 	   		   <td>1</td>
    				 	   		   <td>7/04/2021 1:57pm</td>
    				 	   		   <td>Creo usuario con correo juan@juan.com</td>
    				 	   		 </tr>
    				 	   		 <tr>
    				 	   		   <td>2</td>
    				 	   		   <td>7/04/2021 1:57pm</td>
    				 	   		   <td>Borro usuario con correo: juan@juan.com</td>
    				 	   		 </tr>
    				 	   		 <tr>
    				 	   		   <td>3</td>
    				 	   		   <td>7/04/2021 2:57pm</td>
    				 	   		   <td>juan hizo modificicaciones en la pagina</td>
    				 	    	 </tr>
    				 	    	  <tr>
    				 	   		   <td>4</td>
    				 	   		   <td>7/04/2021 3:00pm</td>
    				 	   		   <td>Se ha creado el usuario con el correo: david@david.com</td>
    				 	    	 </tr> <tr>
    				 	   		   <td>5</td>
    				 	   		   <td>7/04/2021 3:30pm</td>
    				 	   		   <td>Se ha agregado una nueva imagen a la pagina</td>
    				 	    	 </tr>
    				   	 </tbody>
    				  </table>
        			</div>
        		</div>
        		<div class="col l4 m12 s12">
        			<div class="col l12 m12 s12 grey lighten-3 tarjeta4">
        				
        				<div class="col l12 s12 m12">
        					<div class="row">
        					<div class="col l12 m12">
        						<p class="center">Usuarios en linea</p>
        					</div>
        					<div class="col l12 s12 m7 ">
 							  <div class="card  center" style="border-radius: 20px;">
 							  	
 							    <div class="card-stacked">
 							      <div class="card-content blue" style="border-radius: 20px;">
 							         <i class="material-icons" style="color: white; font-size: 45px;">account_circle</i>
 							      </div>
 							      <div class="card-action">
 							       <p>Usuarios en linea</p>
 							       <p>3</p>
 							      </div>
 							    </div>
 							  </div>
 							</div>
        				</div>
        				</div>
					
        			
        			</div>
        		</div>
        	</div>
        </div>	     
    </div>


	<script src="js/js.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script src="js/script.js"></script>
	<script src="js/js.js"></script>
<script>
   document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems);
    exitDelay: 0;
      });
</script>
</body>
</html>