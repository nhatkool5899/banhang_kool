<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\Session\Session;
session_start();
use App\Models\Statistical;
use App\Models\order;
use App\Models\Visitor;
use Carbon\Carbon;

class AdminController extends Controller
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

    public function index()
    {
        return view('admin_login');
    }

    public function show_dashboard(Request $request)
    {
        $this->AuthLogin();
        //get IP
        // $user_ip_address = $request->ip();
        $user_ip_address = '129.108.165.5';

        $early_last_month = Carbon::now('Asia/Ho_Chi_minh')->subMonth()->startOfMonth()->toDateString();
        $end_of_last_month = Carbon::now('Asia/Ho_Chi_minh')->subMonth()->endOfMonth()->toDateString();
        $early_this_month = Carbon::now('Asia/Ho_Chi_minh')->startOfMonth()->toDateString();
        $oneyears = Carbon::now('Asia/Ho_Chi_minh')->subDays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_minh')->toDateString();

        //total last month
        $visitor_of_lastmonth = Visitor::whereBetween('date_visitor', [$early_last_month, $end_of_last_month])->get();
        $visitor_last_month_count = $visitor_of_lastmonth->count();
        //total this month
        $visitor_of_thismonth = Visitor::whereBetween('date_visitor', [$early_this_month, $now])->get();
        $visitor_this_month_count = $visitor_of_thismonth->count();
        //total one year
        $visitor_of_year = Visitor::whereBetween('date_visitor', [$oneyears, $now])->get();
        $visitor_year_count = $visitor_of_year->count();

        //Current online
        $visitor_current = Visitor::where('ip_address', $user_ip_address)->get();
        $visitor_count = $visitor_current->count();
        if($visitor_count < 1){
            $visitor = new Visitor();
            $visitor->ip_address = $user_ip_address;
            $visitor->date_visitor = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $visitor->save();
        }
        $visitors = Visitor::all();
        $visitors_total = $visitors->count();

        return view('admin.dashboard')->with(compact('visitors_total','visitor_count','visitor_last_month_count','visitor_this_month_count','visitor_year_count'));
    }

    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        if($result){
            session()->put('admin_name', $result->admin_name);
            session()->put('admin_id', $result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            session()->put('message', 'Sai tài khoản hoặc mật khẩu, vui lòng kiểm tra lại');
            return Redirect::to('/admin');
        }
    }

    public function log_out()
    {
        $this->AuthLogin();
        session()->put('admin_name', null);
        session()->put('admin_id', null);
        return Redirect::to('/admin');
    }

    public function filter_by_date(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all();

        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = Statistical::whereBetween('order_date', [$from_date, $to_date])->orderBy('order_date','ASC')->get();
        // echo '<pre>';
        // print_r($get);
        // echo '</pre>';

        foreach ($get as $key => $value) {
            $chart_data[] = array(
                'period' => $value->order_date,
                'order' => $value->total_order,
                'sales' => $value->sales,
                'profit' => $value->profit,
                'quantity' => $value->quantity
            );
        }

        echo json_encode($chart_data);
        // echo $data = json_encode($chart_data);
    }

    public function order_date(Request $request)
    {
        $this->AuthLogin();
        $order_date = $_GET['date'];
        $order = order::where('order_date', $order_date)->orderBy('created_at', 'DESC')->get();
        return view('admin.order_date')->with(compact('order'));
    }

    public function dates_order(Request $request)
    {
        $this->AuthLogin();
        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = Statistical::whereBetween('order_date', [$sub30days,$now])->orderBy('order_date', 'ASC')->get();
        foreach ($get as $key => $value) {
            $chart_data[] = array(
                'period' => $value->order_date,
                'order' => $value->total_order,
                'sales' => $value->sales,
                'profit' => $value->profit,
                'quantity' => $value->quantity
            );
        }
        echo json_encode($chart_data);
    }

    public function dashboard_filter(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all();

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        if($data['dashboard_value'] == '7ngay'){
            $get = Statistical::whereBetween('order_date', [$sub7days,$now])->orderBy('order_date', 'ASC')->get();
        }elseif($data['dashboard_value'] == 'thangtruoc'){
            $get = Statistical::whereBetween('order_date', [$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('order_date', 'ASC')->get();
        }elseif($data['dashboard_value'] == 'thangnay'){
            $get = Statistical::whereBetween('order_date', [$dauthangnay,$now])->orderBy('order_date', 'ASC')->get();
        }else{
            $get = Statistical::whereBetween('order_date', [$sub365days, $now])->orderBy('order_date', 'ASC')->get();
        }

        foreach ($get as $key => $value) {
            $chart_data[] = array(
                'period' => $value->order_date,
                'order' => $value->total_order,
                'sales' => $value->sales,
                'profit' => $value->profit,
                'quantity' => $value->quantity
            );
        }
        echo json_encode($chart_data);
    }
}
