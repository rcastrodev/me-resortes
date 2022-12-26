@extends('adminlte::page')
@section('title', 'Calidad')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Calidad</h1>
    </div>
@stop
@section('content')
    <div class="row">
        @includeIf('administrator.partials.mensaje-exitoso')
        @includeIf('administrator.partials.mensaje-error')
    </div>
    @isset($section1)
        <form action="{{ route('quality.update-info') }}" class="mb-5" method="post" enctype="multipart/form-data" data-asyn="no">
            @csrf
            <input type="hidden" name="id" value="{{$section1->id}}">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                        <input type="text" name="content_1" value="{{$section1->content_1}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea name="content_2" class="ckeditor">{{$section1->content_2}}</textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        @if (Storage::disk('custom')->exists($section1->image))
                            <img src="{{ asset($section1->image) }}" class="img-fluid mb-4">
                        @endif
                        <small>Tamaño recomendado 564x200px</small>
                        <input type="file" name="image" class="input-control-file">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    @endisset
     <div class="row mb-5">
        <div class="col-sm-12">
            <h3>items <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear</button></h3>
            <table id="page_table_items" class="table pb-5">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Contenido</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>       
    <div class="row mb-5">
        <div class="col-sm-12">
            <h3>Certificaciones <button type="button" class="btn btn-sm btn-primary" id="crearCertificaciones" data-toggle="modal" data-target="#modal-create-element-multi">crear</button></h3>
            <table id="page_table_certifications" class="table pb-5">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Imagen</th>
                        <th>Título</th>
                        <th>Contenido</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>  
    <div class="row mb-5">
        <div class="col-sm-12">
            <h3>MAQUINARIAS DE MEDICIÓN <button type="button" class="btn btn-sm btn-primary" id="crearMaquinarias" data-toggle="modal" data-target="#modal-create-element-multi">crear</button></h3>
            <table id="page_table_machinery" class="table pb-5">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Imagen</th>
                        <th>Título</th>
                        <th>Contenido</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>  

@includeIf('administrator.quality.modals.create')
@includeIf('administrator.quality.modals.update')
@includeIf('administrator.quality.modals.create-multi')
@includeIf('administrator.quality.modals.update-multi')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('quality.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <style>
        .d-none{
            display: none
        }

        .d-block{
            display: block;
        }
    </style>
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/quality/index.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $('#crearCertificaciones').click(function(){
            $('#section_id').val(11)
            $('#cdocumento').addClass('d-block')
        })

        $('#crearMaquinarias').click(function(){
            $('#section_id').val(12)
            $('#cdocumento').addClass('d-none')
        })

    </script>
@stop

