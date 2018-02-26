@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<main class="section">
    <shop />
</main>
@stop

