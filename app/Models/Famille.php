<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Famille extends Model
{
    use HasFactory;

    public function forme(){

        return $this->belongsTo(Forme::class);
    }

    public function especes(){

        return $this->hasMany(Espece::class);
    }

    public function genres(){

        return $this->hasMany(Genre::class);
    }
}
