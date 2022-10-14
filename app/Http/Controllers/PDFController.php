<?php

namespace App\Http\Controllers;

// use App\Models\PDF;
use Illuminate\Http\Request;
use PDF;
use App\Models\Supplies;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @param  \App\Models\PDF  $pDF
     * @return \Illuminate\Http\Response
     */
    public function show(PDF $pDF)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PDF  $pDF
     * @return \Illuminate\Http\Response
     */
    public function edit(PDF $pDF)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PDF  $pDF
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PDF $pDF)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PDF  $pDF
     * @return \Illuminate\Http\Response
     */
    public function destroy(PDF $pDF)
    {
        //
    }

    //sample pdf
    public function generatePDF()
    {
        $data = [
            'title' => 'in your eyes i see',
            'date' => date('m/d/Y')
        ];
          
        // Pdf::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf');
        $pdf = PDF::loadView('myPDF', $data)
            ->setPaper('a4', 'landscape');
    
        return $pdf->download('reports.pdf');
    }
    //sample pdf

    public function supplies_inventory_list(Request $request)
    {
        // $suppliesList = Supplies::all();
        // dd($sample);
        // foreach ($suppliesList as $suppliesListData) {
        //     echo $suppliesListData . "<br><br>";
        // };

        $suppliesList = DB::table("supplies")->get();
            view()->share('suppliesList', $suppliesList);   // not gets :(

        $data = [
            'title' => 'Supplies Inventory List',
            'date' => date('m/d/Y'),
            'printedBy' => Auth::user()->name,
        ];
              
        $pdf = PDF::loadView('pdf.supplies_inventory_list', $data)
            ->setPaper('a4', 'landscape');

        return $pdf->download('supplies_inventory_list.pdf'); //filename and download process
        return view('pdf.supplies_inventory_list', [
            'suppliesList' => $suppliesList,
        ]);
    }

    public function transactions_list(Request $request)
    {
        $transactionsList = DB::table("transactions")->get();
            view()->share('transactionsList', $transactionsList);   // not gets :(

                // dd($transactionsList);

        $data = [
            'title' => 'Transactions List',
            'date' => date('m/d/Y'),
            'printedBy' => Auth::user()->name,
        ];
              
        $pdf = PDF::loadView('pdf.transactions_list', $data)
            ->setPaper('a4', 'landscape');

        return $pdf->download('transactions_list.pdf'); //filename and download process
        return view('pdf.transactions_list', [
            'transactionsList' => $transactionsList,
        ]);
    }

    // public function transaction_receipt(Request $request)
    public function transaction_receipt(Request $request, $id)
    {
        $transactionReceipt = DB::table("transactions")
            ->where('id', '=', $id)
            ->first(); // ->get(); doesnt work / first does work
        // dd($transactionReceipt);

            view()->share('transactionReceipt', $transactionReceipt);   // not gets :(

        $data = [
            'title' => 'Sample Receipt',
            'date' => date('m/d/Y'),
            'printedBy' => Auth::user()->name,
        ];
              
        $pdf = PDF::loadView('pdf.transaction_receipt', $data)
            ->setPaper('a7', '');

        return $pdf->download('sample_receipt.pdf'); //filename and download process
        return view('pdf.transaction_receipt', [
            'transactionReceipt' => $transactionReceipt,
        ]);
    }
}
