@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <button class="" onclick="window.print()">Print barcode</button>
    </div>
    <div class="row">
        @foreach(range(0,20) as $i)
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                {!! DNS1D::getBarcodeSVG($product->barcode, 'C39'); !!}
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>


@endsection
