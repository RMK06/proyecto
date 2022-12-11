<title>INVENTORY CONTROL CO | AGREGAR ACTIVO</title>
<?php
    require_once 'cabezote.php';
    require_once 'menu.php';
    require_once '../controllers/activosC.php';
?>
<div class="panel" id="panel" style="padding: 15px;">
    <div class="row">
        <div class="col s12 no-padding">
            <h5 class="titulo" style="position: relative;">
                <strong>Agregar Activos</strong>
            </h5>
        </div>
        <div class="input-field col s6">
            <input id="Nombre" type="text" class="validate">
            <label class="active" for="Nombre">Nombre</label>
        </div>
        <div class="input-field col s6">
            <input id="Serial" type="text" class="validate">
            <label class="active" for="Serial">Serial</label>
        </div>
        <div class="input-field col s6">
            <input id="Placa" type="text" class="validate">
            <label class="active" for="Placa">Placa</label>
        </div>
        <div class="input-field col s6">
            <input id="Tipo" type="text" class="validate">
            <label class="active" for="Tipo">Tipo</label>
        </div>
        <div class="input-field col s6">
            <input id="Marca" type="text" class="validate">
            <label class="active" for="Marca">Marca</label>
        </div>
        <div class="input-field col s6">
            <input id="Precio" type="text" class="validate">
            <label class="active" for="Precio">Precio</label>
        </div>
        <div class="input-field col s12">
            <textarea id="Detalles" class="materialize-textarea"></textarea>
            <label for="Detalles">Detalles</label>
        </div>
        
    </div>
    <div class="center">
        <a class="btn" id="btnActivo">Agregar Activo</a>
    </div>
</div>
<?php
    require_once 'footer.php';
?>