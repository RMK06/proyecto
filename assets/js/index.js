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
            metodo: 'validar_correo',
            correo: $('#correo').val(),
            contrasena: $('#contrasena').val(),
        };

        $.ajax({
            data: datos,
            type: "POST",
            url: "ingresar",
            success: function(result){
                console.log(result);
            }
        });
    }
});