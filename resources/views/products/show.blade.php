@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <button class="" onclick="window.print()">Print barcode</button>
    </div>
    <div class="row">
        @foreach(range(0,38) as $i)
        <div class="gap-3">
            <div class="p-3 g-col-3 fw-bold">
                <div class="text-center fw-bolder">{{$product->name}}</br><b> Price : {{$product->selling_price}} {{ config('settings.currency_symbol') }}</b></div>
                {!! DNS1D::getBarcodeSVG($product->barcode, 'C39'); !!}
            </div>
        </div>     
        @endforeach
    </div>
</div>
@endsection
