@extends('config.layout')

@section('page')
    <form method="post" action="{{ route('configs.update', ['config'=>$config->id]) }}">
        @csrf
        {!! method_field('PUT') !!}
        <div class="form-group">
            <label for="{{ $config->key }}">{{ $config->key }}</label>
            <input type="text" class="form-control" id="{{ $config->key }}" name="{{ $config->key }}" placeholder="Enter {{ $config->key }}" value="{{ $config->value }}" />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
