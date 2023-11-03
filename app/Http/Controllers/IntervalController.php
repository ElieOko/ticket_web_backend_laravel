<?php

namespace App\Http\Controllers;

use App\Models\Interval;
use Illuminate\Http\Request;
use App\Http\Resources\IntervalCollection;

class IntervalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $interval = Interval::all();
        if($interval->count() != 0 ){
            return new IntervalCollection($interval);
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
        $msg = "Enregistrement réussie avec succès";
        $status = 201;
        $data = json_decode($request->getContent());
        foreach ($data as $dt) {
            # code...
            $state_save = Interval::create([
                'TransferTypeFId'   =>  $dt->TransferTypeFId,
                'CurrencyFId'       =>  $dt->CurrencyFId,
                'Min'               =>  $dt->Min,
                'Max'               =>  $dt->Max
            ]);
            
            if(!$state_save){
                $msg = "Echec de l'enregistrement";
                $status = 400;
            }
        }
            
            return response()->json([
                "message"=>$msg,
            ],$status);
    }

    /**
     * Display the specified resource.
     */
    public function show(Interval $interval)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Interval $interval)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Interval $interval)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Interval $interval)
    {
        //
    }
}
