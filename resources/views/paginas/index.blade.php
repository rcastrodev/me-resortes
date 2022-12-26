@extends('paginas.partials.app')
@section('content')
@isset($section1s)
	@if (count($section1s))
		<div id="sliderHero" class="carousel slide position-relative" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($section1s as $k => $v)
					<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>
				@endforeach
			</div>
			<div class="carousel-inner">
				@foreach ($section1s as $k => $v)
					<div class="carousel-item @if(!$k) active @endif">
						<img src="{{ asset($v->image) }}" class="d-block w-100">
						<div class="carousel-caption d-none d-md-block text-start">
							<h2 class="font-size-34 text-white">{{ $v->content_1 }}</h2>
							<h3 class="text-white font-size-28">{{ $v->content_2 }}</h3>
						</div>
					</div>
				@endforeach
			</div>
		</div>		
	@endif
@endisset
@isset($products)
	@if (count($products))
	<section class="py-md-5 py-sm-3">
		<div class="container row mx-auto">
			<div class="position-relative">
				<h2 class="mb-5 text-uppercase font-size-25 text-primary col-sm-12 pb-2 after-border">PRODUCTOS DESTACADOS</h2>
			</div>
			@foreach ($products as $p)
				<div class="col-sm-12 col-md-6 mb-md-5 mb-sm-3">
					@includeIf('paginas.partials.producto', ['p' => $p])
				</div>
			@endforeach
		</div>
	</section>
	@endif
@endisset
@isset($section2)
	<section id="section2" class="d-flex align-items-center py-sm-2 py-md-5 text-white" style="background-image: url({{ asset($section2->image) }}); background-size: 100% 100%; min-height: 288px;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-5 text-sm-center text-md-end pe-sm-0 pe-md-5" style="border-right: 4px solid white;">
					<h3 class="mb-sm-2 mb-md-5 font-size-21">{{ $section2->content_1 }}</h3>
					@if (Storage::disk('custom')->exists($section2->content_3))
						<a href="{{ route('certificado', ['id' => $section2->id]) }}" class="text-uppercase text-white btn px-4 mb-sm-2 mb-md-0 font-size-14" style="border: 3px solid white; font-weight: 500;">ver certificado</a>
					@endif
				</div>
				<div class="col-sm-12 col-md-7 text-white ps-sm-0 ps-md-5 text-sm-center text-md-start d-flex align-items-center justify-content-center">
					<div class="row">
						<div class="col-sm-12 col-md-8 my-sm-3 my-md-0">{!! $section2->content_2 !!}</div>
						<div class="col-sm-12 col-md-4"><img src="{{ asset($section2->content_4) }}" width="250" height="150"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endisset
@isset($section3)
	<section id="section3" class="bg-light py-sm-3 py-md-5">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<div class="font-size-21 fw-bold" style="max-width: 330px; margin-top: 50px;">{{ $section3->content_1 }}</div>
					<div class="" style="margin-top: 70px;">
						<p class="mb-3 fst-italic">Seguinos en nuestro canal de YouTube</p>
						<p class="d-flex align-items-center"><i class="fab fa-youtube text-primary font-size-26 me-3"></i> <span class="text-primary" style="font-weight: 500;">M.E. RESORTES</span></p>
					</div>
				</div>
				<div class="col-sm-12 col-md-6">
					<div style="max-width: 560px; max-height: 350px;">{!! $section3->content_2 !!}</div>
				</div>
			</div>
		</div>
	</section>
@endisset
@endsection