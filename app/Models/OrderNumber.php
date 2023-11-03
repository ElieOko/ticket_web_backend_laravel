<?php

namespace App\Models;

use App\Models\Branch;
use App\Models\TransferType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderNumber extends Model
{
    use HasFactory;
    protected $table = "TOrderNumbers";
    protected $primaryKey = "OrderNumberId";

    public $timestamps = false;
    protected $fillable = [
        'TransferTypeFId',
        'BranchFId',
        'Number',
        'CreatedDate'
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class,'BranchFId','BranchId');
    }
    public function transfer_type()
    {
        return $this->belongsTo(TransferType::class,'TransferTypeFId','TransferTypeId');
    }
}
