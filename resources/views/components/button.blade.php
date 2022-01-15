<div class='col-lg-4 col-md-6 col-sm-12'>
    <button onclick='buttonPress(this);' id='{{ $button->command . $button->id }}' type='button' class='btn btn-block twitch-btn btn-lg mb-2'>{{ $button->command }}</button>
    @if(!$button->options->isEmpty())

    <select onchange='updateButton("{{ $button->command . $button->id }}", this.value, "{{ $button->command }}")' class="button btn btn-block form-control">
        @foreach($button->options as $option)
        <option value="{{ $option->option }}">{{ $option->option }}</option>
        @endforeach
    </select>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            updateButton("{{ $button->command . $button->id }}", "{{$button->options[0]->option}}", "{{ $button->command }}");
        }, false);
    </script>
    @endif
    <div class='desc'>{{ $button->description }}</div>
    <div class='points'>Requires {{ $button->price }} {{ $button->currency->currency }}</div>
</div>
