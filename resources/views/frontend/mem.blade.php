@extends('layouts.frontend')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-10 col-lg-8" id="app">
                <div class="col-md-10 col-lg-8 mt-4 marginAuto border p-2">
                    <div class="align-items-center">
                        <p class="me-2 wrapText">{{$mem->title}}</p>
                        <figure class="author-figure float-left">
                            <img src="{{$mem->user->photos->path ?? asset('images/default.png')}}" alt="Image" class="avatar img-fluid">
                                @if (Auth::check())
                                    <a href="{{route('profile.index', ['userName' => $mem->user->name])}}">
                                        <span class="d-inline-block mt-1">{{$mem->user->name}}</span>
                                    </a>
                                @endif
                            <span>&nbsp;- {{$mem->created_at->diffForHumans()}} </span>
                        </figure>
                        <a href="{{route('front.category', ['category' => $mem->category])}}">
                            <p>{{$mem->category->name}}</p>
                        </a>
                        <p class="wrapText">
                            @foreach($mem->tags as $tag)
                                <a href="{{route('front.tag', ['tag' => $tag->name ])}}">
                                    <span> #{{ $tag->name }} </span>
                                </a>
                            @endforeach
                        </p>
                    </div>
                    <div class="group-card">
                        <img src="{{$mem->photos->path}}" alt="" class="card-img">
                    </div>
                    <div class="group-card text-center">
                        @if (Auth::check())
                            <favorite :mem="{{ $mem->id }}" :favorited={{ $mem->favorite->count()}}></favorite>
                            <like :mem="{{ $mem->id }}" :likes="{{$mem->liked->count()}}" :counter="{{$mem->like}}"></like>
                        @endif
                        @hasanyrole('Admin|Moderator')
                        <a href="{{route('mem.destroy', $mem)}}" class="btn btn-sm btn-danger mr-1" id="delete">
                            <i class="fas fa-trash"></i>
                        </a>
                        @endhasanyrole
                    </div>
                </div>

                <comments :memid="{{$mem->id}}" :photo="{{json_encode(asset('images/default.png'))}}" :user_id="{{auth()->id()}}"/>

            </div>
            @guest
                <div class="col-md-8 col-lg-4 mt-4 max-width">
                    @include('partials.noAuthUser')
                </div>
            @else
                <div class="col-md-8 col-lg-4 mt-4 max-width">
                    @include('partials.AuthUser')
                </div>
            @endguest
        </div>
    </div>
@endsection
