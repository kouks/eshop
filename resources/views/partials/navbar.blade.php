<nav class="navbar is-primary">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                E-Shop
                {{-- We need a custom logo with a better name here. --}}
            </a>

            <span class="navbar-burger" data-target="menu" id="menu-burger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <div class="navbar-menu" id="menu">
            <div class="navbar-end">
                <span class="navbar-item">
                    <a class="button is-primary is-inverted" href="/login">
                        <span class="icon">
                            <i class="fa fa-key"></i>
                        </span>
                        <span>Login</span>
                    </a>
                </span>
                <span class="navbar-item">
                    <a class="button is-primary is-inverted" href="/register">
                        <span class="icon">
                            <i class="fa fa-user"></i>
                        </span>
                        <span>Register</span>
                    </a>
                </span>
                <span class="navbar-item">
                    <a class="button is-primary is-inverted" href="/cart">
                        <span class="icon">
                            <i class="fa fa-shopping-cart"></i>
                        </span>
                        <span>My Cart</span>
                    </a>
                </span>
            </div>
        </div>
    </div>
</nav>

<section class="hero is-primary">
    <div class="hero-foot">
        <div class="container">
            <div class="tabs is-centered is-boxed is-medium">
                <ul>
                    <li>
                        <a href="/men">Men</a>
                    </li>
                    <li>
                        <a href="/women">Women</a>
                    </li>
                    <li>
                        <a href="/kids">Kids</a>
                    </li>
                    <li>
                        <a href="/shoes">Shoes</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

