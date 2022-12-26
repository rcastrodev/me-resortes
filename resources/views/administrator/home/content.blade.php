@extends('adminlte::page')
@section('title', 'Contenido home')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido del home</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear Slider</button>
    </div>
@stop
@section('content')
    <div class="row mb-5">
        <div class="col-sm-12">
            <h3>Sliders</h3>
            <table id="page_table_slider" class="table">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Imagen</th>
                        <th>Contenido</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @isset($section2)
        <form action="{{ route('home.update-info') }}" class="mb-5" method="post" enctype="multipart/form-data" data-asyn="no">
            @csrf
            <input type="hidden" name="id" value="{{$section2->id}}">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                        <input type="text" name="content_1" value="{{$section2->content_1}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea name="content_2" class="ckeditor">{{$section2->content_2}}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="">
                            <label>Cargar certificado</label> 
                            @if (Storage::disk('custom')->exists($section2->content_3))
                                <button class="fas fa-trash" title="Borrar certificado" data-url="{{ route('home.content.certificate-destroy', ['id' => $section2->id]) }}" id="borrarCertificado" style="border: none; background-color: red; padding: 5px 7px;
                                color: white; border-radius: 100%; font-size: 12px;"></button>
                            @endif
                        </div>
                        <input type="file" name="content_3" class="input-control-file">
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        @if (Storage::disk('custom')->exists($section2->image))
                            <img src="{{ asset($section2->image) }}" class="img-fluid mb-4">
                        @endif
                        <input type="file" name="image" class="input-control-file">
                        <small>la imagen debe ser al menos 1366x310</small>
                    </div>
                    <div class="form-group">
                        @if (Storage::disk('custom')->exists($section2->content_4))
                            <img src="{{ asset($section2->content_4) }}" class="img-fluid">
                        @endif
                        <input type="file" name="content_4" class="input-control-file">
                        <small>la imagen debe ser al menos 55x55</small>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    @endisset
    @isset($section3)
        <form action="{{ route('home.update-info') }}" class="mb-5" method="post" data-asyn="no">
            @csrf
            <input type="hidden" name="id" value="{{$section3->id}}">
            <div class="form-group">
                <input type="text" name="content_1" value="{{$section3->content_1}}" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="content_2" value="{{$section3->content_2}}" class="form-control">
            </div>
            <div class="py-4">
                <button class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    @endisset

@includeIf('administrator.home.modals.create')
@includeIf('administrator.home.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('home.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/home/index.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        let borrarCertificado = document.getElementById('borrarCertificado')
        if (borrarCertificado) {
            borrarCertificado.addEventListener('click', function(e){
                e.preventDefault()
                axios.post(borrarCertificado.dataset.url)
                .then( r => borrarCertificado.remove())
                .catch( e => console.log(e))
            })
        }
    </script>
@stop

