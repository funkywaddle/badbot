@extends('category.layout')

@section('page')
    <form method="post" action="{{ route('categories.store') }}">
        @csrf
        <div class="row">
            <div class="form-group col-4">
                <label for="categoryName">Name</label>
                <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter category name" />
                <label for="categoryCode">Code</label>
                <input type="text" class="form-control" id="categoryCode" name="categoryCode" placeholder="Enter category code" />
            </div>
            <div class="form-group col-4">
                <label for="borderColor">Border Color</label>
                <input type="text" class="form-control" id="borderColor" name="borderColor" value="#000000" placeholder="Enter button border color" />
                <label for="borderSize">Border Size</label>
                <input type="text" class="form-control" id="borderSize" name="borderSize" value="4" placeholder="Enter button border size" />
                <label for="backgroundColor">Background Color</label>
                <input type="text" class="form-control" id="backgroundColor" name="backgroundColor" value="#ffffff" placeholder="Enter button background color" />
                <label for="textColor">Text Color</label>
                <input type="text" class="form-control" id="textColor" name="textColor" value="#000000" placeholder="Enter button text color" />
            </div>
            <div class="form-group col-4">
                <label for="hoverBorderColor">Hover Border Color</label>
                <input type="text" class="form-control" id="hoverBorderColor" name="hoverBorderColor" value="#ffffff" placeholder="Enter button hover border color" />
                <label for="hoverBorderSize">Hover Border Size</label>
                <input type="text" class="form-control" id="hoverBorderSize" name="hoverBorderSize" value="4" placeholder="Enter button hover border size" />
                <label for="hoverBackgroundColor">Hover Background Color</label>
                <input type="text" class="form-control" id="hoverBackgroundColor" name="hoverBackgroundColor" value="#000000" placeholder="Enter button hover background color" />
                <label for="hoverTextColor">Hover Text Color</label>
                <input type="text" class="form-control" id="hoverTextColor" name="hoverTextColor" value="#ffffff" placeholder="Enter button hover text color" />
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
