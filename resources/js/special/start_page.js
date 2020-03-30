$(".central-links").on('click',function(){
    var name = $(this).children('div.text').text();
    $("#id_modulo_login").html(name);
    $("#login-modal").modal('show');
});