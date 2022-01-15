<div style="text-decoration: underline">Numbers</div>
<div class="row">
    @foreach(['1','2','3','4','5','6','7','8','9','0'] as $number)
        <div class="col-1">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="options[]" value="{{$number}}" id="{{$number}}"
                    {{ $isSelected($number) ? 'checked=""' : '' }}
                />
                <label class="form-check-label" for="{{$number}}">{{$number}}</label>
            </div>
        </div>
    @endforeach
</div>
