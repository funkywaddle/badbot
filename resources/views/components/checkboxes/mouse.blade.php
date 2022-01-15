<div style="text-decoration: underline">Mouse Buttons</div>
<div class="row">
    @foreach(['LMB','MMB','RMB'] as $button)
        <div class="col-2">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="options[]" value="{{$button}}" id="{{$button}}"
                    {{ $isSelected($button) ? 'checked' : '' }}
                />
                <label class="form-check-label" for="{{$button}}">{{$button}}</label>
            </div>
        </div>
    @endforeach
</div>
