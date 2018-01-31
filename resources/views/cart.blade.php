@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<main class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-8-tablet">
                <div class="box">
                    <table class="table is-striped is-hoverable is-fullwidth">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Manage</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <figure class="image is-128x128">
                                        <img src="https://bulma.io/images/placeholders/256x256.png">
                                    </figure>
                                </td>
                                <td>&pound;15.99</td>
                                <td><a class="has-text-danger">Remove</a></td>
                            </tr>
                            <tr>
                                <td>
                                    <figure class="image is-128x128">
                                        <img src="https://bulma.io/images/placeholders/256x256.png">
                                    </figure>
                                </td>
                                <td>&pound;25.99</td>
                                <td><a class="has-text-danger">Remove</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="column is-offset-1-tablet is-2-tablet">
                <table class="table is-fullwidth">
                    <tbody>
                        <tr>
                            <td>Shirt</td>
                            <td class="has-text-right">&pound;15.99</td>
                        </tr>

                        <tr>
                            <td>Jacket</td>
                            <td class="has-text-right">&pound;25.99</td>
                        </tr>

                        <tr>
                            <td>Shipping</td>
                            <td class="has-text-right">&pound;4.99</td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Total:</th>
                            <th class="has-text-right">&pound;46.97</th>
                        </tr>
                    </tfoot>

                </table>
                <button class="button is-primary is-large is-fullwidth">Checkout</button>
            </div>
        </div>
    </div>
</main>
@stop




