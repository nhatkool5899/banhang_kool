<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Models\Comment;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Session\Session;
session_start();

class ProductController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = session()->get('admin_id');
        if($admin_id){
            Return Redirect::to('dashboard');
        }else{
            Return Redirect::to('admin')->send();
        }
    }

    public function add_product(){
        $this->AuthLogin();
        $cat_pd = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
        $brand_pd = DB::table('tbl_brand_product')->orderBy('brand_id', 'desc')->get();

        return view('admin.add_product')->with('category_product', $cat_pd)->with('brand_product', $brand_pd);
    }

    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
        ->join('tbl_brand_product', 'tbl_product.brand_id', '=', 'tbl_brand_product.brand_id')->orderBy('product_id', 'desc')->get();
        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);
    }

    public function save_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->product_category;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;

        $get_img = $request->file('product_img');
        if($get_img){
            $get_name_img = $get_img->getClientOriginalName();
            $name_img = current(explode('.', $get_name_img));
            $new_img =  $name_img.'-'.rand(0,99).'.'.$get_img->getClientOriginalExtension();
            $get_img->move('public/upload/product', $new_img);
            $data['product_img'] = $new_img;
            DB::table('tbl_product')->insert($data);
            session()->put('message', 'Thêm sản phẩm thành công');
            return Redirect::to('add-product');

        }else{
            $data['product_img'] = "";
            DB::table('tbl_product')->insert($data);
            session()->put('message', 'Thêm sản phẩm thành công');
            return Redirect::to('add-product');

        }
    }

    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 1]);
        session()->put('message', '<span class="text-warning"><i class="fa fa-check"></i>Ẩn hiện thị sản phẩm thành công</span>');
        return Redirect::to('all-product');
        
    }
    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 0]);
        session()->put('message', '<span class="text-success"><i class="fa fa-check"></i>Hiển thị sản phẩm thành công</span>');
        return Redirect::to('all-product');
        
    }

    public function edit_product($product_id){
        $this->AuthLogin();

        $cat_pd = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
        $brand_pd = DB::table('tbl_brand_product')->orderBy('brand_id', 'desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product)->with('category_product', $cat_pd)->with('brand_product', $brand_pd);

        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }

    public function update_product(Request $request, $product_id){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->product_category;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;

        $get_img = $request->file('product_img');
        if($get_img){
            $get_name_img = $get_img->getClientOriginalName();
            $name_img = current(explode('.', $get_name_img));
            $new_img =  $name_img.'-'.rand(0,99).'.'.$get_img->getClientOriginalExtension();
            $get_img->move('public/upload/product', $new_img);
            $data['product_img'] = $new_img;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            session()->put('message', '<span class="text-success"><i class="fa fa-check"></i>Cập nhật sản phẩm thành công</span>');
            return Redirect::to('all-product');

        }else{
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            session()->put('message', '<span class="text-success"><i class="fa fa-check"></i>Cập nhật sản phẩm thành công</span>');
            return Redirect::to('all-product');

        }
    }

    public function delete_product($product_id){
        $this->AuthLogin(); 
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        session()->put('message', '<span class="text-success"><i class="fa fa-check"></i>Xóa danh mục thành công</span>');
        return Redirect::to('all-product');
    }

    //End Function Admin

    public function details_product($product_id)
    {   
        $cat_pd = DB::table('tbl_category_product')->where('category_status', 0)->orderBy('category_id', 'desc')->get();
        $brand_pd = DB::table('tbl_brand_product')->where('brand_status', 0)->orderBy('brand_id', 'desc')->get();

        $product_details = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
        ->join('tbl_brand_product', 'tbl_product.brand_id', '=', 'tbl_brand_product.brand_id')->where('tbl_product.product_id', $product_id)->get();

        foreach ($product_details as $key => $value) {
            $cat_id = $value->category_id; 
        }
        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
        ->join('tbl_brand_product', 'tbl_product.brand_id', '=', 'tbl_brand_product.brand_id')
        ->where('tbl_category_product.category_id', $cat_id)->get();

        $rating = DB::table('tbl_rating')->where('product_id', $product_id)->avg('rating');
        $rating = round($rating);

        return view('pages.product.show_details')->with('category', $cat_pd)->with('brand', $brand_pd)
        ->with('product_details', $product_details)->with('related_product', $related_product)->with('rating',$rating);
    }

    public function load_comment(Request $request){
        $product_id = $request->product_id;

        $comment = Comment::where('comment_product_id',$product_id)->orderBy('comment_id', 'DESC')->get();
        $output = '';
        foreach ($comment as $key => $value) {
            $output .= '<div class="col-sm-8" style="display: flex">
                        <div class="col-sm-2">
                             <img src="https://kiemtientuweb.com/ckfinder/userfiles/images/avatar-cute/avatar-cute-12.jpg" width="80" height="80" alt="">
                        </div>
                        <ul class="col-sm-10" style="background: #f1f1f1">
                            <li class="comment_name">'.$value->comment_name.'</li>
                            <li style="color: rgb(255, 81, 0)"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></li>
                            <li class="comment_date">'.$value->comment_date.'</li>
                            <li>'.$value->comment.'</li>
                        </ul>
                    </div>';
        }
        echo $output;
    }

    public function add_comment(Request $request)
    {
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $comment = new Comment();
        $comment->comment = $data['add_comment'];
        $comment->comment_name = session()->get('customer_name');
        $comment->comment_date = $now;
        $comment->comment_product_id = $data['product_id'];
        $comment->save();
    }

    public function insert_rating(Request $request)
    {
        $data = array();
        $data['product_id'] = $request->product_id;
        $data['rating'] = $request->index;

        DB::table('tbl_rating')->insert($data);
        echo 'done';
    }
}
