@extends('adminlte::page')
@section('title', 'aplicación')
@section('content_header')
    <div class="d-flex">
        <h2 class="mr-3">Aplicaciones <button type="button" id="crearAplicacion" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear</button></h2>
    </div>
@stop
@section('content')
    <div class="row mb-5">
        <div class="col-sm-12">
            <table id="page_table_application" class="table">
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
    <div class="row my-5">
        <div class="d-flex">
            <h1 class="mr-3">Sectores <button type="button" id="crearSector" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear</button></h1>
        </div>
        <div class="col-sm-12">
            <table id="page_table_sector" class="table">
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
@includeIf('administrator.application.modals.create')
@includeIf('administrator.application.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('application.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/application/index.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $('#crearAplicacion').click(function()
        {
            $('#section_id').val(6)
        })

        $('#crearSector').click(function()
        {
            $('#section_id').val(7)
        })
    </script>
@stop

