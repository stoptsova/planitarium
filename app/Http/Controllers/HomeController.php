<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $sales = DB::table('sales')
            ->select('menus.name as labels', DB::raw('SUM(quantity) AS data'))
            //->sum('quantity')
            ->leftJoin('menus', 'menus.id', '=', 'sales.menu_id')
            ->groupBy('menu_id')
            ->get();
        $s = $sales->pluck('labels');
        $data = '['.$sales->implode('data',',').']';
        $labels ="['". $sales->implode('labels',"','")."']";

        $orders = DB::table('sales')
            ->select('sales.created_at as labels', DB::raw('SUM(sales.quantity * menus.prise) AS data'))
            ->leftJoin('menus', 'menus.id', '=', 'sales.menu_id')
            ->groupBy('order_id')
            ->get();
        $data2 = '['.$orders->implode('data',',').']';
        $labels2 ="['". $orders->implode('labels',"','")."']";

        $balans = DB::table('sales')
            ->select(DB::raw('SUM(sales.quantity * menus.prise) AS data'))
            ->leftJoin('menus', 'menus.id', '=', 'sales.menu_id')
            ->get()
            ->implode('data',' Руб.');
        //dd($balans);
        return view('home',['labels'=>$labels, 'data'=>$data, 'labels2'=>$labels2, 'data2'=>$data2, 'balans'=>$balans]);
    }
}
