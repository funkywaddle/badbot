@extends('currency.layout')

@section('page')
    <form method="post" action="{{ route('currencies.store') }}">
        @csrf
        <div class="form-group">
            <label for="currencyName">Name</label>
            <input type="text" class="form-control" id="currencyName" name="currencyName" placeholder="Enter currency name" />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
