<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    public function goods(){
        return $this->belongsTo('App\Goods');
    }

    public function debt(){
        return $this->hasMany('App\Debt');
    }
}
