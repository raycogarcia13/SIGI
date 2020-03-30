/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('nicescroll');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*const app = new Vue({
    el: '#app',
});*/


//Aditional things

//Init show-side-bar
if(!localStorage.getItem('show-side-bar')){
    localStorage.setItem('show-side-bar','off');
}

//Change status nacvar button and animate
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

//Change status of navbar
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

//Change status and click show modal login
$(".central-links").unbind().on('click',function(){
    var name = $(this).children('div.text').text();
    $("#id_modulo_login").html(name);
    $("#login-modal").modal('show');
    return false;
}).mouseenter(function(){
    var child_img = $(this).children('img');
    child_img.attr('src',$('body').attr('path')+'/images/iconos/generales/'+child_img.attr('src-hover'));
}).mouseleave(function(){
    var child_img = $(this).children('img');
    child_img.attr('src',$('body').attr('path')+'/images/iconos/generales/'+child_img.attr('src-default'));
});

//Nicescroll to elements
// $(function(){
//     $('html,body,.modal,.main-sidebar').niceScroll({
//         cursorcolor:'#FE0000',
//         zindex:'100000000',
//         borderRadius:'0px'
//     });
// });
