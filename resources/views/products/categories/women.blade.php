@extends('layouts.app')

@section('content')
<br>

<div class="tabs is-centered is-boxed is-medium">
  <ul>
    <li class="is-active">
      <a href="/men">
        <span class="icon"><i class="#"></i></span>
        <span>Men</span>
      </a>
    </li>
    <li>
      <a href="/women">
        <span class="icon"><i class="#"></i></span>
        <span>Women</span>
      </a>
    </li>
    <li>
      <a href="/kids">
        <span class="icon"><i class="#"></i></span>
        <span>Kids</span>
      </a>
    </li>
    <li>
      <a href="/shoes">
        <span class="icon"><i class="#"></i></span>
        <span>Shoes</span>
      </a>
    </li>
  </ul>
</div>
@stop

