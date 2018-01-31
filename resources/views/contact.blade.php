@extends('layouts.app')

@section('content')
@include('partials.tabs', ['active' => false])

<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-offset-1-tablet is-3-tablet">
                <figure class="image is-square">
                    <img src="https://bulma.io/images/placeholders/256x256.png">
                </figure>
            </div>

            <div class="column is-offset-1-tablet is-6-tablet">
                <h3 class="title is-3">Hussein Bahdon</h3>
                <hr>
                <div class="columns is-mobile is-multiline">
                    <div class="column is-3">
                        <strong>Email</strong><br>
                        <strong>Phone</strong><br>
                        <strong>Position</strong>
                    </div>
                    <div class="column is-9">
                        <a href="mailto:hb641@live.mdx.ac.uk">hb641@live.mdx.ac.uk</a><br>
                        (+44) 12345 12345<br>
                        Frontend Engineer &middot; Website Designer

                    </div>
                    <div class="column">
                        <a target="_blank" href="https://github.com/HusseinMccoin">GitHub</a>
                        &nbsp;&middot;&nbsp;
                        <a target="_blank" href="#">Anything</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-offset-1-tablet is-6-tablet">
                <h3 class="title is-3">Pavel Koch</h3>
                <hr>
                <div class="columns is-mobile is-multiline">
                    <div class="column is-3">
                        <strong>Email</strong><br>
                        <strong>Phone</strong><br>
                        <strong>Position</strong>
                    </div>
                    <div class="column is-9">
                        <a href="mailto:kouks.koch@gmail.com">kouks.koch@gmail.com</a><br>
                        (+44) 75435 54198<br>
                        Backend Developer &middot; Database Administrator
                    </div>
                    <div class="column">
                        <a target="_blank" href="https://github.com/kouks">GitHub</a>
                        &nbsp;&middot;&nbsp;
                        <a target="_blank" href="https://pavelkoch.io">Portfolio</a>
                    </div>
                </div>
            </div>

            <div class="column is-offset-1-tablet is-3-tablet">
                <figure class="image is-square">
                    <img src="https://bulma.io/images/placeholders/256x256.png">
                </figure>
            </div>
        </div>
    </div>
</section>
@stop
