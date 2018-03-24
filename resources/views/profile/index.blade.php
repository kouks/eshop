@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<main class="section is-medium">
    <div class="container">
        <div class="columns">
            <div class="column is-4-tablet">
                <profile></profile>
            </div>

            <div class="column is-offset-2-tablet is-6-tablet">
                <orders></orders>
            </div>
        </div>
    </div>
</main>
@stop


