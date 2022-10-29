<?php  


?>

	<div class="row" id="row">
    <form class="col s11 l11">
      <div class="row">
        <div class="input-field col s6 l6">
        	<em class="material-icons prefix">account_circle</em>
          <emnput id="first_name" type="text" class="validate">
          <label for="first_name">Nombres</label>
        </div>
        <div class="input-field col s6 l6">
          <em class="material-icons prefix">account_circle</em>
          <emnput id="last_name" type="text" class="validate">
          <label for="last_name">Apellidos</label>
        </div>
      </div>
     <div class="input-field col s12 l6">
    <select>
      <option value="" disabled selected>Tipo de documento</option>
      <option value="1">C.C</option>
      <option value="2">Pasaporte</option>
    </select>
  </div>
     <div class="row">
        <div class="input-field col s12 l6">
        	 <em class="material-icons prefix">badge</em>
          <emnput id="password" type="number" class="validate">
          <label for="password">No. Cedula</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 l6">
        	<em class="material-icons prefix">account_circle</em>
        	 <em class="material-icons prefix">badge</em>
          <emnput id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <emnput id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          This is an inline input field:
          <div class="input-field inline">
            <emnput id="email_inline" type="email" class="validate">
            <label for="email_inline">Email</label>
            <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
          </div>
        </div>
      </div>
    </form>
  </div>
   <script>
   	
 $(document).ready(function(){
    $('select').formSelect();
  });
   </script>