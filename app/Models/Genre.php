<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable=['nom','illustration','famille_id'];


    public function famille(){

        return $this->belongsTo(Famille::class);
    }
}
