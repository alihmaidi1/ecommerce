<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    public $fillable=["user_id","size_id","color_id","quantity","product_id","tax","shipping","created_at","updated_at"];


    public function size(){

        return $this->belongsTo("\App\Models\size","size_id");
    }
    
    public function color(){

        return $this->belongsTo("\App\Models\color","color_id");
    }
    public function user(){

        return $this->belongsTo("app\Models\user","user_id");
    }
    public function product(){

        return $this->belongsTo("\App\Models\product","product_id");
    }
    

    



    
}
