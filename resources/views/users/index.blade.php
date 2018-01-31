@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

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

@stop


