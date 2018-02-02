@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<main class="section is-medium">
    <div class="container">
        <div class="columns">
            <div class="column is-4-tablet">
                <h1 class="title is-3">Account Settings</h1>

                @include('profile._form')
            </div>

            <div class="column is-offset-2-tablet is-6-tablet">
                <h1 class="title is-3">Past Orders</h1>

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
    </div>
</main>
@stop


