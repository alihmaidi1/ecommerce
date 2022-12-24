<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    public $fillable=["user_id","product_id","first_name","last_name","track","country","address","city","state","zip","email","phone","total","status","created_at","updated_at"];

    public function user(){

        return $this->belongsTo("App\Models\User","user_id");
    }

    public function product(){

        return $this->belongsTo("App\Models\product","product_id");
    }

    public function tracks(){

        return $this->belongsTo("\App\Models\\track","track");
    }

    public function countrys(){

        return $this->belongsTo("\App\Models\country","country");
    }
    public function citys(){

        return $this->belongsTo("\App\Models\cities","city");
    }

    public function order_product(){

        return $this->hasMany("\App\Models\order_product","order_id");
    }
}
