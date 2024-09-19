@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="{{URL::to('/trangchu')}}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div><!--/breadcrums-->
			<div class="review-payment">
				<h2>Xem đơn hàng</h2>
			</div>
            <div class="table-responsive cart_info">
			<?php
			$content = Cart::content();
			?>
			<table class="table table-condensed" >
				<thead>
					<tr class="cart_menu">
						<td class="image">Hình ảnh</td>
						<td class="description">Tên sản phẩm</td>
						<td class="price">Giá</td>
						<td class="quantity">Số lượng</td>
						<td class="total">Tổng tiền</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach ($content as $value_cart )


					<tr>
						<td class="cart_product">
							<a href=""><img src="{{URL::to('public/upload/product/'.$value_cart->options->image)}}" alt="" height="50px" width="50px" />
						</td>
						<td class="cart_description">
							<h4>{{$value_cart->name}}</h4>
						</td>
						<td class="cart_price">
                            <h4><p>{{number_format($value_cart->price, 0, '', '.').' VNĐ'}}</p></h4>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<form action="{{URL::to('/update-cart-quantity')}}" method="post">
									{{csrf_field()}}
                                    <h4><p>{{$value_cart->qty}}</p></h4>
									<input class="form-control" type="hidden" value="{{$value_cart->rowId}}" name="rowId_cart">
								</form>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">
								<?php
								$subtotal = $value_cart->price * $value_cart->qty;
								echo number_format($subtotal, 0, '', '.') . ' VNĐ';
								?>
							</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$value_cart->rowId)}}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
            <h3 >Hình thức thanh toán</h3>
            <form action="{{URL::to('/order-place')}}" method="post">
                {{csrf_field()}}
			<div class="payment-options" style="margin-top: 20px;">
                <span>
                    <label><input type="checkbox" name="payment_option" value="1"> Thanh toán ATM</label>
                </span>
                <span>
                    <label><input type="checkbox" name="payment_option" value="2"> SHIP COD</label>
                </span>
                <button type="submit" name="send_order" class="btn btn-primary">Đặt hàng</button>
                <!-- <span>
                    <label><input type="checkbox"> Paypal</label>
                </span> -->
			</div>
            </form>
		</div>
	</section> <!--/#cart_items-->
@endsection