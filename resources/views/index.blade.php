@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<header class="hero is-primary is-large is-banner">
    <div class="hero-body">
        <div class="container">
            <global-search />
        </div>
    </div>
</header>

<section class="section">
    <div class="container has-text-centered">
        <h1 class="title is-3">Trending Products</h1>
    </div>
</section>

<main class="section">
    <div class="container">
        <div class="columns is-multiline">
            <product-list />
        </div>
    </div>
</main>
@stop
