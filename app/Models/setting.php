<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    use HasFactory;
    public $fillable=["name_en","name_ar","phone","address","time_work","facebook","email","logo","description","keywords","status","message","created_at","updated_at"];
}
