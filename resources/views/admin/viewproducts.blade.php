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
              <h2 class="level-right has-text-centered">
                View Products
            </h2>
    </div>
  </div>
</section>

<main class="level-item">
                @include('admin._sidebar')

</main>


@stop
