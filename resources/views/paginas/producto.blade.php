@extends('paginas.partials.app')
@section('content')
@isset($product)
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14">
    <ol class="breadcrumb container">
        <li class="breadcrumb-item">
            <a href="{{ route('index') }}" class="text-decoration-none">Inicio</a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('productos') }}" class="text-decoration-none">Resortes</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
    </ol>
    
</div> 
@endisset
@if (Storage::disk('custom')->exists($product->image_hero))
    <div class="hero d-sm-none d-md-flex" style="background-image: url({{Storage::disk('custom')->url($product->image_hero)}});">
        <div class="container">
            <h1 class="text-white font-size-25 position-relative">{{$product->name}}</h1>
        </div>
    </div>
@endif
<section class="py-sm-2 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                @if (count($product->images))
                    @foreach ($product->images as $k => $pi)
                        <div class="carousel-item  @if(!$k) active @endif">
                            <img src="{{ asset($pi->image) }}" class="mx-auto img-fluid d-block" alt="{{$product->name}}" width="375" height="375" style="object-fit: contain;">
                        </div>     
                        @php break; @endphp                               
                    @endforeach
                @else 
                    <div class="carousel-item active">
                        <img src="{{ asset('images/default.jpg') }}" class="mx-auto img-fluid d-block" style="object-fit: contain;"> 
                    </div>                                   
                @endif
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="col-sm-12 d-sm-block text-primary font-size-20 mb-4 fw-bold @if (Storage::disk('custom')->exists($product->image_hero)) d-md-none @else d-md-block @endif">{{$product->name}}</div>
                <div class="font-size-14">{!! $product->description !!}</div>
                <div class="d-flex justify-content-sm-center justify-content-md-start flex-wrap mt-5">
                    @if($product->extra)
                        <a href="{{ route('ficha-tecnica', ['id' => $product->id]) }}" class="btn text-red fw-bold py-2 px-4 text-uppercase btn-outline-danger rounded-pill font-size-13 me-3 mb-sm-3 mb-md-0"><i class="fas fa-download text-red"></i> DESCARGAR FICHA</a>
                    @endif
                    <a href="{{ route('cotizacion') }}" class="btn bg-blue text-white fw-bold py-2 px-4 text-uppercase rounded-pill font-size-13 mb-sm-3 mb-md-0">solicitar presupuesto</a>
                </div>
            </div>
        </div>
    </div>
</section>
@if ($relatedProducts->count())
    <section class="pb-5 relatedProducts">
        <div class="container">
            <div class="position-relative">
                <h2 class="text-primary font-size-18 after-border mb-4">PRODUCTOS RELACIONADOS</h2>
            </div>
            <div class="producto row font-size-14 my-3">
                @foreach ($relatedProducts as $p)
                    <div class="col-sm-12 col-md-4 mb-3">
                        @includeIf('paginas.partials.producto', ['product' => $p])
                    </div>
                @endforeach                
            </div>    
        </div>
    </section>
@endif
@endsection
@push('scripts')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush



