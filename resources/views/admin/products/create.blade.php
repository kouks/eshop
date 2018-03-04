@extends('layouts.admin')

@section('content')
<div class="columns">
    <div class="column is-8-tablet">
        @include('admin.products._form', ['mode' => 'create'])
    </div>
</div>
@stop

@section('heading')
<h1 class="title">Product creation page.</h1>
<h2 class="subtitle">Create new products here.</h2>
@stop
