@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Categoria Ocupacional
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($categoriaOcupacional, ['route' => ['caphum.categoriaOcupacionals.update', $categoriaOcupacional->id], 'method' => 'patch']) !!}

                        @include('caphum.categoria_ocupacionals.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection