<nav class="navbar is-primary">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <h1>h&amp;p</h1>
            </a>

            <span class="navbar-burger" data-target="menu" id="menu-burger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <div class="navbar-menu" id="menu">
            <div class="navbar-end">
                @if (auth()->logged())
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="/profile">
                            {{ auth()->user()->name }}
                        </a>

                        <div class="navbar-dropdown is-boxed">
                            <a class="navbar-item" href="/profile">
                                Profile
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item is-static" href="/logout">
                                Logout
                            </a>
                        </div>
                    </div>
                @else
                    <a class="navbar-item" href="/login">
                        Login
                    </a>
                    <a class="navbar-item" href="/register">
                        Register
                    </a>
                @endif

                <a class="navbar-item" href="/cart">
                    <span class="tag is-light"><i class="fa fa-shopping-cart"></i>&nbsp;(0)</span>
                </a>
            </div>
        </div>
    </div>
</nav>
