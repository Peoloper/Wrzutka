@extends('layouts.frontend')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-10 col-lg-8" id="app">
                <div class="form-group text-center">
                   <a href="{{route('profile.index', ['user' => $user->name])}}"><button class="btn btn-danger">Wrzutki użytkownika</button></a>
                    <a href="{{route('user-comments-get',['user' => $user->name])}}"><button class="btn btn-danger">Komenatrze użytkownika</button></a>
                </div>
                @foreach($memes as $mem)
                    <div class="col-md-10 col-lg-8 mt-4 spr" id="test">
                        <div class="align-items-center">
                            <figure class="author-figure float-left">
                                <img src="{{$mem->user->photos->path ?? null}}" alt="Image" class="avatar img-fluid">
                                <a href="{{route('mem.show', ['mem' => $mem, 'slug' => $mem->slug])}}">
                                    <span class="me-2">{{Str::limit($mem->title, 20)}}</span>
                                </a>
                            </figure>
                            <span class="d-inline-block mt-1">By {{$mem->user->name}} <a href="#"></a></span>
                            <span>&nbsp;-&nbsp;{{$mem->created_at->diffForHumans()}} </span>
                        </div>
                        <div class="group-card">
                            <a href="{{route('mem.show', ['mem' => $mem, 'slug' => $mem->slug])}}">
                                <img src="{{$mem->photos->path ?? null}}" alt="" class="card-img">
                            </a>
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
            <div class="row text-center pt-5 border-top spr">
                <ul class="pagination spr">
                    <li class="page-item"><a class="page-link" href="{{ $memes->previousPageUrl() }}">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $memes->nextPageUrl() }}">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

