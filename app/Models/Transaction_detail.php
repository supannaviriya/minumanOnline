<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_detail extends Model
{
    use HasFactory;

    public function menu()
	{
	      return $this->belongsTo(Menu::class,'minum_id', 'id');
	}

	public function transaction()
	{
	      return $this->belongsTo(Transaction::class,'transaction_id', 'id');
	}

    // protected $foreignKey = 'minum_id';


}
