@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14 rMenu">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
			<li class="breadcrumb-item active" aria-current="page">Aplicaciones</li>
		</ol>
	</div>
</div>
@isset($section1s)
    @if ($section1s->count())
        <section class="producto row font-size-14 my-3 container mx-auto">
            @foreach ($section1s as $s)
                <div class="col-sm-12 col-md-4 mb-3">
                    <div class="d-block card position-relative text-decoration-none position-relative" style="border: none;">
                        <div class="content-image"> 
                            @if (Storage::disk('custom')->exists($s->image))
                                <img src="{{ asset($s->image) }}" class="img-fluid img-product" >
                            @else
                                <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product">
                            @endif
                            <p class="card-text mb-0 text-white position-absolute" style="z-index: 100; bottom: 30px;
                            left: 20px; text-shadow: 3px 3px 10px black;">{{ Str::limit($s->content_1, 40) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach                
        </section> 
    @endif
@endisset
@isset($section2s)
    @if ($section2s->count())
        <section class="py-sm-3 py-md-5">
            <div class="position-relative container mx-auto">
                <h2 class="mb-3 text-uppercase font-size-25 text-primary col-sm-12 pb-2 after-border">sectores</h2>
            </div>
            <div class="font-size-14 my-3 container mx-auto d-flex flex-wrap">
                @foreach ($section2s as $s)
                    <div class="d-flex justify-content-center align-items-center card position-relative text-decoration-none position-relative sectores">
                        <div class="content-image"> 
                            @if (Storage::disk('custom')->exists($s->image))
                                <img src="{{ asset($s->image) }}" class="img-fluid" width="110" height="100" style="max-height: 100px;">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" class="img-fluid" width="110" height="100" style="max-height: 100px;">
                            @endif
                            <p class="card-text mb-0 text-white position-absolute text-primary fw-bold text-center" style="bottom: 30px;
                            left: 0; right:0;">{{ Str::limit($s->content_1, 40) }}</p>
                        </div>
                    </div>
                @endforeach                
            </div> 
        </section>
    @endif
@endisset

@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
