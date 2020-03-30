//Init show-side-bar
if(!localStorage.getItem('show-side-bar')){
    localStorage.setItem('show-side-bar','off');
}

$("#btn-nav-change-status").unbind().on('click',function(){
    var button = $(this);
    button.children('div#b1').toggleClass('bars-animate-arrow-top');
    button.children('div#b2').toggleClass('bars-animate-arrow-middle');
    button.children('div#b3').toggleClass('bars-animate-arrow-bottom');
    $(".main-sidebar").toggleClass('main-sidebar-expand');

    if(localStorage.getItem('show-side-bar')=='off'){
        localStorage.setItem('show-side-bar','on');
    }else{
        localStorage.setItem('show-side-bar','off');
    }
    return false;
});

setInterval(function(){
    if (localStorage.getItem('show-side-bar')=='on'){
        $("#btn-nav-change-status").children('div#b1').addClass('bars-animate-arrow-top');
        $("#btn-nav-change-status").children('div#b2').addClass('bars-animate-arrow-middle');
        $("#btn-nav-change-status").children('div#b3').addClass('bars-animate-arrow-bottom');
        $(".main-sidebar").addClass('main-sidebar-expand');
    } else{
        $("#btn-nav-change-status").children('div#b1').removeClass('bars-animate-arrow-top');
        $("#btn-nav-change-status").children('div#b2').removeClass('bars-animate-arrow-middle');
        $("#btn-nav-change-status").children('div#b3').removeClass('bars-animate-arrow-bottom');
        $(".main-sidebar").removeClass('main-sidebar-expand');
    }
},100);

$(".central-links").on('click',function(){
    var name = $(this).children('div.text').text();
    $("#id_modulo_login").html(name);
    $("#login-modal").modal('show');
});

$(document).ready(function(){
    $('html,body,.modal').niceScroll({
        cursorcolor:'#FE0000',
        zindex:'100000000',
        borderRadius:'0px'
    });
});
