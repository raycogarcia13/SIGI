var padre = $('#tipo_categoria').parent().parent();
padre.hide();

$('select#categoria_oc').on('change', function() {
    var valor = $(this).val();

    if ( valor == 5 ) {
        padre.show();
    }
    else
    {
        padre.hide();
    }



})
