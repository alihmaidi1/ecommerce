<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_product extends Model
{
    use HasFactory;

    public $fillable=["order_id","color_id","size_id","quantity","tax_one","price_one","shipping_one","product_id","created_at","updated_at"];

    public function color(){

        return $this->belongsTo("\App\Models\color","color_id");

    }
    
    public function size(){

        return $this->belongsTo("\App\Models\size","size_id");

    }
    public function order(){

        return $this->belongsTo("\App\Models\order","order_id");
    }
    public function product(){

        return $this->belongsTo("\App\Models\product","product_id");
    }

}
