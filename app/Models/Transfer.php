<?php

namespace App\Models;

use App\Models\Call;
use App\Models\Card;
use App\Models\Branch;
use App\Models\Currency;
use App\Models\Interval;
use App\Models\TransferType;
use App\Models\TransferStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transfert extends Model
{
    use HasFactory;
    protected $table = "TTransfers";
    protected $primaryKey = "TransferId";

    public $timestamps = false;
    protected $fillable = [
        'TransferTypeFId',
        'TransferStatusFId',
        'CallUserFId',
        'BranchFId',
        'CurrencyFId',
        'IntervalFId',
        'CardFId',
        'FromBranchId',
        'ToBranchId',
        'Amount',
        'SenderName',
        'SenderPhone',
        'ReceiverName',
        'ReceiverPhone',
        'Address',
        'Note',
        'Code',
        'ImagePath',
        'Completed',
        'CompleteNote',
        'DateCompleted',
        'OrderNumber',
        'Barcode',
        'CardExpiryDate',
        'TokenPath',
        'Signature',
        'TimeCalled',
        'DateCreated',
        'UniqueString'
    ];

    public function transfer_type()
    {
        return $this->belongsTo(TransferType::class,'TransferTypeFId','TransferTypeId');
    }

    public function transfer_status()
    {
        return $this->belongsTo(TransferStatus::class,'TransferStatusFId','TransferStatusId');
    }

    public function call()
    {
        return $this->belongsTo(Call::class,'CallUserFId','CallId');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class,'BranchFId','BranchId');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class,'CurrencyFId','CurrencyId');
    }

    public function interval()
    {
        return $this->belongsTo(Interval::class,'IntervalFId','IntervalId');
    }
    
    public function card()
    {
        return $this->belongsTo(Card::class,'CardFId','CardId');
    }
}

