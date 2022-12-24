<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class track extends Model
{
    use HasFactory;
    public $fillable=["name_ar","name_en","address","phone","person","icon","facebook","website","created_at","updated_at"];

    public function orders(){


        return $this->hasMany("\App\Models\order","track");

    }
}
