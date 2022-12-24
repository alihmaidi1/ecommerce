<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class img extends Model
{
    use HasFactory;
    public $fillable=["name","product_id","created_at","updated_at"];

    public function product(){

        return $this->belongsTo("\App\Models\product");
    }
}
