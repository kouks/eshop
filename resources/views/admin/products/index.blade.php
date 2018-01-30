@extends('layouts.admin')

@section('content')
<div class="box">
<table class="table is-fullwidth is-striped is-hoverable">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Image</th>
            <th colspan="2">Manage</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>1</th>
            <td>Shirt</td>
            <td>Men</td>
            <td>&pound;44.99</td>
            <td>
                <div class="tags has-addons">
                    <span class="tag is-primary"><i class="fa fa-minus"></i></span>
                    <span class="tag"><b>10</b></span>
                    <span class="tag is-primary"><i class="fa fa-plus"></i></span>
                </div>
            </td>
            <td><a href="#" class="has-text-link"><i class="fa fa-image"></i></a></td>
            <td><a href="#" class="has-text-link">Edit</a></td>
            <td><a href="#" class="has-text-danger">Delete</a></td>
        </tr>
        <tr>
            <th>2</th>
            <td>Blouse</td>
            <td>Women</td>
            <td>&pound;89.99</td>
            <td>
                <div class="tags has-addons">
                    <span class="tag is-primary"><i class="fa fa-minus"></i></span>
                    <span class="tag"><b>5</b></span>
                    <span class="tag is-primary"><i class="fa fa-plus"></i></span>
                </div>
            </td>
            <td><a href="#" class="has-text-link"><i class="fa fa-image"></i></a></td>
            <td><a href="#" class="has-text-link">Edit</a></td>
            <td><a href="#" class="has-text-danger">Delete</a></td>
        </tr>
        <tr>
            <th>3</th>
            <td>Jeans</td>
            <td>Men</td>
            <td>&pound;22.99</td>
            <td>
                <div class="tags has-addons">
                    <span class="tag is-primary"><i class="fa fa-minus"></i></span>
                    <span class="tag"><b>12</b></span>
                    <span class="tag is-primary"><i class="fa fa-plus"></i></span>
                </div>
            </td>
            <td><a href="#" class="has-text-link"><i class="fa fa-image"></i></a></td>
            <td><a href="#" class="has-text-link">Edit</a></td>
            <td><a href="#" class="has-text-danger">Delete</a></td>
        </tr>
        <tr>
            <th>4</th>
            <td>Jacket</td>
            <td>Kids</td>
            <td>&pound;59.99</td>
            <td>
                <div class="tags has-addons">
                    <span class="tag is-primary"><i class="fa fa-minus"></i></span>
                    <span class="tag"><b>3</b></span>
                    <span class="tag is-primary"><i class="fa fa-plus"></i></span>
                </div>
            </td>
            <td><a href="#" class="has-text-link"><i class="fa fa-image"></i></a></td>
            <td><a href="#" class="has-text-link">Edit</a></td>
            <td><a href="#" class="has-text-danger">Delete</a></td>
        </tr>
    </tbody>
</table>
</div>
@stop

@section('heading')
<h1 class="title">Product management page.</h1>
<h2 class="subtitle">List, edit and remove products on this page.</h2>
@stop
