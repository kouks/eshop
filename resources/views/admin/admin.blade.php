@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])
<main class="section">
                @include('admin._sidebar')

</main>


@stop
