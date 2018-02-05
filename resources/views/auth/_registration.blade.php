<h1 class="title is-3">Sign Up</h3>
<p class="subtitle">Please sign up to create an account.</p>

<div class="box">
  <form action="/register" method="post">
    <div class="field">
        <input class="input is-large" type="text" placeholder="Your Full Name" name="name">
    </div>

    <div class="field">
        <input class="input is-large" type="email" placeholder="Your Email" name="email">
    </div>

    <div class="field">
        <input class="input is-large" type="password" placeholder="Your Password" name="password">
    </div>

    <div class="field">
        <input class="input is-large" type="password" placeholder="Confirm Password" name="password_confirmation">
    </div>

    <button type="submit" class="button is-block is-primary is-large is-fullwidth">Register</button>
  </form>
</div>

<p>
    <a href="/login">Login</a>
</p>
