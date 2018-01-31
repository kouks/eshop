@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

        <main class="section">
            <div class="container">
                <div class="columns">

                    <div class="column is-2-tablet">
                        @include('users.partials.sidebar')
                    </div>

                    <div class="columns is-9-tablet is-offset-1-tablet">
                        <div class="box level-right">
                            <table class="table is-fullwidth is-striped is-hoverable">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>order date</th>
                                        <th>Price</th>
                                        <th>Satus</th>
                                        <th>invoice</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </main>





@stop


