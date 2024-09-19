@extends('layout')
@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/trangchu')}}">Trang chủ</a></li>
				<li class="active">Giỏ hàng</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<?php
			$content = Cart::content();
			?>
			<table class="table table-condensed">
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
							<h4><a href="">{{$value_cart->name}}</a></h4>
						</td>
						<td class="cart_price">
							<p>{{number_format($value_cart->price, 0, '', '.').' VNĐ'}}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<form action="{{URL::to('/update-cart-quantity')}}" method="post">
									{{csrf_field()}}
									<input class="cart_quantity_input" type="number" min="1" name="cart_quantity" value="{{$value_cart->qty}}">
									<input class="form-control" type="hidden" value="{{$value_cart->rowId}}" name="rowId_cart">
									<input class="btn btn-default btn-sm" type="submit" value="Cập nhật" name="update_qty">
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
	</div>
</section> <!--/#cart_items-->
<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>Thanh toán</h3>
			<p>Chọn</p>
		</div>
		<div class="col-sm-6">
			<div class="total_area">
				<ul>
					<li>Tổng tiền<span>{{Cart::subtotal(0, '', '.').' VNĐ'}}</span></li>
					<li>Thuế<span>{{Cart::tax( 0, '', '.').' VNĐ'}}</span></li>
					<li>Phí vận chuyển<span>Free</span></li>
					<li>Thành tiền<span>{{Cart::total( 0, '', '.').' VNĐ'}}</span></li>
				</ul>
				<a class="btn btn-default update" href="">Update</a>
				<?php
				$customer_id = Session::get('customer_id');
				if ($customer_id != NULL) {
				?>
					<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
				<?php
				} else {
				?>
					<a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
				<?php
				} ?>
			</div>
		</div>
	</div>
	</div>
</section><!--/#do_action-->

@endsection