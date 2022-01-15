@extends('category.layout')

@section('page')
    <form method="post" action="{{ route('buttons.destroy', ['button'=>$button->id]) }}">
        {!! method_field('DELETE') !!}
        @csrf
        <div class="form-group">
            <label for="delete">To Delete the {{ $button->name }} Button, type DELETE (all caps) and press Submit</label>
            <input type="text" class="form-control" id="delete" name="delete" />
        </div>
        <button type="submit" class="btn btn-danger">Submit</button>
    </form>
@endsection
