@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-3">
                            <a href="{{ route('configs.index') }}" class="btn btn-primary btn-block">Configs</a>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('buttons.index') }}" class="btn btn-primary btn-block">Buttons</a>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('categories.index') }}" class="btn btn-primary btn-block">Categories</a>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('currencies.index') }}" class="btn btn-primary btn-block">Currencies</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
