<?php

namespace App\Models;

use App\Models\Transfer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory;
    protected $table = "TCards";
    protected $primaryKey = "CardId";

    public $timestamps = false;
    protected $fillable = [
        'CardName'
    ];

    public function transfer(): HasMany
    {
        return $this->hasMany(Transfer::class);
    }
}
