<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Famille extends Model
{
    use HasFactory;

    protected $fillable=['nom','illustration','taille_max','coloration','distribution_naturelle','introduction_bg','forme_id','description','remarque','famille_id','category_id'];


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
