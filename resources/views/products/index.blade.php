@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<main class="section">
    <div class="container">
        <div class="columns is-multiline">
            <div class="column is-3-tablet">
                @include('products._product')
            </div>
            <div class="column is-3-tablet">
                @include('products._product')
            </div>
            <div class="column is-3-tablet">
                @include('products._product')
            </div>
            <div class="column is-3-tablet">
                @include('products._product')
            </div>
        </div>
    </div>
</main>
@stop

