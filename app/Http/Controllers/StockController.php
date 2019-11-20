<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Stock = Stock::all();

        return view('Stock.index', compact('Stock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Stock.createStock');

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
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $id)
    {
        //
        $stock = Stock::find($id);
        return view('Stock.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $id)
    {
        $request->validate([
            'id'=>'required',
            'stock_name'=>'required',
            'stock_qty'=>'required',
            'stock_unit'=>'required',
            'stock_price_per_kg'=>'required',
            'stock_weight_per_qty'=>'required'
        ]);

        $Stock = Stock::find($id);
        $Stock->stock_name =  $request->get('stock_name');
        $Stock->stock_qty = $request->get('stock_qty');
        $Stock->stock_unit = $request->get('stock_unit');
        $Stock->stock_price_per_kg = $request->get('stock_price_per_kg');
        $Stock->stock_weight_per_qty = $request->get('stock_weight_per_qty');
        $Stock->save();

        return redirect('/contacts')->with('success', 'Contact updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
