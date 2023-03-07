@extends('layouts.admin')

@section('title', 'Product List')
@section('content-header', 'Product List')
@section('content-actions')
<div class="row">
       <div class="col-md-4 offset-md-8">
        <button class="" onclick="window.print()">Print stock</button>
       </div> 
</div>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
<div class="card product-list">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Barcode</th>
                    <th>Purchase Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Item Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                   <td><a href="{{ route('products.show', $product) }}">{{$product->barcode}}</a></td>
                    <td>{{$product->purchase_price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>
                        <span
                            class="right badge badge-{{ $product->status ? 'success' : 'danger' }}">{{$product->status ? 'Active' : 'Inactive'}}</span>
                    </td>
                    <td>{{$product->purchase_price * $product->quantity}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
