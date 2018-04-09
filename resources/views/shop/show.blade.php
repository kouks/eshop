@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<main class="section is-medium">
    <product slug="{{ $slug }}"></product>
</main>

<section class="section is-medium">
    <suggestions slug="{{ $slug }}"></suggestions>
</section>
@stop
