<?php

namespace App\Http\Controllers;

use App\Models\OrderNumber;
use Illuminate\Http\Request;
use App\Http\Resources\OrderNumberCollection;

class OrderNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order_number = OrderNumber::all();
        if($order_number->count() != 0 ){
            return new OrderNumberCollection($order_number);
        }
        return response()->json([
            "message"=>"Ressource not found",
        ],400);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function filter()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $msg = "Enregistrement réussie avec succès";
        $status = 201;
        $current_day = date("Y-m-d H:i:s");
        $data = json_decode($request->getContent());
            $state_save = OrderNumber::create([
                'TransferTypeFId'   =>  $data->TransferTypeFId,
                'BranchFId'         =>  $data->BranchFId,
                'Number'            =>  $data->Number,
                'CreatedDate'       =>  $current_day
            ]);
            
            if(!$state_save){
                $msg = "Echec de l'enregistrement";
                $status = 400;
            }
            return response()->json([
                "message"=>$msg,
            ],$status);
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderNumber $orderNumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderNumber $orderNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderNumber $orderNumber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderNumber $orderNumber)
    {
        //
    }
}
