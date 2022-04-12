@extends('layouts.frontend')

@section('title')
    Dashboard
@endsection

@section('add_css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/dcss/dashboard"/>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success" id="sentNotification" role="alert">
                    Message Sent, please wait 5 seconds before sending another one!
                </div>
                <h1>Twitch Whisper System</h1>
                <hr />
            </div>
        </div>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-12 {{ $category->code }}">
                    <div class="header">
                        {{ $category->name }}
                    </div>
                    <div class="buttons row">
                        @foreach($buttons as $button)
                            @if($button->category->name == $category->name)
                                <x-button :button="$button" />
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('add_js')
{{--    <script type="text/javascript">--}}
{{--        sendCommand('collectpoints');--}}
{{--        sendCommand('collectpointssub');--}}

{{--        setTimeout(() => {--}}
{{--            sendCommand('collectpoints');--}}
{{--            sendCommand('collectpointssub');--}}
{{--        }, 1000*60*20);--}}
{{--    </script>--}}
@endsection
