@extends('config.layout')

@section('page')
    <div class="text-right">
{{--        <x-add-action path="configs" name="Config" />--}}
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Key</th>
                <th scope="col">Value</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($configs as $config)
            <tr>
                <td>{{ $config->id }}</td>
                <td>{{ $config->key }}</td>
                <td>{{ $config->value }}</td>
                <td><a class="btn btn-success" href="{{ route('configs.edit', ['config'=>$config->id]) }}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
