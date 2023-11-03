<?php

namespace App\Models;

use App\Models\Ticket;
use App\Models\Transfer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransferStatus extends Model
{
    use HasFactory;

    protected $table = "TTransferStatus";
    protected $primaryKey = "TransferStatusId";

    public $timestamps = false;
    protected $fillable = [
        'Name'
    ];
    public function transfer(): HasMany
    {
        return $this->hasMany(Transfer::class);
    }
    public function ticket(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
