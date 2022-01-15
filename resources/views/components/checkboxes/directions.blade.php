<div style="text-decoration: underline">Directions</div>
<div class="row">
    @foreach(['forward','back','left','right'] as $direction)
        <div class="col-2">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="options[]" value="{{$direction}}" id="{{$direction}}"
                    {{ $isSelected($direction) ? 'checked' : '' }}
                />
                <label class="form-check-label" for="{{$direction}}">{{$direction}}</label>
            </div>
        </div>
    @endforeach
</div>
