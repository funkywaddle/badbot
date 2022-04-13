@extends('button.layout')

@section('page')
    <form method="post" action="{{ route('buttons.update', ['button'=>$button->id]) }}" class="col-12">
        @csrf
        {{ method_field('PUT') }}
        <div class="row">
            <div class="form-group col-6">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control" >
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            @if($button->category->id == $category->id)
                            selected="selected"
                            @endif
                        >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-6">
                <label for="currency">Currency</label>
                <select name="currency" id="currency" class="form-control" >
                    @foreach($currencies as $currency)
                        <option
                            value="{{ $currency->id }}"
                            @if($button->currency->id == $currency->id)
                                selected="selected"
                            @endif
                        >{{ $currency->currency }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="command">Command</label>
                <input type="text" class="form-control" id="command" name="command" value="{{$button->command}}" placeholder="Enter button command" />
            </div>
            <div class="form-group col-6">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{$button->price}}" placeholder="Enter button price" />
            </div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter button description">
                {{ $button->description }}
            </textarea>
        </div>
        <h6 class="font-weight-bold">Button Options</h6>
        <x-lettercheckboxes :options="$options" />
        <x-numbercheckboxes :options="$options" />
        <x-directioncheckboxes :options="$options" />
        <x-specialcheckboxes :options="$options" />
        <x-mousecheckboxes :options="$options" />
        <x-customchoicescheckboxes :options="$custom_options" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
