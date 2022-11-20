<?php
    @\session_start();
    require_once 'cabezote.php';
    require_once 'menu.php';
    ?>
        <a href="#" data-target="slide-out" class="sidenav-trigger hide-on-large-only">
            <em style="font-size: 40px;" class="material-icons">menu</em>
        </a>
        <div class="panel" id="panel" style="padding: 15px;">
            <div class="row" id="panel">
                <div class="col l12 m12 s12">
                    <div class="col l12">
                        <p class="center title-home">Home</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col l4  s12 center graf-padd">
                            <div class="col s12 grey lighten-3">
                                <p class="text-sub">Activos en uso</p>
                                <span class="sub-icon">
                                    18<em class="material-icons" style="color: #239B56;">arrow_drop_up</em>
                                </span>
                            </div>
                        </div>
                        <div class="col l4  s12 center graf-padd">
                            <div class="col s12 grey lighten-3">
                                <p class="text-sub">Total trabajadores</p>
                                <span class="sub-icon">
                                    125<em class="material-icons" style="color: #239B56;">arrow_drop_up</em>
                                </span>
                            </div>
                        </div>
                        <div class="col l4 s12 center graf-padd">
                            <div class="col l12 m12 s12 grey lighten-3">
                                <p class="text-sub">Cambios en la pagina</p>
                                <span class="sub-icon">
                                    18<em class="material-icons" style="color: #239B56;">arrow_drop_up</em>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col l6 m12 ">
                            <div class="col s12 grey lighten-3 ">
                                <div class="class">s</div>
                            </div>
                        </div>
                        
                        <div class="col l6 m12 graf-padd">
                            <div class="col l12 m12 s12 grey lighten-3 ">
                                <div class="class">s</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    require_once 'footer.php';