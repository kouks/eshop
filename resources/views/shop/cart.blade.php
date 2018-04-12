@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<main class="section is-medium">
    <cart></cart>
</main>
@stop
