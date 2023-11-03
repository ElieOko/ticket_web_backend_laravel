<?php

namespace App\Models;

use App\Models\User;
use App\Models\Counter;
use App\Models\Transfer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Call extends Model
{
    use HasFactory;
    protected $table = "TCalls";
    protected $primaryKey = "CallId";

    public $timestamps = false;
    protected $fillable = [
        'Ticket',
        'CounterFId',
        'Note',
        'UserFId',
        'CreatedTime'
    ];
    public function counter()
    {
        return $this->belongsTo(Counter::class,'CounterFId','CounterId');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'UserFId','UserId');
    }
    public function transfer(): HasMany
    {
        return $this->hasMany(Transfer::class);
    }
}
