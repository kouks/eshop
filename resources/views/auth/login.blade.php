@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<main class="section is-medium">
    <div class="container has-text-centered">
        <div class="columns">
            <div class="column is-4-tablet is-offset-4-tablet">
                @include('auth._login')
            </div>
        </div>
    </div>
</main>
@stop

