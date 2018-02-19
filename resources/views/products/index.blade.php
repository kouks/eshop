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
                <div class="columns is-multiline">
                    @foreach ($products as $product)
                        <div class="column is-4-tablet">
                            @include('products._product')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@stop

