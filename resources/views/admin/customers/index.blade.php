@extends('layouts.admin')

@section('content')
<div class="box">
    <table class="table is-fullwidth is-striped is-hoverable">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $index => $customer)
                @include('admin.customers._customer')
            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('heading')
    <h1 class="title">Product management page.</h1>
    <h2 class="subtitle">List, edit and remove products on this page.</h2>
@stop
