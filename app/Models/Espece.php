<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espece extends Model
{
    use HasFactory;

    public function famille(){

        return $this->belongsTo(Famille::class);
    }

    public function category(){

        return $this->belongsTo(Category::class);
    }
}
