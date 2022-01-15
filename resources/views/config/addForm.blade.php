@extends('config.layout')

@section('page')
    <form method="post" action="{{ route('configs.store') }}">
        @csrf
        <div class="form-group">
            @foreach($configs as $config)
            <label for="config">{{ $config->key }}</label>
            <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter config value" />
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
