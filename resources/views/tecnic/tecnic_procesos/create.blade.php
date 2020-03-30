@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Técnica Proceso
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'tecnica_procesos.store']) !!}

                        @include('tecnic.tecnic_procesos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
