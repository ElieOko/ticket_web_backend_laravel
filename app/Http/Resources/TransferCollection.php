<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TransferCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public static $wrap = 'transfers';
    public function toArray(Request $request)
    {
        return $this->collection;
        // return [
        //     'TransferId'        =>  $this->TransferId,
        //     'transfer_type'     =>  $this->transfer_type,
        //     'transfer_status'   =>  $this->transfer_status,
        //     'call'              =>  $this->call,
        //     'branch'            =>  $this->branch,
        //     'currency'          =>  $this->currency,
        //     'interval'          =>  $this->interval,
        //     'card'              =>  $this->card,
        //     'FromBranchId'      =>  $this->FromBranchId,
        //     'ToBranchId'        =>  $this->ToBranchId,
        //     'Amount'            =>  $this->Amount,
        //     'SenderName'        =>  $this->SenderName,
        //     'SenderPhone'       =>  $this->SenderPhone,
        //     'ReceiverName'      =>  $this->ReceiverName,
        //     'ReceiverPhone'     =>  $this->ReceiverPhone,
        //     'Address'           =>  $this->Address,
        //     'Note'              =>  $this->Note,
        //     'Code'              =>  $this->Code,
        //     'ImagePath'         =>  $this->ImagePath,
        //     'Completed'         =>  $this->Completed,
        //     'CompleteNote'      =>  $this->CompleteNote,
        //     'DateCompleted'     =>  $this->DateCompleted,
        //     'OrderNumber'       =>  $this->OrderNumber,
        //     'Barcode'           =>  $this->Barcode,
        //     'CardExpiryDate'    =>  $this->CardExpiryDate,
        //     'TokenPath'         =>  $this->TokenPath,
        //     'Signature'         =>  $this->Signature,
        //     'TimeCalled'        =>  $this->TimeCalled,
        //     'DateCreated'       =>  $this->DateCreated,
        //     'UniqueString'      =>  $this->UniqueString
        // ];
    }
}
