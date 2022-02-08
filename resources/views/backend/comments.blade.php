@extends('layouts.frontend')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-10 col-lg-8" id="app">
                <div class="form-group text-center">
                    <a href="{{route('profile.index', ['user' => $user->name])}}"><button class="btn btn-danger">Wrzutki użytkownika</button></a>
                    <a href="{{route('user-comments-get',['user' => $user->name])}}"><button class="btn btn-danger">Komenatrze użytkownika</button></a>
                </div>
                @foreach($user->comments as $comment)
                    <div class="col-md-10 col-lg-8 mt-2 spr" id="test">
                        <figure class="author-figure float-left">
                            <img src="{{$comment->user->photos->path ?? null}}" alt="Image" class="avatar img-fluid">
                        </figure>
                        <span class="d-inline-block mt-1">By {{$comment->user->name}} <a href="#"></a></span>
                        <span>&nbsp;-&nbsp;{{$comment->created_at->diffForHumans()}} </span>
                        <div class="align-items-center mt-2">
                            <span>{{$comment->comment}}</span>
                        </div>
                        <div style="text-align: right">
                            <a  href="{{route('mem.show', ['mem' => $comment->mem_id, 'slug' => $comment->mem->slug])}}">Przejdz do posta</a>
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
