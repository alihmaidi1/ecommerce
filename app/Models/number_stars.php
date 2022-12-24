<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class number_stars extends Model
{
    use HasFactory;
    public $fillable=["name","email","title","review","product_id","created_at","updated_at","rating"];
}
