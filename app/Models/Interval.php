<?php

namespace App\Models;

use App\Models\Currency;
use App\Models\Transfer;
use App\Models\TransferType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interval extends Model
{
    use HasFactory;
    protected $table = "TIntervals";
    protected $primaryKey = "IntervalId";

    public $timestamps = false;
    protected $fillable = [
        'TransferTypeFId',
        'CurrencyFId',
        'Min',
        'Max',
    ];
    public function currency()
    {
        return $this->belongsTo(Currency::class,'CurrencyFId','CurrencyId');
    }
    public function transfer_type()
    {
        return $this->belongsTo(TransferType::class,'TransferTypeFId','TransferTypeId');
    }

    public function transfer(): HasMany
    {
        return $this->hasMany(Transfer::class);
    }
}
