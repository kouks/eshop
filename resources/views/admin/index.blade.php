@extends('layouts.admin')

@section('content')
<dashboard></dashboard>
@stop

@section('heading')
<h1 class="title">Hello, {{ auth()->user()->name }}.</h1>
<h2 class="subtitle">I hope you are having a great day!</h2>
@stop
