@extends('layouts.frontend')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-10 col-lg-8">
                <div class="form-group text-center">
                    <a href="{{route('profile.index', ['userName' => $user->name])}}"><button class="btn btn-danger">Wrzutki użytkownika</button></a>
                    <a href="{{route('user.comments.get',['userName' => $user->name])}}"><button class="btn btn-danger">Komenatrze użytkownika</button></a>
                </div>
                @foreach($comments as $comment)
                    <div class="col-md-10 col-lg-8 mt-2 marginAuto border p-2">
                        <figure class="author-figure float-left">
                            <img src="{{$comment->user->photos->path ?? asset('images/default.png')}}" alt="Image" class="avatar img-fluid">
                        </figure>
                        <span class="d-inline-block mt-1">{{$comment->user->name}} <a href="#"></a></span>
                        <span>&nbsp;-&nbsp;{{$comment->created_at->diffForHumans()}} </span>
                        <div class="align-items-center mt-2 wrapText" >
                            <span>{{$comment->comment}}</span>
                        </div>
                        <div style="text-align: right">
                            <a  href="{{route('mem.show', ['mem' => $comment->mem_id, 'slug' => $comment->mem->slug])}}">Przejdz do posta</a>
                        </div>
                    </div>
                @endforeach

                @if($comments->total() > $comments->perPage())
                    <div class="pt-4">
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="{{ $comments->previousPageUrl() }}">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="{{ $comments->nextPageUrl() }}">Next</a></li>
                        </ul>
                    </div>
                @endif
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
