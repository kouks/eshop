@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<header class="hero is-primary is-large is-banner">
    <div class="hero-body">
        <div class="container">
            <global-search></global-search>
        </div>
    </div>
</header>

<section class="section">
    <div class="container has-text-centered">
        <h2 class="title is-3">Trending Products</h2>
    </div>
</section>

<main class="section">
    <div class="container">
        <div class="columns is-multiline">
            <product-list></product-list>
        </div>
    </div>
</main>
@stop
