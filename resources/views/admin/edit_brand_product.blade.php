@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật thương hiệu
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo $message;
                        Session::put('message', null);
                    }
                    ?>
                    <!-- @foreach ($edit_brand_product as $key => $edit_value )
                
                @endforeach -->
                    <form role="form" action="{{URL::to('/update-brand-product/'.$edit_brand_product->brand_id)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInput">Tên thương hiệu</label>
                            <input type="text" value="{{$edit_brand_product->brand_name}}" name="brand_product_name" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInput">Mô tả thương hiệu</label>
                            <textarea style="resize:none" rows="5" name="brand_product_desc" class="form-control" id="exampleInputPassword1">{{$edit_brand_product->brand_desc}}</textarea>
                        </div>
                        <div class="form-group">
    <label for="brand_product_status">Hiển thị</label>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="brand_product_status" name="brand_product_status" value="1" checked>
        <label class="form-check-label" for="brand_product_status">Hiển thị</label>
    </div>
</div>


                        <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection