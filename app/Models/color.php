<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    use HasFactory;
    public $fillable=["name","color","created_at","updated_at"];

    public function order_detail(){


        return $this->hasMany("\App\Models\order_product","color_id");
    }
    public function cart(){

        return $this->hasMany("\App\Models\cart","color_id");
    }

    
    public function product(){


        return $this->belongsToMany("\App\Models\product","\App\Models\color_product","color_id","product_id");
    }

}
