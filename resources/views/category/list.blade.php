@extends('category.layout')

@section('page')
    <div class="text-right">
        <x-add-action path="categories" name="Category" />
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Code</th>
                <th scope="col">Actions</th>
                <th scope="col">Show</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->code }}</td>
                <td><x-row-actions :item="$category" path="categories" attrib="category" /></td>
                <td>
                @if($category->active == 1)
                    <a data-id="{{$category->id}}" class="btn btn-success" onclick="buttonPress(this);">Shown</a>
                @else
                    <a data-id="{{$category->id}}" class="btn btn-danger" onclick="buttonPress(this);">Not Shown</a>
                @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
