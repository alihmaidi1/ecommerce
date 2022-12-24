<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class size_product extends Model
{
    use HasFactory;
    public $fillable=["product_id","size_id","created_at","updated_at"];
}
