@php
    $header = "Componentes ejemplo";
@endphp

@extends('template.base')

@section('title') Componentes @stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/fv.css') }}">
@stop

@section('current_section')
    <img src="{{asset('images/iconos/config/SVG__CUPET_ID_Config.svg')}}" width="40" height="40" style="position:absolute;margin-left: -70px;margin-top: 0px;">
@stop

@section('menuh')
    <div class="mh">
        <a href="{{Request::url()}}" class="active-link-sidebar f"><div class="mark"></div>{{$header}}</a>
    </div>
@stop

@section('content')
    <div class="container">
        <h3>Botones</h3>
        <strong>Boton de aceptar</strong> <br>
        <button class="btn-accept"></button>
        <div class="well well-sm">
            <pre><code>&lt;button class="btn-accept"&gt;Boton&lt;/button&gt;</code></pre>
        </div>
        <hr>
        <strong>Boton de cancelar</strong> <br>
        <button class="btn-cancel"></button>
        <div class="well well-sm">
            <pre><code>&lt;button class="btn-cancel"&gt;Boton&lt;/button&gt;</code></pre>
        </div>

        <hr>

        <h3>Dropdown</h3>
        <table class="table table-striped inline-edit">
            <thead>
            <tr>
                <th>Opciones</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tr>
                <td class="edit-select" data-name="example_name" edit-current-value="a" data="a|b|c" label="A|B|C"></td>
                <td><img src="http://app.cupetij.cu.test/images/iconos/config/S_Btn_selectRow_StandBy.svg" alt="" width="20" class="check"></td>
            </tr>
        </table>

        En una tabla <br>
        <pre>
            <code>
                &lt;td class="edit-select" edit-current-value="a" data="a|b|c" label="A|B|C"&gt;&lt;/td&gt;
            </code>
        </pre>

        <div class="edit-select" data-name="example_name" edit-current-value="a" data="a|b|c" label="A|B|C"></div>

        En un div <br>
        <pre>
            <code>
                &lt;div class="edit-select" edit-current-value="a" data="a|b|c" label="A|B|C"&gt;&lt;/div&gt;
            </code>
        </pre>

        <hr>

        <h3>Bloquear componentes</h3>

        <button class="btn-accept" id="inHabilitarElementos"></button>

        <div class="tl">
            <button class="btn-cancel"></button>
            <button class="btn-accept"></button>
        </div>
        <hr>
        <div class="tl">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis distinctio, dolor doloremque doloribus eos, error fugit hic impedit maiores modi non nostrum numquam odio pariatur praesentium, quam repellat tempore voluptate?
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, ea ipsa possimus praesentium saepe tenetur vero. Adipisci est et ex maxime modi perferendis praesentium quam reiciendis similique. Eligendi, saepe, similique?
        </div>
        <hr>

        <pre>
            <code>
                &lt;div class="lock"&gt;
                Contenido del div bloqueado
                &lt;/div&gt;
                &lt;script&gt;
                $(function(){
                //Inhbilitar elementos que utilizan la clase lock
                inHabilitar()
                })
                &lt;/script&gt;
            </code>
        </pre>

        <hr>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md tl lock">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus deleniti, dignissimos eos est fugit id laudantium necessitatibus neque quis velit voluptate, voluptatum! Aperiam cumque dolorem enim expedita saepe sapiente soluta!
                </div>
                <div class="col-md tl">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, aliquam asperiores aut beatae cupiditate dolore et eum, hic ipsam ipsum minima natus nihil, nulla perspiciatis quia rem similique voluptate voluptatem!
                </div>
                <div class="col-md tl lock">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci asperiores aspernatur atque deleniti dolor dolorum ipsum itaque libero minima modi molestias natus, nisi omnis praesentium ratione sapiente soluta tempore voluptatem?</div>
            </div>
        </div>

    </div>
@stop

@section('scripts')
    <script>
        $(function(){
            //Inhbilitar elementos que utilizan la clase lock
            inHabilitar()

            //Ejemplo Toggle para la clase tl
            $("#inHabilitarElementos").on('click',function(){
                $(".tl").each(function(){
                    $(this).toggleClass('lock')
                    //En caso de que utilize la clase lock
                    if($(this).hasClass('lock'))
                        inHabilitar()
                })
            })
        })
    </script>

    <script>
        var estadoUsuarioSeleccionado = 0;
        setTimeout(inlineEditInit(),1000)
    </script>


@stop
