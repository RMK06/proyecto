$('.calendario').click(function(){
    N.toast({html: 'Cargando'});
    $('.panel').html('');
    var datos ={
        metodo : 'v_ver_calendario',
        vista : 'yes';
    };
    $.ajax({
        url: "..php/calendario.php",
        async: true,
        type 'POST',
        data: datos,
        success: function(result){
            $('.tooltipped').tooltip('close');
            var x = window.matchMedia("(max-width: 992px)");
            media_querie_menu(x);
            x.addListener(media_querie_menu);
        $('panel').html(result);
        M.toast.dismissAll();
        $(.modal).modal();


        }
    });
});
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems);
    exitDelay: 0;
      });