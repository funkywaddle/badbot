@extends('layouts.frontend')

@section('title')
    Home
@endsection

@section('content')
<div class="container">
    <div class="row vh-100">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <a href="{{ $authorizationUrl }}" class="btn twitch-btn btn-lg">Authenticate Twitch Account <img src="/assets/images/twitch_logo.png" /> </a>
        </div>
    </div>
</div>
@endsection
