@extends('layouts.admin')

@section('title', 'Product List')
@section('content-header', 'Product List')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@endsection

@section('content')

<div class="row">
        @foreach($products as $product)
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                <a href="{{ route('products.show', $product) }}">
                    {!! DNS1D::getBarcodeSVG($product->barcode, 'C39'); !!}
                </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
        

@endsection