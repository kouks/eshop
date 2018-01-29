@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<section class="hero is-light">
  <div class="hero-body">
    <div class="container">
     <h1 class="title">
                Hello, Admin.
              </h1>
              <h2 class="subtitle">
                I hope you are having a great day!
              </h2>
    </div>
  </div>
</section>

 <section class="info-tiles">
          <div class="tile is-ancestor has-text-centered">
            <div class="tile is-parent">
              <article class="tile is-child box">
                <p class="subtitle">Users</p>
                <p class="title">2</p>
              </article>
            </div>
            <div class="tile is-parent">
              <article class="tile is-child box">
                <p class="subtitle">Products</p>
                <p class="title">0</p>
              </article>
            </div>
            <div class="tile is-parent">
              <article class="tile is-child box">
                <p class="subtitle">Open Orders</p>
                <p class="title">0</p>
              </article>
            </div>

          </div>
        </section>

<br>

<main class="level-item">
                @include('admin._sidebar')

</main>




@stop
