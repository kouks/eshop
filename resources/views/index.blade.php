@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<header class="hero is-primary is-large is-banner">

        <section class=" hero is-fullheight">

            <div class="hero-body">
                <div class="container-fluid">
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
          </section>

          <link rel="stylesheet" type="text/css" href="button.js">
                         <div class="banner-content">
                            <div class="level-item">

                        <h1 class="title is-main is-level-right has-color-primary">h&amp;p</h1>

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
            <div class="column is-3-tablet">
                @include('products._product')
            </div>
            <div class="column is-3-tablet">
                @include('products._product')
            </div>
            <div class="column is-3-tablet">
                @include('products._product')
            </div>
            <div class="column is-3-tablet">
                @include('products._product')
            </div>
            <div class="column is-3-tablet">
                @include('products._product')
            </div>
            <div class="column is-3-tablet">
                @include('products._product')
            </div>
            <div class="column is-3-tablet">
                @include('products._product')
            </div>
            <div class="column is-3-tablet">
                @include('products._product')
            </div>
        </div>
    </div>
</main>
@stop
