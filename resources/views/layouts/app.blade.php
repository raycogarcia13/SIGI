<?php

use App\Models\Politicas;
    $politicas=Politicas::all()->first();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CUPET | Gestión Interna</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('vendor/template/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/template/css/bootstrap-toggle.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('vendor/template/css/font-awesome.css')}}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('vendor/template/css/ionicons.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('vendor/template/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/template/css/_all-skins.min.css')}}">

    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('vendor/template/css/_all.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/template/libs/iCheck/all.css')}}">

    <link rel="stylesheet" href="{{asset('vendor/template/css/select2.min.css')}}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('vendor/template/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/template/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/template/libs/toastr/toastr.css')}}">

    @yield('css')
</head>

<body class="skin-blue sidebar-mini">
@if (!Auth::guest())
    @include('layouts.partials.navegador_flotante')
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="/" class="logo">
                <b>CUPET</b>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="{{asset('vendor/template/img/avatar.png')}}"
                                     class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{!! Auth::user()->username !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{asset('vendor/template/img/avatar.png')}}"
                                         class="img-circle" alt="User Image"/>
                                    <p>
                                        {!! Auth::user()->username !!}
                                        <small>En el sistema desde {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" id="changepass" class="btn btn-default btn-flat">Cambiar contraseña</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2016 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>

    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{!! url('/') !!}">
                    InfyOm Generator
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{!! url('/home') !!}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{!! url('/login') !!}">Login</a></li>
                    <li><a href="{!! url('/register') !!}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif

    <div id="pass-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-key"></i></h4>
            </div> -->

            <div class="modal-body">
                <div class="login-box">
                    <div class="login-logo">
                        <span id="titleM">Cambiar la contraseña</span><br>
                        <i id="iconoM" class="fa fa-key"></i>
                    </div>

                    <!-- /.login-logo -->
                    <div class="login-box-body">
                        <form method="post" action="{{ route('crypt') }}" id="pass-form">
                            {!! csrf_field() !!}
                            <!-- {!! method_field('PUT') !!} -->

                            <div id="actualgr" class="form-group has-feedback">
                                <input type="password" id="actual" class="form-control" placeholder="Contraseña actual" name="actual">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <span style="display:none" class="help-block"><strong id="msgPassact"></strong></span>
                            </div>

                            <div id="groupPass" class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="Contraseña nueva"id="password" name="password">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <span style="display:none" class="help-block"><strong id="msgPass"></strong></span>
                            </div>

                            <div id="repetirGr" class="form-group has-feedback">
                                <input type="password" id="repetir" class="form-control" placeholder="Confirmar contraseña" name="repeat">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <span style="display:none" class="help-block"><strong id="msgPassrep"></strong></span>
                            </div>
                            </form>
                        </div>
                    </div>

            <div class="modal-footer" style="text-align:center">
                <button type="submit" form="pass-form" class="btn btn-primary btn-flat">Aceptar</button>
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
</div>

    <!-- jQuery 3.1.1 -->
    <script src="{{asset('vendor/template/js/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/template/js/moment.min.js')}}"></script>
    <script src="{{asset('vendor/template/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/template/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('vendor/template/js/bootstrap-toggle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('vendor/template/js/adminlte.min.js')}}"></script>

    <script src="{{asset('vendor/template/js/icheck.min.js')}}"></script>
    <script src="{{asset('vendor/template/js/select2.min.js')}}"></script>
    <script src="{{asset('vendor/template/libs/toastr/toastr.js')}}"></script>
    <script>

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        $('#changepass').click(function(){
            $('#pass-modal').modal('show');
        });

        $('#pass-form').submit(function(e){
            e.preventDefault();
            let act=true;
            if(!validarPass())
            {
                console.log('no validar');
                act=false;
            }
            if(!iguales())
            {
                act=false;
            }

            if(!validarAct())
            {
                console.log('no actual');
                act=false;
            }

            console.log(act);
            if(!act)
            {
                toastr.error("Tiene errores en el formulario");
            }
            else{
                var password=$('#password').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:"{{route('password')}}",
                    type:'PUT',
                    dataType:'json',
                    data:{password:password},
                    success:function(data){
                            toastr.success("Contraseña actualizada correctamente");
                    }
                });
                $('#pass-modal').modal('hide');
            }
        });

        function validarAct()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let pass=$('#actual').val();
            $.post("/config/crypt",{pass:pass},function(data){;
                if(data=='true')
                {
                    $('#actualgr').removeClass('has-error');
                    $('#msgPassact').parent().hide();
                }
                else
                {
                    $('#actualgr').addClass('has-error')
                    $('#msgPassact').html('La contraseña no es correcta');
                    $('#msgPassact').parent().show();
                }
            });

            if($('#actualgr').hasClass('has-error'))
                return false;

            return true;
        }

        function iguales()
        {
            if($('#password').val()!=$('#repetir').val())
            {
                $('#repetirGr').addClass('has-error')
                $('#msgPassrep').html('Las contraseñas no coinciden');
                $('#msgPassrep').parent().show();
                return false;
            }
            else
            {
                $('#repetirGr').removeClass('has-error');
                $('#msgPassrep').parent().hide();
                return true;
            }
        }


        function validarPass()
        {
            let pass=$('#password').val();
            let longitud={{$politicas->longitud_minima}};
            let mayus='{{$politicas->mayusculas}}';
            let numeros='{{$politicas->numeros}}';
            let caract='{{$politicas->carac_especiales}}';

            let act=true;
            let msg='';
            //length
            if(pass.length < longitud)
            {
                act=false;
                msg+='Mínimo '+longitud+' caracteres '
            }
            //mayusculas
            if(mayus)
                if(!pass.match('[A-Z]'))
                    {
                        act=false;
                        msg+='| Mayúsculas ';
                    }
            //numeros
            if(numeros)
                if(!pass.match('[0-9]'))
                    {
                        act=false;
                        msg+='| Números '
                    }
            //caracteres especiales
            if(numeros)
                if(!pass.match('\\W+'))
                {
                    act=false;
                    msg+='| Carácteres especiales '
                }

            if(!act)
            {
                $('#groupPass').addClass('has-error')
                $('#msgPass').html('La contraseña no cumple los requisitos de seguridad ('+msg+')');
                $('#msgPass').parent().show();
            }
            else
            {
                $('#groupPass').removeClass('has-error');
                $('#msgPass').parent().hide();
            }

            return act;
        }
    </script>
    @yield('scripts')
</body>
</html>
