<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    use HasFactory;
    public $fillable=["name_ar","name_en","created_at","updated_at"];

    
    public function cart(){

        return $this->hasMany("\App\Models\cart","size_id");
    }
    
    public function order_detail(){


        return $this->hasMany("\App\Models\order_product","size_id");
    }
    public function products(){

        return $this->belongsToMany("\App\Models\product","\App\Models\size_product","size_id","product_id");
    }
}
