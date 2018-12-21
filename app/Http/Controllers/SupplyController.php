<?php

namespace App\Http\Controllers;

use App\Supply;
use Illuminate\Http\Request;
use DB;
use App\Stock;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s  = $request->query('s');
        $qty = $request->query('qty');

        $supplies = DB::table('supplies')->where('category', 'like', "%$s%")
                                          ->orWhere('brand', 'like', "%$s%")
                                          ->orWhere('desc', 'like', "%$s%")
                                          ->paginate(5);
        $items = Supply::all();

        $outOfStocks = DB::table('supplies')->whereBetween('stock', [0,2])->get();

        $stock = Stock::all();

        return view('supplies.index', compact('supplies', 'outOfStocks', 'items', 'stock'));
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
        
        Supply::create($request->all());

        return redirect('/supplies')->with('success', 'A new entry has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function show(Supply $supply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function edit(Supply $supply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supply $supply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supply $supply)
    {
        //
    }
}
