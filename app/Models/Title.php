<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;
    protected $table = "TTitles";
    protected $primaryKey = "TitleId";

    public $timestamps = false;
    protected $fillable = [
        'TitleName',
        'DisplayName',
    ];
}

