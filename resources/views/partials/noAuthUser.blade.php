<div class="row">
    <div class="card">
        <div class="card-header">
            <div class="form-group mt-4">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <p>Polecamy</p>
            <div class="col-md-8 col-lg-8 marginAuto">
                <div class="group-card mt-3">
                    @foreach($featuredMemes as $mem)
                        <div class=" mt-3 border p-2">
                            <div class="group-card">
                                <a href="{{route('mem.show', ['mem' => $mem, 'slug' => $mem->slug])}}">
                                    <img src="{{$mem->photos->path ?? null}}" alt="" class="card-img">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
