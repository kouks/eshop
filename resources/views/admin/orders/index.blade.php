@extends('layouts.admin')

@section('content')
<div class="box">
    <table class="table is-fullwidth is-striped is-hoverable">
        <thead>
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Status</th>
                <th>Placed</th>
                <th>Products</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                @include('admin.orders._order')
            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('heading')
    <h1 class="title">Product management page.</h1>
    <h2 class="subtitle">List, edit and remove products on this page.</h2>
@stop
