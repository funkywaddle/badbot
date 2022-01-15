@if(isset($user))
    <x-header :user='$user' />
@else
    <x-header />
@endif
@section('content')
@show
<x-footer />
