<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("title")</title>
    <link rel="shortcut icon" href="{{ asset('images/icono.ico') }}" >
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')

</head>
<body path="{{url('/')}}">

<div id="app">

    @if(!Auth::guest())
        @include('layouts.partials.navegador_flotante')
    @endif

    {{-- Sidebar --}}
    @include('template.sidebar')
    {{-- End Sidebar --}}
    <div id="menu_h">
        @yield('menuh')
    </div>

    {{-- Acerca de modal --}}
    @include("modal.acerca_de")
    {{-- End Acerca de modal --}}

    {{-- Desarrollado por Modal --}}
    @include("modal.desarrollado_por")
    {{-- End Desarrollado por Modal --}}

    <div id="modal-editable" class="modal fade modal-simple">
    <div class="modal-dialog">
        <div class="modal-content" style="max-width:100%;">
            <div class="modal-header">
                <div style="position:absolute;width: 50px;right:0px;background: #ffffff;padding: 6px;margin-top: -2px;">
                    <img src="{{ asset('images/iconos/generales/S_CUPET_ID_SIGI.svg') }}" alt="CupetApp" width="100%">
                </div>
            </div>
            <div class="modal-body" style="padding-top: 5px;" id="contenidoModalEditable">

            </div>
            <div class="col-sm-10" style="padding-right: 0px;">
                <button type="button" class="btn-accept float-sm-right" data-dismiss="modal" style="margin-right: -29px;"></button>
            </div>
        </div>
    </div>
</div>



    {{-- Navigation bar --}}
    <nav class="navbar navbar-default navbar-cupet fixed-top shadow-sm" style="height: 55px;">
        <div class="navbar-header">
            <a href="#" id="btn-nav-change-status">
                <div id="b1" class="bars-animate"></div>
                <div id="b2" class="bars-animate"></div>
                <div id="b3" class="bars-animate"></div>
            </a>
        </div>
        <div id="logo-sigi">
            @yield('current_section')
            <a href="{{url('/')}}"><img src="{{asset('images/SVG_CUPET_ID_SIGI.svg')}}" id="sigi_button" alt="" width="90"></a>
        </div>
    </nav>

    {{-- End Navigation bar --}}

    @yield('content')


</div>
<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
<script>
    var base_path = "{{url('/')}}/";
</script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/custom_modal.js') }}"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@yield('scripts')
@yield('otros_scripts')
</body>
</html>
