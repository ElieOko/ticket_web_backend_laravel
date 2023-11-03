<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Http\Resources\CardCollection;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $card = Card::all();
        if($card->count() != 0 ){
            return new CardCollection($card);
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
            $state_save = Card::create([
                "CardName"  =>  $dt->CardName
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
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        //
    }
}
