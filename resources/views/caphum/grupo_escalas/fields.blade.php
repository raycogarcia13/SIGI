<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Salario Escala Field -->
<div class="form-group col-sm-6">
    {!! Form::label('salario_escala', 'Salario Escala:') !!}
    {!! Form::number('salario_escala', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('caphum.grupoEscalas.index') !!}" class="btn btn-default">Cancel</a>
</div>
