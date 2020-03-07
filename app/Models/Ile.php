<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ile extends Model
{
    protected $fillable = [
    	'title', 
    ];

    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
