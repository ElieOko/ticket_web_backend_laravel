<?php

namespace App\Http\Controllers;

use App\Models\TransferType;
use Illuminate\Http\Request;
use App\Http\Resources\TransferTypeCollection;

class TransferTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transfer_type = TransferType::all();
        if($transfer_type->count() != 0 ){
            return new TransferTypeCollection($transfer_type);
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
            $state_save = TransferType::create([
                'Name'          =>  $dt->Name,
                'Code'          =>  $dt->Code, 
                'DisplayName'   =>  $dt->DisplayName
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
    public function show(TransferType $transferType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransferType $transferType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransferType $transferType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransferType $transferType)
    {
        //
    }
}
