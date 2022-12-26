@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14 rMenu">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
			<li class="breadcrumb-item active" aria-current="page">Videos</li>
		</ol>
	</div>
</div>
@isset($section1s)
    @if ($section1s->count())
        <section class="producto row font-size-14 my-3 container mx-auto videos my-sm-3 py-md-5">
            @foreach ($section1s as $s)
                <div class="col-sm-12 col-md-4 mb-3">
                    <div class="d-block card position-relative text-decoration-none">
                        <div class="content-image"> {!! $s->image !!} </div>
                        <div class="card-body">
                            <p class="card-text mb-0">
                                <span class="font-size-14 mb-1 d-block fst-italic " style="color:#939598;">{{ $s->content_1 }}</span>
                                <div class="font-size-18 text-primary" style="font-weight: 500;">{{$s->content_2}}</div>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach                
        </section> 
    @endif
@endisset
@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
