@extends('currency.layout')

@section('page')
    <form method="post" action="{{ route('currencies.update', ['currency'=>$currency->id]) }}">
        @csrf
        {!! method_field('PUT') !!}
        <div class="form-group">
            <label for="currencyName">Name</label>
            <input type="text" class="form-control" id="currencyName" name="currencyName" placeholder="Enter currency name" value="{{ $currency->currency }}" />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
