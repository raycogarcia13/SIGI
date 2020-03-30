<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $tecnicProceso->id !!}</p>
</div>

<!-- Proceso Field -->
<div class="form-group">
    {!! Form::label('proceso', 'Proceso:') !!}
    <p>{!! $tecnicProceso->proceso !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tecnicProceso->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tecnicProceso->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $tecnicProceso->deleted_at !!}</p>
</div>

