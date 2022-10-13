<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\PurchasesDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        $suppliers = Supplier::all();
        $purchases_details = PurchasesDetail::all();
       
        return view('admin.purchase', compact('items','suppliers','purchases_details'));
    }
    public function api()
    {
        $purchases = Purchase::with('items','suppliers');

        $datatables = datatables()->of($purchases)
        ->addColumn('date', function($purchase){
            return convert_date($purchase->created_at);
        })
        ->addIndexColumn();

        return $datatables->make(true);
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
        $request->validate([
            'item_id'=>'required',
            'qty'=>'required',
            'supplier_id'=>'required',
            'date'=>'required',
        ]);
        //ke purchase
        $purchases = Purchase::create ([
            'supplier_id' => request('supplier_id'),
            'date' => request('date'),
        ]);
        //ke purchase detail
        $items = request('items');
        foreach ($items as $item => $value) {
            PurchasesDetail::create ([
                'purchase_id' => $purchases->id,
                'item_id' => $value,
                'qty' => $request->qty,
            ]);
            return $request;

        // return redirect('purchases');   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
