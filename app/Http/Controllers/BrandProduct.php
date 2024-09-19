<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use APP\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
{
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
            return Redirect::to('admin')->send();

    }
    //function admin
    public function add_brand_product(){
        $this->AuthLogin();// xac thuc login
        return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        $this->AuthLogin();// xac thuc login

        $all_brand_product = Brand::all();
        $manager_brand_product=view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    }
    public function save_brand_product(Request $request){
        $this->AuthLogin();// xac thuc login

        $data=$request->all();
        $brand=new Brand();
        $brand->brand_name=$data['brand_product_name'];
        $brand->brand_desc=$data['brand_product_desc'];
        $brand->brand_status=$data['brand_product_status'];
        $brand->save();

        Session::put('message','Them thanh cong');
        return Redirect::to('add-brand-product');
    }
    public function active_brand_product($brand_product_id){
        $this->AuthLogin();// xac thuc login

        $brand = Brand::find($brand_product_id);
        $brand->brand_status = 1;
        $brand->save();
        Session::put('message','Kích hoạt thành công');
        return Redirect::to('all-brand-product');
    }
    public function unactive_brand_product($brand_product_id){
        $this->AuthLogin();// xac thuc login

        $brand = Brand::find($brand_product_id);
        $brand->brand_status = 0;
        $brand->save();
        Session::put('message','Kích hoạt không thành công');
        return Redirect::to('all-brand-product');
    }
    public function edit_brand_product($brand_product_id){
        $this->AuthLogin();// xac thuc login

        // $edit_brand_product = DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->get();
        $edit_brand_product=Brand::find($brand_product_id);
        $manager_brand_product=view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);
    }   
    public function update_brand_product(Request $request,$brand_product_id){
        $this->AuthLogin();// xac thuc login
        $data=$request->all();
        $brand=Brand::find($brand_product_id);
        $brand->brand_name=$data['brand_product_name'];
        $brand->brand_desc=$data['brand_product_desc'];
        $brand->brand_status=$data['brand_product_status'];
        $brand->save();
        Session::put('message','Cap nhat thanh cong');
        return Redirect::to('all-brand-product');
    }
    public function delete_brand_product($brand_product_id){
        $this->AuthLogin();// xac thuc login

        Brand::destroy($brand_product_id);
        Session::put('message','Xoa thanh cong');
        return Redirect::to('all-brand-product');
    }
    //function home page
    public function show_brand_product($brand_id){
        $cate_product = Category::where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brand_product = Brand::where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        $brand_by_id = Product::where('brand_id', $brand_id)->get();
        $brand_name = Brand::where('brand_id', $brand_id)->limit(1)->get();

        return view('pages.brand.show_brand_product')
            ->with('category', $cate_product)
            ->with('brand', $brand_product)
            ->with('brand_by_id', $brand_by_id)
            ->with('brand_name', $brand_name);
    }
}
