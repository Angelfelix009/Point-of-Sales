<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    public function goods(){
        return $this->belongsTo('App\Models\Goods','goods_id');
    }
    public function users(){
        return $this->belongsTo('App\Models\User','user');
    }
}
