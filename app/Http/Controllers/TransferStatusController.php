<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TransferStatus;
use App\Http\Resources\TransferStatusCollection;

class TransferStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transfer_status = TransferStatus::all();
        if($transfer_status->count() != 0 ){
            return new TransferStatusCollection($transfer_status);
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
            $state_save = TransferStatus::create([
                'Name'     =>  $dt->Name
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
    public function show(TransfertStatut $transfertStatu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransfertStatut $transfertStatu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransfertStatu $transfertStatu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransfertStatu $transfertStatu)
    {
        //
    }
}
