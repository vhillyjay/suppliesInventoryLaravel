<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Supplies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $home = Supplies::orderBy('updated_at', 'desc')->get();
        $home = DB::table('supplies')
            ->orderBy('updated_at', 'desc')
            ->get();
        $homeTotalSupplies = DB::table('supplies')
            ->pluck('quantity');
        $totalCounter = 0;
            foreach ($homeTotalSupplies as $totalSupplies) {
                $totalCounter += $totalSupplies;
            }; // echo "-" . $totalCounter;
        
        
        $productGross = Supplies::select(DB::raw('sum(quantity * price) as total'))
            ->get();
            // echo $productGross;
            // this is the right computation/still on review tho

        // $testing = Supplies::select(DB::raw('quantity * price'))
        //     ->get();
        //     echo 'testing' . $testing;
        // product(result) of per item / sample item1 with 3quantity and 3price is 3product
        
        return view('home', [
            'home' => $home,
            'totalCounter' => $totalCounter,
            'productGross' => $productGross,
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        //
    }
}
