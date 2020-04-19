<form action="" method="post" novalidate id="crearDataForm">
    @csrf
    <div class="row" style="margin: 0px;">
        @foreach($create_form as $key=>$item)
            @if ($item['type'] == 'text' or $item['type'] == 'number')
                <div class="col-md field">
                    <input type="{{$item['type']}}" name="{{$key}}" style="margin-top: 2px;height: 27px;padding-right: 3px;" placeholder="{{$item['placeholder']}}"  id="{{$item['id']}}"
                        @foreach(explode('|',$item['rules']) as $item)
                            {{$item}}
                        @endforeach
                    >
                </div>
            @elseif ($item['type'] == 'checkbox')
                <div class="col-md field">
                    <label>{{$item['placeholder']}}
                        <input type="{{$item['type']}}" name="{{$key}}" id="{{$item['id']}}" style="margin-top: 2px;height: 27px;padding-right: 3px;">
                    </label>
                </div>
            @elseif ($item['type'] == 'select')
                <div class="col-md field">
                    <div class="edit-select" data-name="{{$key}}" data-id="{{$key}}" data="1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16" label="a|b|c|d|e|f|g|h|i|j|k|l|m|n|o|p">
                    </div>
                </div>
            @endif
        @endforeach
        <div class="col-md-2">
             <a href="#" id="cancelarCrearForm" class="cancelar-30x30"></a>
             <a href="#" id="crearForm" class="aceptar-30x30"></a>
        </div>
    </div>
</form>

 <!-- div class="edit-select" data-name="{{$key}}" data-id="{{$key}}" data="1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16" label="a|b|c|d|e|f|g|h|i|j|k|l|m|n|o|p"></div -->
                <!-- div class="edit-select" data-name="{{$key}}" data-id="{{$key}}" data-i="a:1|b:2|c:3|d:4|e:5|f:6|g:7|h:8|i:9|j:10|k:11|l:12|m:13|n:14|o:15|q:16"></div -->
                <!-- div class="edit-select" data-name="empresa" data-id="empresa" data="Educacion:1|Cultura:2|Salud:3">
                </div -->
                   {{-- @foreach(explode('|',$item['options']) as $item)
                            {{-- $item['nombre'] --}}

                    <!-- a:1|b:2|c:3|d:4|e:5|f:6|g:7|h:8|i:9|j:10|k:11|l:12|m:13|n:14|o:15|q:16
                Educacion:1|Cultura:2|Salud:3
                 -->
