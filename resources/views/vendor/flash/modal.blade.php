<div id="flash-overlay-modal" class="modal fade {{ $modalClass or '' }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title" id="flash-overlay-modal-body">{{ $title }}</h4>
            </div>

            <div class="modal-body" id="flash-overlay-modal-body">
                <p>{!! $body !!}</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="flash-overlay-modal-boton">Cerrar</button>
            </div>
        </div>
    </div>
</div>
