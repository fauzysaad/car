<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $cars = App\Car::with('CarPrice')->get();

        return view('home', compact('cars'));
    }

    public function getDetails($id,$carp_id)
    {  
        $cars = App\Car::with('CarPrice')->get();
        $carDetail = App\Car::find($id);
        $carPriceDetail = App\CarPrice::find($carp_id);

        return view('home', compact('cars','carDetail','carPriceDetail'));
    }

    public function getCompareDetails($id,$carp_id,$c_id,$c_carp_id)
    {  
        $cars = App\Car::with('CarPrice')->get();
        $carDetail = App\Car::find($id);
        $carPriceDetail = App\CarPrice::find($carp_id);
        $compareDetail = App\Car::find($c_id);
        $comparePriceDetail = App\CarPrice::find($c_carp_id);

        return view('home', compact('cars','carDetail','carPriceDetail','compareDetail','comparePriceDetail'));
    }
}
