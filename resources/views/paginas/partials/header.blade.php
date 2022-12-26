<div id="pre-header" class="d-sm-none d-md-block bg-primary font-size-12 py-2">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <div class="me-3 d-inline-block">
                    <i class="fas fa-phone-alt text-white me-1"></i> 
                    @php $phone1 = Str::of($data->phone1)->explode('|') @endphp
                    @if (count($phone1) == 2)
                        <a href="tel:{{$phone1[0]}}" class="text-light underline underline">{{ $phone1[1] }}</a>
                    @else 
                        <a href="tel:{{$data->phone1}}" class="text-light underline underline">{{ $data->phone1 }}</a>
                    @endif
                    <span class="mx-1 text-white">/</span>
                    @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                    @if (count($phone2) == 2)
                        <a href="tel:{{$phone2[0]}}" class="text-light underline underline">{{ $phone2[1] }}</a>
                    @else 
                        <a href="tel:{{$data->phone2}}" class="text-light underline underline">{{ $data->phone2 }}</a>
                    @endif    
                </div>
                <div class="d-inline-block email me-3">
                    <a href="mailto:{{ $data->email }}" class="mb-xs-2 mb-md-0 text-light underline underline" style="z-index: 100;">
                        <i class="fas fa-envelope text-white me-1"></i> {{ $data->email }}
                    </a>
                </div>
            </div>
            <div class="d-flex align-items-center" style="z-index: 100;">
                <div class="pre-menu">
                    <a href="{{ route('cotizacion') }}" class="underline text-light me-4 text-uppercase @if(Request::is('solicitud-de-presupuesto')) active @endif">solicitud de presupuesto</a>
                </div>
                <form action="{{ route('productos') }}"  class="form-pre-header">
                    <div class="input-group">
                        <input type="text" name="b" class="form-control bg-transparent border-end-0 input-search p-0" placeholder="Buscar ...">
                        <button type="submit" class="input-group-text bg-transparent border-start-0" style="border-left: 1px solid white !important; border-right: 1px solid white !important; border-radius: 0;"><i class="fas fa-search text-light"></i></button>
                    </div>
                </form>
                <div id="redes-sociales">    
                    @if ($data->facebook)
                        <a href="{{$data->facebook}}" class="text-white text-decoration-none p-2 py-3">
                            <i class="fab fa-facebook-f"></i>
                        </a>            
                    @endif
                    @if ($data->instagram)
                        <a href="{{$data->instagram}}" class="text-white text-decoration-none p-2 py-3">
                            <i class="fab fa-instagram"></i>
                        </a>                
                    @endif
                    @if ($data->linkedin)
                        <a href="{{$data->linkedin}}" class="text-white text-decoration-none p-2 py-3">
                            <i class="fab fa-linkedin-in"></i>
                        </a>                  
                    @endif
                    @if ($data->youtube)
                        <a href="{{$data->youtube}}" class="text-white text-decoration-none p-2 py-3">
                            <i class="fab fa-youtube"></i>
                        </a>               
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand logo" href="{{ route('index') }}">
            <img src="{{ asset($data->logo_header) }}" alt="" class="img-fluid logo-header">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center text-uppercase position-relative py-md-4 py-sm-2" id="navbarNav">
            <ul class="navbar-nav justify-content-end align-items-center w-100">
                <li class="nav-item @if(Request::is('/')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('/')) active @endif" href="{{ route('index') }}">Inicio</a>
                </li>
                <li class="nav-item @if(Request::is('empresa')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">Empresa</a>
                </li>
                <li class="nav-item @if(Request::is('productos') || Request::is('productos/*') || Request::is('producto/*')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('productos') || Request::is('productos/*') || Request::is('producto/*')) active @endif" href="{{ route('productos') }}">Resortes</a>
                </li>
                <li class="nav-item @if(Request::is('aplicaciones')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('aplicaciones')) active @endif" href="{{ route('aplicaciones') }}">Aplicaciones</a>
                </li>
                <li class="nav-item @if(Request::is('videos')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('videos')) active @endif" href="{{ route('videos') }}">Videos</a>
                </li>
                <li class="nav-item @if(Request::is('calidad')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('calidad')) active @endif" href="{{ route('calidad') }}">Calidad</a>
                </li>
                <li class="nav-item d-sm-block d-md-none @if(Request::is('cotizacion') || Request::is('cotizacion/*')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('cotizacion') || Request::is('cotizacion/*')) active @endif" href="{{ route('cotizacion') }}">Solicitar presupuesto</a>
                </li>
                <li class="nav-item @if(Request::is('contacto')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>  
