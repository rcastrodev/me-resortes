@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
			<li class="breadcrumb-item active" aria-current="page">Calidad</li>
		</ol>
	</div>
</div>
@isset ($section1)
    <section class="py-sm-3 py-md-5">
        <div class="container">
            <div class="position-relative mb-4">
                <h3 class="text-primary font-size-18 after-border">{{ $section1->content_1 }}</h3>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">{!! $section1->content_2 !!}</div>
                <div class="col-sm-12 col-md-6">
                    @if (Storage::disk('custom')->exists($section1->image))
                        <img src="{{Storage::disk('custom')->url($section1->image)}}" class="img-fluid">
                    @endif
                </div>
            </div>
        </div>
    </section>
@endisset
@isset($section2s)
    @if (count($section2s))
        <section id="section_2" class="py-sm-3 py-md-5 mb-4">
            <div class="container py-sm-0 py-md-3">
                <div class="row">
                    @foreach ($section2s as $i)
                        <div class="col-sm-12 col-md-6 mb-4 align-items-center d-flex">
                            <div class="me-3" style="padding: 5px; border: 1px solid #103B57; border-radius: 100%;">
                                <img src="{{$i->image}}" class="img-fluid" style="min-width: 30px; min-height: 30px; max-width: 30px; max-height: 30px;">
                            </div>
                            <span class="font-size-15">{{ $i->content_1 }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endisset
@isset($section3s)
    @if (count($section3s))
        <section id="section_2" class="py-2 mb-4">
            <div class="container py-sm-0 py-md-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="position-relative mb-5">
                            <h3 class="text-primary font-size-18 after-border">CERTIFICACIONES</h3>
                        </div>
                    </div>
                    @foreach ($section3s as $z => $k)
                        @if ($z % 2)
                            <div class="col-sm-12 col-md-6 mb-4">
                                <h2 class="text-primary font-size-18 mb-4">{{ $k->content_1 }}</h2>
                                <div class="font-size-15" style="font-weight: 500;">{!!$k->content_2!!}</div>
                                @if (Storage::disk('custom')->exists($k->content_3))
                                    <a href="{{ route('certificado', ['id' => $k->id]) }}" class="text-uppercase bg-blue text-white btn px-4 mb-sm-2 mb-md-0 font-size-14" style="border: 3px solid white; font-weight: 500; border-radius: 30px;">DESCARGAR</a>
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-6 mb-4">
                                <img src="{{$k->image}}" class="img-fluid mx-auto d-block">
                            </div>
                        @else
                            <div class="col-sm-12 col-md-6 mb-4">
                                <img src="{{$k->image}}" class="img-fluid mx-auto d-block">
                            </div>
                            <div class="col-sm-12 col-md-6 mb-4">
                                <h2 class="text-primary font-size-18 mb-4">{{ $k->content_1 }}</h2>
                                <div class="font-size-15" style="font-weight: 500;">{!!$k->content_2!!}</div>
                                @if (Storage::disk('custom')->exists($k->content_3))
                                    <a href="{{ route('certificado', ['id' => $k->id]) }}" class="text-uppercase bg-blue text-white btn px-4 mb-sm-2 mb-md-0 font-size-14" style="border: 3px solid white; font-weight: 500; border-radius:30px;">DESCARGAR</a>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endisset
@isset($section4s)
    @if (count($section4s))
        <section id="section_2" class="py-2 mb-4">
            <div class="container py-sm-0 py-md-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="position-relative mb-5">
                            <h3 class="text-primary font-size-18 after-border">MAQUINARIAS DE MEDICIÓN</h3>
                        </div>
                    </div>
                    @foreach ($section4s as $t => $v)
                        @if ($t % 2)
                            <div class="col-sm-12 col-md-6 mb-sm-2 mb-md-5">
                                <h2 class="text-primary font-size-18 mb-4">{{ $v->content_1 }}</h2>
                                <div class="font-size-15 mb-5" style="font-weight: 500;">{!!$v->content_2!!}</div>
                            </div>
                            <div class="col-sm-12 col-md-6 mb-sm-2 mb-md-5" style="border: 1px solid #80808040;">
                                <img src="{{$v->image}}" class="img-fluid mx-auto d-block">
                            </div> 
                        @else  
                            <div class="col-sm-12 col-md-6 mb-sm-2 mb-md-5" style="border: 1px solid #80808040;">
                                <img src="{{$v->image}}" class="img-fluid mx-auto d-block">
                            </div>
                            <div class="col-sm-12 col-md-6 mb-sm-2 mb-md-5">
                                <h2 class="text-primary font-size-18 mb-4">{{ $v->content_1 }}</h2>
                                <div class="font-size-15 mb-5" style="font-weight: 500;">{!!$v->content_2!!}</div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endisset
@endsection
