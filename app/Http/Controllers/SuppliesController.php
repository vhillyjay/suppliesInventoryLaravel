<?php

namespace App\Http\Controllers;

use App\Models\Supplies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

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
        $request->validate([
            'productName' => 'required|unique:supplies,name',
            'productPrice' => 'numeric|min:0|between:0,1000000.99',
            'productQuantity' => 'integer|min:0',
            'productImage' => 'mimes:jpg,png,jpeg,JPG,PNG,JPEG',
        ]);
        // dd($request->all());
        // key is the input name from supplies.create

        if ($request->productImage === NULL) {
            $supplies = new Supplies();
            $supplies->name = $request->productName;
            $supplies->type = $request->productType;
            if ($request->productBrand === NULL) {
                $supplies->brand = 'N/A';
            } else {
                $supplies->brand = $request->productBrand;
            }
            $supplies->price = $request->productPrice;
            $supplies->quantity = $request->productQuantity;
            $supplies->save();
            return redirect('/supplies/create')->with('productAddition', 'Product added successfully!');
        } else {
            $productImageName = time() . '-' . $request->productImage->getClientOriginalName();
            $imgName = $request->file('productImage')->storeAs('img/product', $productImageName);
            // dd($imgName);
            $publicPath = $request->productImage->move(public_path('img/product'), $productImageName);
    
            $supplies = new Supplies();
            $supplies->name = $request->productName;
            // $supplies->name = $request->validate([
            //     'name' => 'unique:name'
            // ]);
            $supplies->type = $request->productType;
            if ($request->productBrand === NULL) {
                $supplies->brand = 'N/A';
            } else {
                $supplies->brand = $request->productBrand;
            }
            $supplies->price = $request->productPrice;
            $supplies->quantity = $request->productQuantity;
            $supplies->image = $productImageName;
            $supplies->save();
            return redirect('/supplies/create')->with('productAddition', 'Product added successfully!');
        }

        // $productImageName = time() . '-' . $request->productImage->getClientOriginalName();
        // $publicPath = $request->productImage->move(public_path('img/product'), $productImageName);

        // $supplies = new Supplies();
        // $supplies->name = $request->productName;
        // // $supplies->name = $request->validate([
        // //     'name' => 'unique:name'
        // // ]);
        // $supplies->type = $request->productType;
        // if ($request->productBrand === NULL) {
        //     $supplies->brand = 'N/A';
        // } else {
        //     $supplies->brand = $request->productBrand;
        // }
        // $supplies->price = $request->productPrice;
        // $supplies->quantity = $request->productQuantity;
        // $supplies->image = $productImageName;
        // $supplies->save();
        // return redirect('/supplies/create')->with('success', 'Product added successfully!');
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
        return view('supplies.show', [
            'supplies' => $supplies,
        ]);
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
        return view('supplies.edit', [
            'supplies' => $supplies,
        ]);
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
        if ($request->productName === $supplies->name) {
            // dd($request->all());
            $request->validate([
                'productName' => 'required',
                'productPrice' => 'numeric|min:0|between:0,1000000.99',
                'productQuantity' => 'integer|min:0',
            ]);
            $supplies = Supplies::findOrFail($id);
            $supplies->name = $request->productName;
            $supplies->type = $request->productType;
            $supplies->brand = $request->productBrand;
            $supplies->price = $request->productPrice;
            $supplies->quantity = $request->productQuantity;
            $supplies->update();
            return redirect('/supplies')->with('productConfirmation', 'Product updated!');
        } else {
            $request->validate([
                'productName' => 'required|unique:supplies,name',
                'productPrice' => 'numeric|min:0|between:0,1000000.99',
                'productQuantity' => 'integer|min:0',
            ]);
            $supplies = Supplies::findOrFail($id);
            $supplies->name = $request->productName;
            $supplies->type = $request->productType;
            $supplies->brand = $request->productBrand;
            $supplies->price = $request->productPrice;
            $supplies->quantity = $request->productQuantity;
            $supplies->update();
            return redirect('/supplies')->with('productConfirmation', 'Product updated!');
        }

        // $request->validate([
        //     'productName' => 'required|unique:supplies,name',
        //     'productPrice' => 'numeric|min:0|between:0,1000000.99',
        //     'productQuantity' => 'integer|min:0',
        // ]);
        // $supplies = Supplies::findOrFail($id);
        // $supplies->name = $request->productName;
        // $supplies->type = $request->productType;
        // $supplies->brand = $request->productBrand;
        // $supplies->price = $request->productPrice;
        // $supplies->quantity = $request->productQuantity;
        // $supplies->update();
        // return redirect('/supplies')->with('productConfirmation', 'Product updated');
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
        return redirect('/supplies')->with('productDeletion', 'Product deleted!');
        //
    }

    public function downloadimage(Request $request, $id)
    {
        // $userimage = 'user.png';
        // if (Storage::disk('local')->exists($userimage)) {
        //     return 'file ' . $userimage . ' in disk';
        // } else {
        //     return 'file ' . $userimage . ' not in disk';
        // } right right

        $supplies = Supplies::findOrFail($id);
        $xeta = asset('storage/app/img/product/' . $supplies->image);
        dd($xeta);

        if (Storage::disk('local')->exists('img/product/' . $supplies->image)) {
            $imagePathFinder = Storage::disk('local')->path('img/product/' . $supplies->image);
            // dd($imagePathFinder);
            return 'file ' . $supplies->image . ' in disk';
        } else {
            return 'file ' . $supplies->image . ' not in disk';
        }

        // $download = public_path('img/product/') . $supplies->image;
        // $headers = array(
        //     'Content-Type: image/jpeg',
        // );
        // // return $download;
        // return Response::download($download, 'productimage.jpg', $headers);
        // $path = public_path('img/product/') . $supplies->image;
        // if (Storage::disk('/img/product/')->exists($supplies->image)) {
        //     return "success";
        // } else {
        //     return "fail";
        // }

        if ($supplies->image === NULL) {
            // return "no product image";
            return back()->with('notify', 'No Product Image');
        } 
        else {
            $supplies = Supplies::findOrFail($id);
            $download = public_path('img/product/') . $supplies->image;
            $headers = array(
                'Content-Type: image/jpeg',
            );
            // return $download;
            return Response::download($download, 'productimage.jpg', $headers);
        }
    }
}