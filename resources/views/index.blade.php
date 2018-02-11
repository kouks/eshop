@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<header class="hero is-primary is-large is-banner">
    <div class="hero-body">
        <div class="container">
            <div class="columns">
                <div class="banner-content">
                    <h1 class="title is-main has-color-primary">h&amp;p</h1>
                    <h2 class="subtitle is-3">The online store.</h2>

                    <form class="global-search" action="/products/search" method="GET">
                        <input
                            class="global-search-input"
                            type="text"
                            name="query"
                            placeholder="Type anything..."
                        ></input>
                        <button class="global-search-button" type="submit">Go!</button>
                    </form>
                </div>
            </div>
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
            @foreach ($products as $product)
                <div class="column is-3-tablet">
                    @include('products._product')
                </div>
            @endforeach
        </div>
    </div>
</main>
@stop
