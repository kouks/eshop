@extends('layouts.app')

@section('content')

<section class="hero is-info is-large">
 <div class="hero-body">
    <div class="container has-text-centered">
      <p class="title">
        Welcome to Eshop
      </p>
      <p class="subtitle">
      </p>
    </div>
  </div>

  <div class="hero-foot">
    <nav class="tabs is-boxed is-fullwidth">
      <div class="container">
        <ul>
          <li class="is-active">
            <a>most viewed products</a>
          </li>
          <li>
            <a>new stock</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</section>
<br>



<div class="tile is-ancestor"  >
  <div class="tile is-vertical is-8" >
    <div class="tile">
      <div class="tile is-parent is-vertical">
        <article class="tile is-child notification "  >
          <p class="title">Men wears</p>
          <p class="subtitle"></p>
        </article>
        <article class="tile is-child notification ">
          <p class="title">##</p>
          <p class="subtitle">##</p>
        </article>
      </div>
      <div class="tile is-parent">
        <article class="tile is-child notification ">
          <p class="title">##</p>
          <p class="subtitle">##</p>
          <figure class="image is-4by3">
            <img src="https://ukmodels-jd3znlzw.netdna-ssl.com/wp-content/uploads/2015/08/shutterstock_266498825.jpg">
          </figure>
        </article>
      </div>
    </div>
    <div class="tile is-parent">
      <article class="tile is-child notification ">
        <p class="title">##</p>
        <p class="subtitle">##</p>
        <div class="content">
          <!-- Content -->
        </div>
      </article>
    </div>
  </div>
  <div class="tile is-parent">
    <article class="tile is-child notification ">
      <div class="content">
        <p class="title">##</p>
        <p class="subtitle">##</p>
        <div class="content">
          <!-- Content -->
        </div>
      </div>
    </article>
  </div>
</div>

@stop
