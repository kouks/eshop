@extends('layouts.app')

@section('content')
<main class="section is-medium">
    <div class="container">
        @include('auth._login-form')
    </div>
</main>
@stop

