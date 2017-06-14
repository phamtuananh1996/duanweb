<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $superCategories = Categories::where('super_category_id',0)->orderBy('order_display')->get();
        return view('home',compact('superCategories'));
    }
}
