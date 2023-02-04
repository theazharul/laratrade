@extends('layouts.admin')

@section('title', 'Orders List')
@section('content-header', 'Order List')
@section('content-actions')
    <a href="{{route('cart.index')}}" class="btn btn-primary">Open POS</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-7"></div>
            <div class="col-md-5">
                <form action="{{route('orders.index')}}">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="date" name="start_date" class="form-control" value="{{request('start_date')}}" />
                        </div>
                        <div class="col-md-5">
                            <input type="date" name="end_date" class="form-control" value="{{request('end_date')}}" />
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-outline-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Total</th>
                    <th>Discount</th>
                    <th>Received Amount</th>
                    <th>Status</th>
                    <th>To Pay</th>
                    <th>Created At</th>
                    <th>Created By</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-primary">{{$order->id}}</a></td>
                    <td>{{$order->getCustomerName()}}</td>
                    <td>{{$order->formattedTotal()}}{{ config('settings.currency_symbol') }} </td>
                    <td> {{$order->discount}} {{ config('settings.currency_symbol') }}</td>
                    <td> {{$order->formattedReceivedAmount()}} {{ config('settings.currency_symbol') }}</td>
                    <td>
                        @if($order->receivedAmount() == 0)
                            <span class="badge badge-danger">Not Paid</span>
                        @elseif($order->receivedAmount() < $order->total() - $order->discount)
                            <span class="badge badge-warning">Partial</span>
                        @elseif($order->receivedAmount() == $order->total() - $order->discount)
                            <span class="badge badge-success">Paid</span>
                        @elseif($order->receivedAmount() > $order->total() - $order->discount)
                            <span class="badge badge-info">Change</span>
                        @endif
                    </td>
                    <td> {{number_format($order->total() - $order->receivedAmount() - $order->discount, 2)}} {{config('settings.currency_symbol')}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->created_by}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th>{{ number_format($total, 2) }} {{ config('settings.currency_symbol') }} </th>
                    <th> {{ number_format($totalDiscount, 2) }} {{ config('settings.currency_symbol') }}</th>
                    <th> {{ number_format($receivedAmount, 2) }} {{ config('settings.currency_symbol') }}</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        {{ $orders->render() }}
    </div>
</div>
@endsection

