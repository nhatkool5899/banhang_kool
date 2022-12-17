<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\Session\Session;
session_start();

class HomeController extends Controller
{
    public function index()
    {
        // Seo
        $meta_desc = "Shop bán hàng laravel";
        // Seo
        $cat_pd = DB::table('tbl_category_product')->where('category_status', 0)->orderBy('category_id', 'desc')->get();
        $brand_pd = DB::table('tbl_brand_product')->where('brand_status', 0)->orderBy('brand_id', 'desc')->get();

        // $new_product = DB::table('tbl_product')->where('product_status', 0)->orderBy('product_id', 'desc')->limit(8)->get();
        $phone_product = DB::table('tbl_product')->where('product_status', 0)->where('category_id', 1)->orderBy('product_id', 'desc')->limit(8)->get();
        $laptop_product = DB::table('tbl_product')->where('product_status', 0)->where('category_id', 2)->orderBy('product_id', 'desc')->limit(8)->get();
        $accessories_product = DB::table('tbl_product')->where('product_status', 0)->where('category_id', 3)->orderBy('product_id', 'desc')->limit(8)->get();

        return view('pages.home')->with('category', $cat_pd)->with('brand', $brand_pd)->with('phone_product', $phone_product)->with('laptop_product', $laptop_product)->with('accessories_product', $accessories_product);
    }

    public function sort_product(Request $request){

        // Seo
        $meta_desc = "Shop bán hàng laravel";
        // Seo
        $cat_pd = DB::table('tbl_category_product')->where('category_status', 0)->orderBy('category_id', 'desc')->get();
        $brand_pd = DB::table('tbl_brand_product')->where('brand_status', 0)->orderBy('brand_id', 'desc')->get();

        $sort_by = $request->sort_by;
       
        if($sort_by == 'giam_dan'){
            $pd = DB::table('tbl_product')->where('category_id', 1)->orderByRaw('CAST(product_price as DECIMAL(12,2)) DESC')->get();
        }elseif($sort_by=='tang_dan'){
            $pd = DB::table('tbl_product')->where('category_id', 1)->where('product_status', 0)->orderByRaw('CAST(product_price as DECIMAL(12,2)) ASC')->get();
        }elseif($sort_by=='kytu_az'){
            $pd = DB::table('tbl_product')->where('category_id', 1)->where('product_status', 0)->orderBy('product_name', 'ASC')->get();
        }elseif($sort_by=='kytu_za'){
            $pd = DB::table('tbl_product')->where('category_id', 1)->where('product_status', 0)->orderBy('product_name', 'DESC')->get();
        }else{
            $pd ='';
        }
        // echo '<pre>';
        // print_r($pd);
        // echo '</pre>';

        return view('pages.product.sort_product')->with('category', $cat_pd)->with('brand', $brand_pd)->with('sort_product', $pd);
    }

    public function filter_price(){

        $cat_pd = DB::table('tbl_category_product')->where('category_status', 0)->orderBy('category_id', 'desc')->get();
        $brand_pd = DB::table('tbl_brand_product')->where('brand_status', 0)->orderBy('brand_id', 'desc')->get();

        if(isset($_GET['start_price']) && isset($_GET['end_price'])){
            $start_price = $_GET['start_price']."000000";
            $end_price = $_GET['end_price']."000000";
            // echo '<pre>';
            // print_r($pd);
            // echo '</pre>';
            $pd = DB::table('tbl_product')->whereBetween('product_price', [(int)$start_price,(int)$end_price])->orderByRaw('CAST(product_price as DECIMAL(12,2)) ASC')->get();
            return view('pages.product.sort_product')->with('category', $cat_pd)->with('brand', $brand_pd)->with('sort_product', $pd);
        }else{
            return view('pages.product.sort_product')->with('category', $cat_pd)->with('brand', $brand_pd);
        }

    }

    public function search(Request $request){

        $keyword = $request->keyword_search;
        if($keyword){
            session()->put('keyword', $keyword);
        }
        $cat_pd = DB::table('tbl_category_product')->where('category_status', 0)->orderBy('category_id', 'desc')->get();
        $brand_pd = DB::table('tbl_brand_product')->where('brand_status', 0)->orderBy('brand_id', 'desc')->get();

        $search_product = DB::table('tbl_product')->where('product_name', 'like', '%'.$keyword.'%')->get();

        return view('pages.product.search')->with('category', $cat_pd)->with('brand', $brand_pd)->with('search_product', $search_product);
    }

    public function search_ajax(Request $request){
        $data = $request->all();
        $output ='';
        if($data['keywords']){
            $product = DB::table('tbl_product')->where('product_name', 'LIKE', '%'.$data['keywords'].'%')->get();
            
            $output = '<ul class="suggest-menu">';
            
            foreach ($product as $key => $value) {
                $output .= '<li class="suggest-item"><a href="'.url("chi-tiet-san-pham/".$value->product_id).'">'.$value->product_name.'</a></li>';
            }

            $output .= '</ul>';
        }
        echo $output;
    }
    
}
