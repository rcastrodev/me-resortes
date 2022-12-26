@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14 rMenu">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
			<li class="breadcrumb-item active" aria-current="page">Contacto</li>
		</ol>
	</div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3279.549371391047!2d-58.60263838514487!3d-34.7165442709829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sCarlos%20Casares%203364%20(CPA%20B1765MYS)%2C%20Isidro%20Casanova%2C%20Provincia%20de%20Buenos%20Aires!5e0!3m2!1ses!2sve!4v1636394687038!5m2!1ses!2sve" height="428" style="border:0; width:100%;" allowfullscreen="" loading="lazy" class="rMenu"></iframe>
<div class="my-5">
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
        @endif
        @if (Session::has('mensaje'))
        <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('mensaje') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>                    
        @endif
        <form action="{{ route('send-contact') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-4 font-size-14">
                    <h2 class="font-size-25 text-uppercase mb-3 pb-2 text-primary">M.E. RESORTES</h2>
                    <p class="mb-3">Para mayor información, no dude en contactarse mediante el siguiente formulario, o a través de nuestras vías de comunicación.</p>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-map-marker-alt text-blue font-size-18 d-block me-3"></i><span class="d-block"> {{ $data->address }}</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-phone-alt text-blue font-size-18 d-block me-3"></i>
                        @php $phone = Str::of($data->phone1)->explode('|') @endphp
                        @if (count($phone) == 2)
                            <a href="tel:{{ $phone[0] }}" class="underline text-blue-dark">{{ $phone[1] }}</a>
                        @else 
                            <a href="tel:{{ $data->phone1 }}" class="underline text-blue-dark">{{ $data->phone1 }}</a>
                        @endif       
                        <span class="mx-1">/</span>       
                        @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                        @if (count($phone2) == 2)
                            <a href="tel:{{ $phone2[0] }}" class="underline text-blue-dark">{{ $phone2[1] }}</a>
                        @else 
                            <a href="tel:{{ $data->phone2 }}" class="underline text-blue-dark">{{ $data->phone2 }}</a>
                        @endif 
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fab fa-whatsapp text-blue font-size-18 d-block me-3"></i>
                        @php $phone3 = Str::of($data->phone3)->explode('|') @endphp
                        @if (count($phone3) == 2)
                            <a href="https://wa.me/{{ $phone3[0] }}" class="underline text-blue-dark">{{ $phone3[1] }}</a>
                        @else 
                            <a href="https://wa.me/{{ $data->phone3 }}" class="underline text-blue-dark">{{ $data->phone3 }}</a>
                        @endif       
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-envelope text-blue font-size-18 d-block me-3"></i><span class="d-block"></span>  
                        <a href="mailto:{{ $data->email }}" class="underline text-blue-dark">{{ $data->email }}</a>                      
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="nombre" placeholder="Nombre *" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="apellido" placeholder="Apellido" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email *" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-group">
                                <input type="text" name="telefono" placeholder="Teléfono" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <textarea name="mensaje" class="form-control font-size-14" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="termino" id="termino">
                                <label class="form-check-label font-size-13" for="termino">Acepto los términos y condiciones de privacidad *</label>
                              </div>
                            <div class="form-group">
                                {!! app('captcha')->display() !!}
                            </div>
                        </div>
                        <div class="col-sm-12 mb-sm-3 mb-sm-3 text-end">
                            <button type="submit" class="text-uppercase btn bg-blue font-size-14 py-2 rounded-pill font-weight-600 mb-sm-3 mb-md-0 ancho-boton text-white px-5" style="box-shadow: 0px 3px 6px #00000029;">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

