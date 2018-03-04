@extends('layouts.admin')

@section('content')
<div class="columns">
    <div class="column is-8-tablet">
        @include('admin.products._form', ['mode' => 'edit'])
    </div>
</div>
@stop

@section('heading')
<h1 class="title">Product editing page.</h1>
<h2 class="subtitle">Edit a product here.</h2>
@stop
