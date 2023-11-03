<?php

namespace App\Models;

use App\Models\Call;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Counter extends Model
{
    use HasFactory;
    protected $table = "TCounters";
    protected $primaryKey = "CounterId";

    public $timestamps = false;
    protected $fillable = [
        'Name',
        'BranchFId'
    ];
    public function call(): HasMany
    {
        return $this->hasMany(Call::class);
    }
    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
