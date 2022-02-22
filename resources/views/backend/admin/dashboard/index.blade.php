@extends('layouts.backend')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3></h3>
                            {{$mem}}
                            <p>Posts</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-pen-square"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3></h3>
                            {{$category}}
                            <p>Categories</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tags"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3></h3>
                            {{$tag}}
                            <p>Tags</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tag"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3></h3>
                            {{$user}}
                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--
<div class="container">
    @forelse($notifications as $notification)
    <div class="alert alert-success" role="alert">
        [{{ $notification->created_at }}] User has writer new post.
<a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
    Mark as read
</a>
</div>
@if($loop->last)
<a href="#" id="mark-all">
    Mark all as read
</a>
@endif
@empty
There are no new notifications
@endforelse
        </div>}}
    <div id="app" class="container">

        <notification/>
    </div>
    --}}
@endsection