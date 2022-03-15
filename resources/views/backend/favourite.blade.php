@extends('layouts.frontend')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-10 col-lg-8" id="app">
                @foreach($memes as $mem)
                    <div class="col-md-10 col-lg-8 mt-4 marginAuto border p-2">
                        <div class="align-items-center">
                            <a href="{{route('mem.show', ['mem' => $mem, 'slug' => $mem->slug])}}">
                                <p class="me-2 mt-3">{{Str::limit($mem->title, 20)}}</p>
                            </a>
                            <figure class="author-figure float-left">
                                <img src="{{$mem->user->photos->path ?? asset('images/default.png')}}" alt="Image" class="avatar img-fluid">
                                @if (Auth::check())
                                    <a href="{{route('profile.index', ['userName' => $mem->user->name])}}">
                                        <span class="d-inline-block mt-1">{{$mem->user->name}}</span>
                                    </a>
                                @endif
                                <span> - {{$mem->created_at->diffForHumans()}} </span>
                            </figure>
                        </div>
                        <div class="group-card">
                            <a href="{{route('mem.show', ['mem' => $mem, 'slug' => $mem->slug])}}">
                                <img src="{{$mem->photos->path}}" alt="" class="card-img">
                            </a>
                        </div>
                        <div class="group-card text-center">
                            <favorite :mem="{{ $mem->id }}" :favorited={{ $mem->favorite->count()}}></favorite>
                            <like :mem="{{ $mem->id }}" :likes="{{$mem->liked->count()}}" :counter="{{$mem->like}}"></like>

                            @hasallroles('Admin|Moderator')
                            <a href="{{route('mem.destroy', $mem)}}" class="btn btn-sm btn-danger mr-1" id="delete">
                                <i class="fas fa-trash"></i>
                            </a>
                            @endhasrole
                        </div>
                    </div>
                @endforeach

                @if($memes->total() > $memes->perPage())
                    <div class="pt-4">
                       <ul class="pagination justify-content-center">
                           <li class="page-item"><a class="page-link" href="{{ $memes->previousPageUrl() }}">Previous</a></li>
                           <li class="page-item"><a class="page-link" href="{{ $memes->nextPageUrl() }}">Next</a></li>
                       </ul>
                    </div>
                @endif
            </div>
            <div class="col-md-8 col-lg-4 mt-4 max-width">
                @include('partials.AuthUser')
            </div>
        </div>
    </div>
@endsection
