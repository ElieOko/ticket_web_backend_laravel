<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use Illuminate\Http\Request;
use App\Http\Resources\TransferCollection;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transfer = Transfer::all();
        if($transfer->count() != 0 ){
            return new TransferCollection($transfer);
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
            $state_save = Transfer::create([
                'TransferTypeFId'       =>$data->TransferTypeFId,
                'TransferStatusFId'     =>$data->TransferStatusFId,
                'CallUserFId'           =>$data->CallUserFId,
                'BranchFId'             =>$data->BranchFId,
                'CurrencyFId'           =>$data->CurrencyFId,
                'IntervalFId'           =>$data->IntervalFId,
                'CardFId'               =>$data->CardFId,
                'FromBranchId'          =>$data->FromBranchId,
                'ToBranchId'            =>$data->ToBranchId,
                'Amount'                =>$data->Amount,
                'SenderName'            =>$data->SenderName,
                'SenderPhone'           =>$data->SenderPhone,
                'ReceiverName'          =>$data->ReceiverName,
                'ReceiverPhone'         =>$data->ReceiverPhone,
                'Address'               =>$data->Address,
                'Note'                  =>$data->Note,
                'Code'                  =>$data->Code,
                'ImagePath'             =>$data->ImagePath,
                'Completed'             =>$data->Completed,
                'CompleteNote'          =>$data->CompleteNote,
                'DateCompleted'         =>$data->DateCompleted,
                'OrderNumber'           =>$data->OrderNumber,
                'Barcode'               =>$data->Barcode,
                'CardExpiryDate'        =>$data->CardExpiryDate,
                'TokenPath'             =>$data->TokenPath,
                'Signature'             =>$data->Signature,
                'TimeCalled'            =>$data->TimeCalled,
                'DateCreated'           =>$data->DateCreated,
                'UniqueString'          =>$data->UniqueString
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
    public function show(Transfert $transfert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transfert $transfert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transfert $transfert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transfert $transfert)
    {
        //
    }
}
