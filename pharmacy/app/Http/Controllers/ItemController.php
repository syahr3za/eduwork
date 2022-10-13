<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Form;
use App\Models\Classification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
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
        $forms = Form::all();
        $classifications = Classification::all();
        //$items = Item::with('form','classification')->get();
        //return $items;
        return view('admin.item', compact('forms','classifications'));
    }
    public function api()
    {
        $items = Item::with('form','classification');

        $datatables = datatables()->of($items)
                        ->addColumn('date', function($item){
                            return convert_date($item->created_at);
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
            'name'=>'required',
            'form_id'=>'required',
            'classification_id'=>'required',
            'price'=>'required',
            'qty'=>'required',
        ]);

        Item::create($request->all());

        return redirect('items');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name'=>'required',
            'form_id'=>'required',
            'classification_id'=>'required',
            'price'=>'required',
            'qty'=>'required',
        ]);

        $item->update($request->all());

        return redirect('items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        
    }
}
