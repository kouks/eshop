@extends('layouts.app')


@section('content')
<main class="section is-medium">
    <div class="container">
        <div class="columns">
            <div class="column">
                @include('auth._login')
            </div>
            <div class="column">
                @include('auth._register')
            </div>
        </div>
    </div>
</main>
@stop
