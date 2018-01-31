@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<<<<<<< HEAD
        <main class="section">
            <div class="container">
                <div class="columns">

                    <div class="column is-2-tablet">
                        @include('users.partials.sidebar')
                    </div>

                    <div class="columns is-9-tablet is-offset-1-tablet">
                        <div class="box level-right">
                            <table class="table is-fullwidth is-striped is-hoverable">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>order date</th>
                                        <th>Price</th>
                                        <th>Satus</th>
                                        <th>invoice</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </main>





=======
<main class="section">
    <div class="container">
        User data, editable
    </div>
</main>

<section class="section">
    <div class="container">
        <hr>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="box">
            <table class="table is-fullwidth is-striped is-hoverable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Item</th>
                        <th>Satus</th>
                        <th>Invoice</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>123</td>
                        <td>yesterday</td>
                        <td>Shirt</td>
                        <td>Shipped</td>
                        <td><a href="#">PDF</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
>>>>>>> 4421887e23f89d50c647125e4374185ef1e7f1e0
@stop


