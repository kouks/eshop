<h1 class="title is-3">Login</h3>
<p class="subtitle">Please login to proceed.</p>

<div class="box">
    <form action="/login" method="POST">
        <div class="field">
            <input class="input is-large" type="email" placeholder="Your Email" name="email" value="{{ old('email') }}">
        </div>

        <div class="field">
            <input class="input is-large" type="password" placeholder="Your Password" name="password">
        </div>

        <button type="submit" class="button is-block is-primary is-large is-fullwidth">Login</button>
    </form>
</div>

<p class="has-text-grey">
    <a href="/register">Register</a>
    <b>&middot;</b>
    <a href="#">Forgot Password</a>
</p>
