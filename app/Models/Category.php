<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
    public static function listOfOptions()
    {
        $list = self::all()->pluck('name', 'id');

        return $list;
    }
}