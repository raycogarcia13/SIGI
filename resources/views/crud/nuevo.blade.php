<form action="" method="post" novalidate id="crearDataForm">
    @csrf
    <div class="row" style="margin: 0px;">
        @foreach($create_form as $key => $item)
        <div class="col-md field">
            @if($item['type']=='select')
                <div class="form-group" style="margin:5px">
                    <select class="col-md-12" id="{{$item['id']}}" class="form-control" name="{{$key}}">
                        <option value="" style="background-color: #ccc">Escoja: {{$item['label']}}</option>
                        @foreach($item['options'] as $k=>$val)
                            <option value="{{$k}}">{{$val}}</option>
                        @endforeach
                    </select>
                </div>
            @elseif($item['type']=='checkbox')
            <div
                    class="edit-check"
                    data-name="{{$key}}"
                    data-label="{{$item['label']}}"
                    data-id="{{$item['id']}}"
                    data-checked="off">
            </div>
            @else
                <input type="{{$item['type']}}" name="{{$key}}" style="margin-top: 2px;height: 27px;padding-right: 3px;" placeholder="{{$item['placeholder']}}"  id="{{$item['id']}}"
                    @foreach(explode('|',$item['rules']) as $item)
                        {{$item}}
                    @endforeach
                >
            @endif
        </div>
        @endforeach
        <div class="col-md-2">
             <a href="#" id="cancelarCrearForm" class="cancelar-30x30"></a>
             <a href="#" id="crearForm" class="aceptar-30x30"></a>
        </div>
    </div>
</form>

@section('otros_scripts')
    <script src="{{ asset('js/ocultar_typo_categoria.js') }}"></script>
@endsection
