@extends('currency.layout')

@section('page')
    <div class="text-right">
        <x-add-action path="currencies" name="Currency" />
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($currencies as $currency)
            <tr>
                <td>{{ $currency->id }}</td>
                <td>{{ $currency->currency }}</td>
                <td><x-row-actions :item="$currency" path="currencies" attrib="currency" /></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
