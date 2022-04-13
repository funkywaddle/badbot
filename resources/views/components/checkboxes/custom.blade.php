<div style="text-decoration: underline">Custom</div>
<div class="row">
    @for ($i = 0; $i < 50; $i++)
        <div class="col-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="options[]" value="{{$options[$i]['option']}}"
                       id="custom_{{ $i.$options[$i]['option'] }}" {{ $isSelected($options[$i]['option']) ? 'checked' : '' }}
                />
                <input class="form-text" type="text" name="option{{$i}}" id="option{{$i}}"
                       value="{{$options[$i]['option']}}"
                       onchange="update_checkbox_value(this, 'custom_{{$i.$options[$i]['option']}}');"
                />
            </div>
        </div>
    @endfor
</div>
