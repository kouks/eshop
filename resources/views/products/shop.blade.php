@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<main class="section">
    <div class="container">
        <div class="columns is-multiline">
            @foreach ($products as $product)
                <div class="column is-3-tablet">
                    @include('products._product')
                </div>
            @endforeach
        </div>
    </div>
</main>
@stop

