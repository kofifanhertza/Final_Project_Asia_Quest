<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price'];

    public function stocks()
    {
        return $this->hasMany('App\Models\Stock');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category'); 
    }

    public static function listOfProductsOptions()
    {
        $list = self::all()->pluck('name', 'id');

        return $list;
    }
}


