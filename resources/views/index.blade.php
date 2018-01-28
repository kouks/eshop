@extends('layouts.app')

@section('content')
<header class="hero is-primary is-large">
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title is-2">
                Welcome to Eshop
            </h1>
            <p class="subtitle is-4">

         <div class="box">

            <div class="field is-grouped">
              <p class="control is-expanded">
                <input class="input" type="text" placeholder="search here">
              </p>
              <p class="control">
                <a class="button is-info">
                  click here
                </a>
              </p>
            </div>
          </div>


            </p>
        </div>
      </div>

    <div class="hero-foot">
        <nav class="tabs is-boxed is-fullwidth">
            <div class="container">
                <ul>
                    <li class="is-active">
                        <a>Most Viewed</a>
                    </li>
                    <li>
                        <a>New Stock</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

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
