
<?php
	function calendario()
	{
		@\session_start();
		?>
			<table>
			<caption>New York City Marathon Results 2013</caption>

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
		<?php
	}
	
	if (isset($_POST['metodo'])) {
		if (function_exists($_POST['metodo'])) {
			if (isset($_POST['vista']) && $_POST['vista'] == 'yes') {
				?>
					<div class="row">
						<div class="col s12 no-padding subnav-wrapper"></div>
						<?php
							$_POST['metodo']();
						?>
					</div>
				<?php
			} else {
				$_POST['metodo']();
			}
		} else {
			echo 0;
		}
	}
?>