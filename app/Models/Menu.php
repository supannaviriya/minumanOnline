<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Menu extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
 /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $timestamps = false;

    public function transaction_detail()
	{
	     return $this->hasMany(Transaction_detail::class,'transaction_id', 'id');
	}


    // protected $primaryKey = 'minum_id';

}
