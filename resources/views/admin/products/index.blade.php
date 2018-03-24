@extends('layouts.admin')

@section('content')
<div class="box">
    <table class="table is-fullwidth is-striped is-hoverable">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th colspan="2">Manage</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $product)
                @include('admin.products._product')
            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('heading')
<h1 class="title">Product management page.</h1>
<h2 class="subtitle">List, edit and remove products on this page.</h2>
@stop
