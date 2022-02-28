@extends('layouts.frontend')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-10 col-lg-8" id="app">
                <div class="form-group text-center">
                    <setting :path="{{json_encode($user->photos->path ?? asset('images/default.png'))}}"></setting>
                </div>
            </div>
            <div class="col-md-8 col-lg-4 mt-4 max-width">
                @include('partials.AuthUser')
            </div>
        </div>
    </div>
@endsection

