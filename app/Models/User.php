<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Call;
use App\Models\Branch;
use App\Models\Ticket;
use App\Models\UserLog;
use App\Models\UserPermission;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable  implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = "TUsers";
    protected $primaryKey = "UserId";
    public $timestamps = false;
    protected $fillable = [
        'BranchFId',
        'UserName',
        'FullName',
        'AccessToken',
        'AccessLevel',
        'Locked',
        'Password'
    ];

    protected $hidden = [
        'Password',
        'AccessToken',
        'Admin'
    ];
    protected $appends = ['token']; 
 
    protected $casts = [
        'Password' => 'hashed',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function getRememberToken()
    {
        return $this->AccessToken;
    }
 
    public function setRememberToken($value)
    {
        $this->AccessToken = $value;
    }
 
    public function getRememberTokenName()
    {
        return 'AccessToken';
    }
    public function getTokenAttribute() { 
        return $this->attributes['token'] = $this->AccessToken; 
    } 

    public function branch()
    {
        return $this->belongsTo(Branch::class,'BranchFId','BranchId');
    }
    public function ticket(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
    public function call(): HasMany
    {
        return $this->hasMany(Call::class);
    }
    public function user_log(): HasMany
    {
        return $this->hasMany(UserLog::class);
    }
    public function user_permission(): HasMany
    {
        return $this->hasMany(UserPermission::class);
    }
}
