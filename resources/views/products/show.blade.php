@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<main class="section is-medium">
    <div class="container">
        <div class="columns">
            <div class="column is-3-tablet">
                <figure class="image is-square">
                    <img src="https://i5.walmartimages.com/asr/c478dce2-c1e3-4fd2-98d8-c510357caf29_1.d16daa350e53a82990d8655e89470f6e.jpeg?odnHeight=450&odnWidth=450&odnBg=FFFFFF">
                </figure>
            </div>

            <div class="column is-offset-1-tablet is-6-tablet">
                <nav class="breadcrumb" aria-label="breadcrumbs">
                    <ul>
                        <li><a href="/shop">Products</a></li>
                        <li><a href="/shop?category=men">Men</a></li>
                        <li class="is-active"><a href="#" aria-current="page"><h1 class="title is-3">Men's Shirt Light Blue</h1></a></li>
                    </ul>
                </nav>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque dicta ipsum placeat ipsam architecto. Delectus consequuntur eligendi vero, qui earum, sed maiores omnis. Eum, velit!</p>

                <hr>

                <nav class="level">
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading">Price</p>
                            <p class="title">&pound;15.99</p>
                        </div>
                    </div>

                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading">Stock</p>
                            <p class="title has-text-success">5+</p>
                        </div>
                    </div>
                </nav>

                <div class="columns">
                    <div class="column is-offset-3-tablet is-6-tablet">
                        <form action="/products/asd/cart" method="POST">
                            <div class="field has-addons">
                                <div class="control is-expanded">
                                    <input class="input is-large" type="text" placeholder="Quantity">
                                </div>

                                <div class="control">
                                    <button type="submit" class="button is-primary is-large">Add to Cart</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop

