@extends('layouts.base')

@section('content')

<div class="content">
    <div class="title m-b-md">
        @if (Auth::check())
            Hello, {{Auth::user()->name}}
        @else
        Please Log in
            @endif
    </div>
</div>

@stop