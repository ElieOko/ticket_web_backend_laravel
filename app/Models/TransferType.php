<?php

namespace App\Models;

use App\Models\Ticket;
use App\Models\Interval;
use App\Models\Transfer;
use App\Models\OrderNumber;
use App\Models\UserPermission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransferType extends Model
{
    use HasFactory;
    protected $table = "TTransferTypes";
    protected $primaryKey = "TransferTypeId";

    public $timestamps = false;
    protected $fillable = [
        'Name',
        'Code',
        'DisplayName'
    ];
    public function interval(): HasMany
    {
        return $this->hasMany(Interval::class);
    }
    public function transfer(): HasMany
    {
        return $this->hasMany(Transfer::class);
    }
    public function order_number(): HasMany
    {
        return $this->hasMany(OrderNumber::class);
    }
    public function ticket(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
    public function user_permission(): HasMany
    {
        return $this->hasMany(UserPermission::class);
    }
}
