@extends('button.layout')

@section('page')
    <div class="text-right">
        <x-add-action path="buttons" name="Button" />
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Command</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Currency</th>
                <th scope="col">Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buttons as $button)
            <tr>
                <td>{{ $button->id }}</td>
                <td>{{ $button->command }}</td>
                <td>{{ $button->description }}</td>
                <td>{{ $button->price }}</td>
                <td>{{ $button->currency->currency }}</td>
                <td>{{ $button->category->name }}</td>
                <td><x-row-actions :item="$button" path="buttons" attrib="button" /></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
