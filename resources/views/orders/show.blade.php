@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
    				<!-- BEGIN INVOICE -->
					<div class="col-xs-12">
						<div class="grid invoice">
							<div class="grid-body">
								<div class="invoice-title">
									<div class="row">
										<div class="col-xs-12">
											<img src="{{ asset('images/logo.png') }}" alt="" height="35">
											<div>{{ config('app.name') }}</div>
											<div>{{ config('app.description') }}</div>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-sm-6">
											<h2>invoice<br><br>
											<span class="small">order #{{$order->id}}</span></h2>
										</div>
                                        <div class="col-sm-6 text-right">
<button class="" onclick="window.print()">Print invoice</button>
                                        </div>
									</div>
								</div>
								<hr>
								<!-- <div class="row">
									 <div class="col-xs-6">
									 <address>
									 <strong>Billed To:</strong><br>
									 Twitter, Inc.<br>
									 795 Folsom Ave, Suite 600<br>
									 San Francisco, CA 94107<br>
									 <abbr title="Phone">P:</abbr> (123) 456-7890
									 </address>
									 </div>
								     </div> -->
								<div class="row">
									<div class="col-xs-6 text-right">
										<address>
											<strong>Order Date: </strong>{{$order->created_at}}

										</address>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div>ORDER SUMMARY</div>
										<table class="table table-striped" width="1170px">
											<thead>
												<tr class="line">
													<td><strong>#</strong></td>
													<td width="200" class="text-center"><strong>Product Name</strong></td>
													<td class="text-center"><strong>Quantity</strong></td>
													<td class="text-right"><strong>Price</strong></td>
													<td class="text-right"><strong>Subtotal</strong></td>
												</tr>
											</thead>
											<tbody>

   @foreach($order->items as $index => $item)

												<tr>
													<td>{{$index+1}}</td>
													<td><strong>{{$item->product->name}}</strong></td>
													<td class="text-center">{{$item->quantity}}</td>
													<td class="text-center">{{$item->product->selling_price}} {{ config('settings.currency_symbol') }}</td>
													<td class="text-right">{{number_format($item->price,2)}} {{ config('settings.currency_symbol') }}</td>
												</tr>
   @endforeach
												<tr>
													<td colspan="3">
													</td><td class="text-right"><strong>Total</strong></td>
													<td class="text-right"><strong>{{$order->total()}}৳</strong></td>
												</tr>
                                                @if($order->discount != 0)
												<tr>
													<td colspan="3"></td>
													<td class="text-right"><strong>Discount</strong></td>
													<td class="text-right"><strong>{{$order->discount}}৳</strong></td>
												</tr>
                                                @endif
												<tr>
													<td colspan="3"></td>
													<td class="text-right"><strong>Grand Total</strong></td>
													<td class="text-right"><strong>{{$order->total() - $order->discount}}৳</strong></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END INVOICE -->
				</div>
</div>
@endsection
