@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<main class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-2-tablet">
                @include('products._filters')
            </div>

            <div class="column is-offset-1-tablet is-8-tablet">
                <product-list></product-list>
            </div>
        </div>
    </div>
</main>
@stop

