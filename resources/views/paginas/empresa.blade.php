@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
			<li class="breadcrumb-item active" aria-current="page">Nosotros</li>
		</ol>
	</div>
</div>
@if ($section1s)
	@if (count($section1s))
		<div id="sliderHeroEmpresa" class="carousel slide" data-bs-interval	="3000" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($section1s as $k => $v)
					<button type="button" data-bs-target="#sliderHeroEmpresa" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>			
				@endforeach
			</div>
			<div class="carousel-inner" >
				@foreach ($section1s as $k => $v)
					<div class="carousel-item @if(!$k) active @endif" style="background-image: url({{ asset($v->image) }}); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">
					</div>			
				@endforeach
			</div>	
		</div>	
	@endif
@endif
@isset($section2)
	<section id="section_2" class="py-sm-3 py-md-5 mb-4">
		<div class="container py-sm-0 py-md-3">
			<div class="row">
				<div class="col-sm-12">
					<div class="position-relative">
						<h3 class="text-primary mb-4 font-size-18 after-border">{{ $section2->content_1}}</h3>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 mb-4">
					<div class="mb-5 font-size-16" style="color: #27272B; font-weight: 500;">{!! $section2->content_2 !!}</div>
					<div class="">
						<h4 class="text-primary font-size-16 mb-4">{{$section2->content_3}}</h4>
						<div class="font-size-16" style="color: #27272B; font-weight: 500;">{!! $section2->content_4 !!}</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6">
					<img src="{{ asset($section2->image) }}" class="w-100 img-fluid" style="object-fit: cover;">
				</div>		
			</div>
		</div>
	</section>
@endisset
@endsection
