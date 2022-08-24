<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        $deliveries = Delivery::all();
        return view('delivery', compact('items', 'deliveries'));
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

        $storeData = $request->validate([
            'item_id' => 'required|integer',
            'DeliveryQuantity' => 'required|integer',
            'date' => 'required|date'
        ]);
        // dd($storeData);
        $deliveries = Delivery::create($storeData);
        // dd($deliveries);
        return redirect('/delivery');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);

        $deliveries = Delivery::all();

        // foreach($deliveries as $delivery){
        //     $date=$delivery->date;
        //     dd(date("Y/m/d",strtotime($date)));
        // }


        
        $totalDel=0;
        foreach($deliveries as $delivery){
            if($delivery->item_id === $item->id){
                $del = $delivery->DeliveryQuantity;
                $totalDel = $totalDel + $del;
            }
        }
        // dd($totalDel);
        return view('deliveryedit', compact('item', 'deliveries', 'totalDel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        //
    }
}
