@extends('layouts.frontend')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-10 col-lg-8" id="app">
                @auth
                <new-mem :tags ="{{$tags}}" :categories="{{$categories}}"> </new-mem>
                @endauth
                    @foreach($memes as $mem)
                        <div class="col-md-10 col-lg-8 mt-4 spr" id="test">
                            <div class="align-items-center">
                                <figure class="author-figure float-left">
                                    <img src="{{$mem->user->photos->path ?? null}}" alt="Image" class="avatar img-fluid">
                                    <a href="{{route('mem.show', ['mem' => $mem, 'slug' => $mem->slug])}}">
                                        <span class="me-2">{{Str::limit($mem->title, 20)}}</span>
                                    </a>
                                </figure>
                                <span class="d-inline-block mt-1">By {{$mem->user->name}}</span>
                                <span>&nbsp;-&nbsp;{{$mem->created_at->diffForHumans()}} </span>
                            </div>
                            <div class="group-card">
                                <a href="{{route('mem.show', ['mem' => $mem, 'slug' => $mem->slug])}}">
                                    <img src="{{$mem->photos->path ?? null}}" alt="" class="card-img">
                                </a>
                            </div>
                            <div class="group-card text-center">
                                @if (Auth::check())
                                    <favorite :mem="{{ $mem->id }}" :favorited={{ $mem->favorited() ? 'true' : 'false' }}></favorite>
                                    <like :mem="{{ $mem->id }}" :likes="{{$mem->likes()  ? 'true' : 'false'}}"></like>
                                @endif
                                @hasrole('Admin')
                                    <a href="{{route('mem.destroy', $mem)}}" class="btn btn-sm btn-danger mr-1" id="delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                @endhasrole
                            </div>
                        </div>
                    @endforeach
            </div>
            @guest
                <div class="col-md-8 col-lg-4 mt-4 test">
                    @include('partials.noAuthUser')
                </div>
            @else
                <div class="col-md-8 col-lg-4 mt-4 test">
                    @include('partials.AuthUser')
                </div>
            @endguest
        </div>
    </div>


@endsection
