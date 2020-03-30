@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Grupo Escala
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($grupoEscala, ['route' => ['caphum.grupoEscalas.update', $grupoEscala->id], 'method' => 'patch']) !!}

                        @include('caphum.grupo_escalas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection