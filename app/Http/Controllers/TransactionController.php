<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Supplies;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transactionRecords = Transaction::all();
        // $transactionRecords = DB::table('transactions')
        //     ->orderBy('id', 'desc')
        //     ->get();
        return view('transactions.index', [
            'transactionRecords' => $transactionRecords,
        ]);
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
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    // public function show(Transaction $transaction)
    public function show(Request $request, $id)
    {
        //
        $transaction = Transaction::findOrFail($id);
        return view('transactions.show', [
            'transaction' => $transaction,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function buyupdate(Request $request, $id)
    {
        $buyUpdate = Supplies::findOrfail($id);
        $request->validate([
            'productQuantity' => 'required|integer|min:1',
            'buyFrom' => 'required|alpha_dash',
        ]);
        $buyProductQuantity = $request->productQuantity;
        $buyUpdate->quantity = $buyUpdate->quantity + $request->productQuantity;

        $transactionBuy = new Transaction();
        $transactionBuy->user_id = Auth::user()->id;
        $transactionBuy->issued_by = Auth::user()->name;
        $transactionBuy->supplies_id = $buyUpdate->id;
        $transactionBuy->product_name = $buyUpdate->name;
        $transactionBuy->product_quantity = $request->productQuantity;
        $transactionBuy->product_price = $buyUpdate->price;
        $transactionBuy->transaction_price = $request->productQuantity * $buyUpdate->price;
        // dd($transactionBuy->transaction_price);
        $transactionBuy->buy_from = $request->buyFrom;
        // dd($request->buyFrom);

        $buyUpdate->update();
        $transactionBuy->save();
        return redirect()->route('supplies.buy_sell_list')
            ->with('buySuccess', 'Bought ' . $buyProductQuantity . ' stocks from ' . $request->buyFrom . '.');
    }

    public function sellupdate(Request $request, $id)
    {
        $sellUpdate = Supplies::findOrfail($id);
        $transactionSell = new Transaction();
        $request->validate([
            'productQuantity' => 'required|integer|min:1',
            'sellTo' => 'required|alpha_dash',
        ]);
        if ($request->productQuantity > $sellUpdate->quantity) {
            // return 'unable';
            return back()->with('sellFail', 'Unable to sell. Not enough stocks in inventory.');
        } else {
            $sellProductQuantity = $request->input('productQuantity');
            $sellUpdate->quantity = $sellUpdate->quantity - $request->productQuantity;

            $transactionSell->user_id = Auth::user()->id;
            $transactionSell->issued_by = Auth::user()->name;
            $transactionSell->supplies_id = $sellUpdate->id;
            $transactionSell->product_name = $sellUpdate->name;
            $transactionSell->product_quantity = $request->productQuantity;
            $transactionSell->product_price = $sellUpdate->price;
            $transactionSell->transaction_price = $request->productQuantity * $sellUpdate->price;
            // dd($transactionSell->transaction_price);
            $transactionSell->sell_to = $request->sellTo;

            $sellUpdate->update();
            $transactionSell->save();
            return redirect()->route('supplies.buy_sell_list')
                ->with('sellSuccess', '' . $sellProductQuantity . ' products successfully sold to ' . $request->sellTo . '.');
        }
    }
}
