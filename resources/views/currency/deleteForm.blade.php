@extends('currency.layout')

@section('page')
    <form method="post" action="{{ route('currencies.destroy', ['currency'=>$currency->id]) }}">
        {!! method_field('DELETE') !!}
        @csrf
        <div class="form-group">
            <label for="currencyDelete">To Delete the {{ $currency->currency }} Currency, type DELETE (all caps) and press Submit</label>
            <input type="text" class="form-control" id="currencyDelete" name="currencyDelete" />
        </div>
        <button type="submit" class="btn btn-danger">Submit</button>
    </form>
@endsection
