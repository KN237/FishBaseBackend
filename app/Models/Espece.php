<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espece extends Model
{
    use HasFactory;

    protected $fillable=['nom','illustration','description','remarque','famille_id','category_id','forme_id'];

    public function forme(){

        return $this->belongsTo(Forme::class);
    }

    public function famille(){

        return $this->belongsTo(Famille::class);
    }

    public function category(){

        return $this->belongsTo(Category::class);
    }
}
