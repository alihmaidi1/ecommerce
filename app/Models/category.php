<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    public $fillable=["name_ar","name_en","description","keyword",'icon','parent',"created_at","updated_at"];


    public function product(){

        return $this->hasMany("App\Models\product","department_id");
    }

    public function department_children(){

        return $this->hasmany("App\Models\category","parent");
    }
    public function department_parent(){

        return$this->belongsTo("App\Models\category","parent");
    }
}
