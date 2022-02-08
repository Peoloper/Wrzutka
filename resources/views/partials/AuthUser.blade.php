<div class="row">
    <div class="card">
        <div class="card-header">
            <div class="form-group mt-4">
                <figure class="author-figure float-left">
                    <img src="{{auth()->user()->photos->path ?? null}}" alt="Image" class="avatar img-fluid">
                    <span>{{auth()->user()->name}}</span>
                </figure>
            </div>
        </div>
        <div class="card-body">
            <div class="group-card text-center">
                <a href="{{route('profile.index', ['user' => auth()->user()->name])}}"><button class="button btn-primary">Profil</button></a>
                <a href="{{route('setting')}}"><button>Ustawienia</button></a>
                <a href="{{route('favorite')}}"> <button>Ulubione</button></a>
            </div>
            <div class="group-card mt-3">
                <p>Polecane Tagi:</p>
                @foreach($tags as $tag)
                    <span>#{{$tag->slug}}</span>
                @endforeach
            </div>
        </div>
        <div class="row">
            <p>Polecamy</p>
            <div class="col-md-8 col-lg-8 spr">
                <div class="group-card mt-3">
                    @foreach($featuredMemes as $mem)
                        <div class=" spr mt-3" id="test">
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
