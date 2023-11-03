<?php

namespace App\Models;

use App\Models\User;
use App\Models\Branch;
use App\Models\Counter;
use App\Models\Transfer;
use App\Models\OrderNumber;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;
    protected $table = "TBranches";
    protected $primaryKey = "BranchId";

    public $timestamps = false;
    protected $fillable = [
        'BranchId',
        'BranchName',
        'BranchZone',
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
    
    public function counter(): HasMany
    {
        return $this->hasMany(Counter::class);
    }
    public function transfer(): HasMany
    {
        return $this->hasMany(Transfer::class);
    }
    public function order_number(): HasMany
    {
        return $this->hasMany(OrderNumber::class);
    }
    
}
