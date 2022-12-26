<a href="{{ route('producto', ['product'=> $p->id ]) }}" class="d-block card producto position-relative text-decoration-none">
    <span class="plus position-absolute">+</span>
    <div class="content-image"> 
        @if (count($p->images))
            <img src="{{ asset($p->images()->first()->image) }}" class="img-fluid img-product" >
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product">
        @endif
    </div>
    <div class="card-body">
        <p class="card-text mb-0 fw-bold">
            <span class="font-size-16 text-primary mb-3 d-block">{{ Str::limit($p->name, 40) }}</span>
            <div class="fst-italic font-size-15" style="color:#939598;">{!! Str::limit($p->description, 100) !!}</div>
        </p>
    </div>
</a>