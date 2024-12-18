<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = ['quantity'];
    
    public function product() {
        return $this->belongsTo('App\Models\Product'); 
    }

    public function store() {
        return $this->belongsTo('App\Models\Store'); 
    }
}
