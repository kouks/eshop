@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<main class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-3-tablet">
                @include('products._filters')
            </div>
            <div class="column is-8-tablet">
                <div class="columns is-multiline">
                    <div class="column is-4-tablet">
                        @include('products._product')
                    </div>
                    <div class="column is-4-tablet">
                        @include('products._product')
                    </div>
                    <div class="column is-4-tablet">
                        @include('products._product')
                    </div>
                    <div class="column is-4-tablet">
                        @include('products._product')
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop

