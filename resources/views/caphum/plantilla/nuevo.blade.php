<form action="" method="post" novalidate id="crearDataForm">
    @csrf
    <div class="row" style="margin: 0px;">
        @foreach($create_form as $key=>$item)
        <div class="col-md field">
            <input type="{{$item['type']}}" name="{{$key}}" style="margin-top: 2px;height: 27px;padding-right: 3px;" placeholder="{{$item['placeholder']}}"  id="{{$item['id']}}"
                @foreach(explode('|',$item['rules']) as $item)
                    {{$item}}
                @endforeach
            >
        </div>   
        @endforeach
        <div class="col-md-2">
             <a href="#" id="cancelarCrearForm" class="cancelar-30x30"></a>
             <a href="#" id="crearForm" class="aceptar-30x30"></a>
        </div>
    </div>
</form>