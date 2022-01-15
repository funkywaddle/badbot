@extends('category.layout')

@section('page')
    <form method="post" action="{{ route('categories.destroy', ['category'=>$category->id]) }}">
        {!! method_field('DELETE') !!}
        @csrf
        <div class="form-group">
            <label for="categoryDelete">To Delete the {{ $category->name }} Category, type DELETE (all caps) and press Submit</label>
            <input type="text" class="form-control" id="categoryDelete" name="categoryDelete" />
        </div>
        <button type="submit" class="btn btn-danger">Submit</button>
    </form>
@endsection
