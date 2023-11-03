<?php

namespace App\Models;

use App\Models\User;
use App\Models\Currency;
use App\Models\TransferType;
use App\Models\TransferStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    protected $table = "TTickets";
    protected $primaryKey = "TicketId";

    public $timestamps = false;
    protected $fillable = [
        'TicketId',
        "CurrencyFId",             
        "UserFId",                 
        "TransferTypeFId",         
        "TransferStatusFId",
        "Amount",                  
        "Phone",             
        "Note",
        'Name',
        "Motif",
        "DateCreated",
        "ClotureDateCreated",      
    ];
   public static function value_between(int $value,$interval){
        $response = false;
        $min       = 0;
        foreach ($interval as $data) {
            $min        = $data->Min;
            $max        = $data->Max;
            if(($min >= $value) && ($value < $max )){
                $response = true;
                $min = $min;
                break;
            }
        }
        return ["status"=>$response,"min"=>$min];
    }

    public function user()
    {
        return $this->belongsTo(User::class,'UserFId','UserId');
    }
    public function transferType()
    {
        return $this->belongsTo(TransferType::class,'TransferTypeFId','TransferTypeId');
    }
    public function transferStatus()
    {
        return $this->belongsTo(TransferStatus::class,'TransferStatusFId','TransferStatusId');
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class,'CurrencyFId','CurrencyId');
    }
}  
