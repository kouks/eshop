<section class="hero is-primary">
    <div class="hero-foot">
        <div class="container">
            <div class="tabs is-centered is-boxed is-medium">
                <ul>
                    <li class="{{ $active !== 'men' ?: 'is-active '}}">
                        <a href="/shop?category=men">Men</a>
                    </li>
                    <li class="{{ $active !== 'women' ?: 'is-active '}}">
                        <a href="/shop?category=women">Women</a>
                    </li>
                    <li class="{{ $active !== 'kids' ?: 'is-active '}}">
                        <a href="/shop?category=kids">Kids</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

@include('partials.messages')
