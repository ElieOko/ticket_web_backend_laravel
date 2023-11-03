<?php

namespace App\Models;

use App\Models\Ticket;
use App\Models\Interval;
use App\Models\Transfer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
    use HasFactory;
    protected $table = "TCurrencies";
    protected $primaryKey = "CurrencyId";

    public $timestamps = false;
    protected $fillable = [
        'CurrencyName',
        'CurrencyCode',
    ];
    public function interval(): HasMany
    {
        return $this->hasMany(Interval::class);
    }
    
    public function transfer(): HasMany
    {
        return $this->hasMany(Transfer::class);
    }
    public function ticket(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
