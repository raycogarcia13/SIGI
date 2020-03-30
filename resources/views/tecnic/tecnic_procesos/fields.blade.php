<!-- Proceso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('proceso', 'Proceso:') !!}
    {!! Form::text('proceso', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tecnica_procesos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
