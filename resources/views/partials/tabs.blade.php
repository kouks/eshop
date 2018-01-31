<section class="hero is-primary">
    <div class="hero-foot">
        <div class="container">
            <div class="tabs is-centered is-boxed is-medium">

                <ul>
                    <li class="{{ $active !== 'men' ?: 'is-active '}}">
                        <a href="/men">Men</a>
                    </li>
                    <li class="{{ $active !== 'women' ?: 'is-active '}}">
                        <a href="/women">Women</a>
                    </li>
                    <li class="{{ $active !== 'kids' ?: 'is-active '}}">
                        <a href="/kids">Kids</a>
                    </li>
                    <li class="{{ $active !== 'shoes' ?: 'is-active '}}">
                        <a href="/shoes">Shoes</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


</section>
