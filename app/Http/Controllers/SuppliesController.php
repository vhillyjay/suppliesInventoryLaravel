<?php

namespace App\Http\Controllers;

use App\Models\Supplies;
use Illuminate\Http\Request;

class SuppliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplies = Supplies::all();
        return view('supplies.index', [
            'supplies' => $supplies
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
        return view('supplies.create');
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
        $supplies = new Supplies();
        $supplies->name = $request->productName;
        $supplies->type = $request->productType;
        $supplies->brand = $request->productBrand;
        $supplies->price = $request->productPrice;
        $supplies->quantity = $request->productQuantity;
        $supplies->save();
        return redirect('/supplies/create')->with('productConfirmation', 'Product added');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplies  $supplies
     * @return \Illuminate\Http\Response
     */
    // public function show(Supplies $supplies)
    public function show($id)
    {
        $supplies = Supplies::findOrFail($id);
        return view('supplies.show', ['supplies' => $supplies]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplies  $supplies
     * @return \Illuminate\Http\Response
     */
    // public function edit(Supplies $supplies)
    public function edit($id)
    {
        $supplies = Supplies::findOrFail($id);
        return view('supplies.edit', ['supplies' => $supplies]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplies  $supplies
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Supplies $supplies)
    public function update(Request $request, $id)
    {
        $supplies = Supplies::findOrFail($id);
        $supplies->name = $request->productName;
        $supplies->type = $request->productType;
        $supplies->brand = $request->productBrand;
        $supplies->price = $request->productPrice;
        $supplies->quantity = $request->productQuantity;
        $supplies->update();
        return redirect('/supplies')->with('productConfirmation', 'Product updated');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplies  $supplies
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Supplies $supplies)
    public function destroy($id)
    {
        $supplies = Supplies::findOrFail($id);
        $supplies->delete();
        return redirect('/supplies');
        //
    }
}