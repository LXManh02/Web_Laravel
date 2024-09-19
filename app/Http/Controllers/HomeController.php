<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use APP\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
session_start();
class HomeController extends Controller
{
    public function index(){
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->orderBy('product_id','desc')->limit(8)->get();
        
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }
    public function search(Request $request){
        $keyword=$request->search_keywords;
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $search_product=DB::table('tbl_product')->where('product_name','like','%'.$keyword.'%')->get();
        return view('pages.product.search')->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('search_product',$search_product);
    }
    public function send_mail(){
        $to_name="Lê Mạnh";
        $to_email="20111063746@hunre.edu.vn";
        $data=array("name"=>"Mail gui hang","body"=>"Xin chao quy khach");
        Mail::send('pages.send_mail',$data,function($message)use($to_name,$to_email){
            $message->to($to_email)->subject('Test gui mail');
            $message->from($to_email,$to_name);
        });
        return Redirect('/')->with('message','');
    }
}
