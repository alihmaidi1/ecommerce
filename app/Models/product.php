<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product extends Model
{
    use HasFactory;
    public $fillable=["title_ar","title_en","rating","tax","shipping","content_ar","content_en","department_id","color_id","size_id","price","photo","numbers","start_offer_at","price_offer","end_offer_at","factory_id","status","size","weight","created_at","updated_at"];


    public function order(){

        return $this->hasMany("App\Models\order","product_id");
    }

    public function imgs(){

        return $this->hasMany("\App\Models\img","product_id");
    }

    public function department(){

        return $this->belongsTo("App\Models\category","department_id");
    }
    public function cart(){

        return $this->hasOne("App\Models\cart","product_id");
    }
    public function color(){

        return $this->belongsToMany("\App\Models\color","\App\Models\color_product","product_id","color_id");
    }

    public function sizes(){

        return $this->belongsToMany("\App\Models\size","\App\Models\size_product","product_id","size_id");
    }
    public function wishlist(){

        return $this->hasMany("App\Models\wishlist","product_id");
    }

    public function order_product(){

        return $this->hasMany("\App\Models\order_product","product_id");
    }

}
