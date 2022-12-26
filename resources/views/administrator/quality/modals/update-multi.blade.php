<div class="modal fade" id="modal-update-element-multi">
    <form action="{{ route('quality.content.update2') }}" method="post" id="form-update-multi" class="modal-dialog" enctype="multipart/form-data" data-asyn="no">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body">
            <input type="hidden" name="id">
            <div class="form-group">
                <input type="text" name="order" value="" class="form-control" placeholder="Ingrese el orden AA BB CC">
            </div>
            <div class="form-group">
                <input name="content_1" class="form-control">
            </div>
            <div class="form-group">
                <textarea name="content_2" class="ckeditor"></textarea>
            </div>
            <div class="form-group">
                <input type="file" name="image" class="form-control-file">
                <small>la imagen debe ser al menos 400x270</small>
            </div>
            <div class="form-group" id="documento">
                <input type="file" name="content_3" class="form-control-file">
                <small>documento</small>
            </div>      
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </form>
    <!-- /.modal-dialog -->
</div>

