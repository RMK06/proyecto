<?php  

	echo '<div class="row">
        	<div class="col l12 m12 s12">
        		<div class="col l12">
        			<p class="center">Inicio</p>
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
        </div>	' ;
	?>
	 
     
  