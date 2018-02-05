@extends('layouts.admin')

@section('content')
<nav class="level">
    <div class="level-item has-text-centered">
        <div>
            <p class="heading">Customers</p>
            <p class="title">123</p>
        </div>
    </div>
    <div class="level-item has-text-centered">
        <div>
            <p class="heading">Products</p>
            <p class="title">12K</p>
        </div>
    </div>
    <div class="level-item has-text-centered">
        <div>
            <p class="heading">Open Orders</p>
            <p class="title">789</p>
        </div>
    </div>
</nav>

<hr>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($users as $index => $user)
            <tr>
                <td>{{ $index }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['email'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('heading')
<h1 class="title">Hello, Admin.</h1>
<h2 class="subtitle">I hope you are having a great day!</h2>
@stop
