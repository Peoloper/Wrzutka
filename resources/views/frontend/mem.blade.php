@extends('layouts.frontend')
@section('content')
    <div class="container mt-4 spr">
        <div class="row">
            <div class="col-md-10 col-lg-8" id="app">
                <div class="col-md-10 col-lg-8 mt-4 spr" id="test">
                        <div class="align-items-center">
                            <figure class="author-figure float-left">
                                <img src="{{$mem->user->photos->path ?? null}}" alt="Image" class="avatar img-fluid">
                                <span class="me-2">{{Str::limit($mem->title, 20)}}</span>
                            </figure>
                            <span class="d-inline-block mt-1">By {{$mem->user->name}} <a href="#"></a></span>
                            <span>&nbsp;-&nbsp;{{$mem->created_at->diffForHumans()}} </span>
                            <span>{{$mem->category->name}}</span>
                            <p>
                                @foreach($mem->tags as $tag)
                                    <a href="">#{{$tag->name}}</a>
                                @endforeach
                            </p>
                        </div>
                        <div class="group-card">
                            <img src="{{$mem->photos->path ?? null}}" alt="" class="card-img">
                        </div>
                    </div>
                <get-comments :memid="{{$mem->id}}" :id="{{Auth::id() ? 'true' : 'false'}}"/>
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
