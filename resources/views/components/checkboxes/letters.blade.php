<div style="text-decoration: underline">Letters</div>
<div class="row">
    @foreach(['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'] as $letter)
        <div class="col-1">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="options[]" value="{{$letter}}" id="{{$letter}}"
                    {{ $isSelected($letter) ? 'checked=""' : '' }}
                />
                <label class="form-check-label" for="{{$letter}}">{{$letter}}</label>
            </div>
        </div>
    @endforeach
</div>
