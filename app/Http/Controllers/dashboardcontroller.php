<?php

namespace App\Http\Controllers;

Use App\Models\Product;
Use App\Models\sellings;
Use App\Models\purchase;
use App\Models\stocks;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    public function index()
    {
        $totalproduct = Product::count();
        $totaltransaksi = sellings::sum('grand_total');
        $totalstockrak = stocks::where('is_warehouse', 1)->sum('qty');
        $totalstock = stocks::sum('qty');
        return view('page.dashboard', compact('totalproduct', 'totaltransaksi', 'totalstockrak','totalstock'));
    }
}
