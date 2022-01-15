<div style="text-decoration: underline">Specials</div>
<div class="row">
    @foreach(['TAB','LSHIFT','SPACE','LCTRL','SHIFT','CTRL'] as $special)
        <div class="col-2">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="options[]" value="{{$special}}" id="{{$special}}"
                    {{ $isSelected($special) ? 'checked' : '' }}
                />
                <label class="form-check-label" for="{{$special}}">{{$special}}</label>
            </div>
        </div>
    @endforeach
</div>
