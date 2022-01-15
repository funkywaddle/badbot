@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="btn-group mb-5">

                    <a class="btn btn-purple" href="{{ route('home') }}">Admin Home</a>
                </div>
                <div class="card">
                    <div class="card-header">@yield('section') Admin</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert {{ session('status-class', 'alert-success') }}" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            @yield('page')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
