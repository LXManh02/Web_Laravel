@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <!-- <?php
                            $message = Session::get('message');
                            if ($message) {
                                echo $message;
                                Session::put('message', null);
                            }
                            ?> -->
                    @foreach ($edit_product as $key=> $pro )
                    <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" value="{{$pro->product_name}}" name="product_name" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea name="product_desc" class="form-control" id="exampleInputPassword1" required>{{$pro->product_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="text" value="{{$pro->product_price}}" name="product_price" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh hiện tại</label>
                            <div>
                                <img src="{{asset('public/upload/product/' . $pro->product_image) }}" alt="Product Image" width=100px; height=100px;">
                            </div>
                            <label for="exampleInputEmail1">Cập nhật hình ảnh</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control input-md m-bot15">
                                @foreach($cate_product as $key=>$cate )
                                    @if($cate->category_id==$pro->category_id)
                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @else
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Thương Hiệu</label>
                            <select name="product_brand" class="form-control input-md m-bot15">
                                @foreach($brand_product as $key=>$brand )
                                @if($brand->brand_id==$pro->brand_id)
                                <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @else
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hiển thị</label>
                            <select name="product_status" class="form-control input-md m-bot15">
                                <option value="0">Ẩn </option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" name="update_product" class="btn btn-info">Cập nhật</button>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>

    </div>
</div>
@endsection