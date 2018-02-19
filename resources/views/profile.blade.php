@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])





<section class="section">
    <div class="container">
        <hr>
    </div>
</section>


  <section class="container">
    <div class="columns">
      <div class="column is-3">
        <a class="button is-primary is-block is-alt is-large" href="#">Profile Info</a>

        <aside class="menu">
          <ul class="menu-list">
            <li><a>Name: </a></li>
            <li><a>email: </a></li>
            <li><a></a></li>
            <li><a>setting</a></li>
          </ul>
        </aside>

      </div>

      <div class="column is-9">

    <div class="container">
        <div class="box">
            <table class="table is-fullwidth is-striped is-hoverable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Item</th>
                        <th>Satus</th>
                        <th>Invoice</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>123</td>
                        <td>yesterday</td>
                        <td>Shirt</td>
                        <td>Shipped</td>
                        <td><a href="#">PDF</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</section>



@stop


