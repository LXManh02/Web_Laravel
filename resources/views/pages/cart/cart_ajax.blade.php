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
	<table class="table table-condensed">
		<thead>
			<tr class="cart_menu">
				<td class="image">Hình ảnh</td>
				<td class="description">Tên sản phẩm</td>
				<td class="price">Giá sản phẩm</td>
				<td class="quantity">Số lượng</td>
				<td class="total">Thành tiền</td>
				<td></td>
			</tr>
		</thead>
		<tbody>

			@php
			$total = 0;
			@endphp
			@foreach(Session::get('cart') as $key => $cart)
			@php
			$subtotal = $cart['product_price']*$cart['product_qty'];
			$total+=$subtotal;
			@endphp


			<tr>
				<td class="cart_product">
					<img src="{{asset('public/upload/product/'.$cart['product_image'])}}" width="90" alt="{{$cart['product_name']}}" />
				</td>
				<td class="cart_description">
					<h4><a href=""></a></h4>
					<p>{{$cart['product_name']}}</p>
				</td>
				<td class="cart_price">
					<p>{{number_format($cart['product_price'], 0, ',', '.')}} VNĐ</p>
				</td>
				<td class="cart_quantity">
					<div class="cart_quantity_button">
						<form action="" method="POST">
							<input class="cart_quantity_" type="number" min="1" name="cart_quantity" value="{{$cart['product_qty']}}" width="50px">
							<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
						</form>
					</div>
				</td>
				<td class="cart_total">
					<p class="cart_total_price">{{number_format($subtotal, 0, ',', '.')}} VNĐ</p>
				</td>
				<td class="cart_delete">
					<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
				</td>
			</tr>
			@endforeach
			
		</tbody>
	</table>
</div>
</div>
<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
<div class="col-sm-6">
<div class="total_area">
	<ul>
		<li>Tổng tiền<span>{{number_format($total, 0, ',', '.').' VNĐ'}}</span></li>
		<li>Thuế<span>{{Cart::tax( 0, '', '.').' VNĐ'}}</span></li>
		<li>Phí vận chuyển<span>Free</span></li>
		<li>Thành tiền<span>{{Cart::total( 0, '', '.').' VNĐ'}}</span></li>
	</ul>
</div>
</div>
</div>
</section><!--/#do_action-->
</section><!--/#do_action-->
@endsection