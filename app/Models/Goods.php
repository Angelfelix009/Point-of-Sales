<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use HasFactory;
    public function stock(){
        return $this->hasMany('App\Models\Stock');
    }
    public function inventory(){
        return $this->hasMany('App\Models\Stock');
    }
    public function sales(){
        return $this->hasMany('App\Models\Sales');
    }
    public function sales_order(){
        return $this->hasMany('App\Models\SalesOrder');
    }
    protected $fillable = [
        'name','description','unit','price','user',
    ];
}
