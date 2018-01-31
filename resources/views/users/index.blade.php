@extends('layouts.users')

@section('content')
@include('partials.tabs', ['active' => false])


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


@stop


