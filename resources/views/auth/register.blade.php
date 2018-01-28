@extends('layouts.app')

@section('content')
<main class="section is-medium">
    <div class="container">
        <div class="columns">
 <section class="hero is-success is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
          <h3 class="title has-text-grey">Sign Up</h3>
          <p class="subtitle has-text-grey">Please sign up to create an account</p>
          <div class="box">
            <figure class="avatar">
              <img src="https://png.icons8.com/windows/540/user-male-circle.png">
            </figure>
            <form>
              <div class="field">
                <div class="control">
                  <input class="input is-large" type="email" placeholder="Your Email" autofocus="">
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <input class="input is-large" type="password" placeholder="Your Password">
                </div>
              </div>
              <div class="field">
                <label class="checkbox">
                  <input type="checkbox">
                  Remember me
                </label>
              </div>
              <a class="button is-block is-info is-large">Login</a>
            </form>
          </div>
          <p class="has-text-grey">
            <a href="/login">login</a> &nbsp;·&nbsp;
            <a href="#">Forgot Password</a> &nbsp;·&nbsp;
          </p>
        </div>
      </div>
    </div>
  </section>

    </div>
    </div>
</main>
@stop
