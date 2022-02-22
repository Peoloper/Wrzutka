@extends('layouts.frontend')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-10 col-lg-8" id="app">
                <div class="col-md-10 col-lg-8 mt-4 marginAuto border p-2">
                        <div class="align-items-center">
                            <p class="me-2 wrapText">{{$mem->title}}</p>
                            <figure class="author-figure float-left">
                                <img src="{{$mem->user->photos->path ?? null}}" alt="Image" class="avatar img-fluid">

                                @if (Auth::check())
                                    <a href="{{route('profile.index', ['userName' => $mem->user->name])}}">
                                        <span class="d-inline-block mt-1">{{$mem->user->name}}</span>
                                    </a>
                                @endif
                            <span>&nbsp;- {{$mem->created_at->diffForHumans()}} </span>
                            </figure>
                            <p>{{$mem->category->name}}</p>
                            <p class="wrapText">
                                @foreach($mem->tags as $tag)
                                    <span> #{{ $tag->name }} </span>
                                @endforeach
                            </p>
                        </div>
                        <div class="group-card">
                            <img src="{{$mem->photos->path ?? null}}" alt="" class="card-img">
                        </div>
                    <div class="group-card text-center">
                        @if (Auth::check())
                            <favorite :mem="{{ $mem->id }}" :favorited={{ $mem->favorite() ? 'true' : 'false' }}></favorite>
                            <like :mem="{{ $mem->id }}" :likes="{{$mem->like()  ? 'true' : 'false'}}" :counter="{{$mem->like}}"></like>
                        @endif
                        @hasrole('Admin')
                        <a href="{{route('mem.destroy', $mem)}}" class="btn btn-sm btn-danger mr-1" id="delete">
                            <i class="fas fa-trash"></i>
                        </a>
                        @endhasrole
                    </div>
                    </div>
                <comments :memid="{{$mem->id}}"/>
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
