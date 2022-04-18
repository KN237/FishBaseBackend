<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forme extends Model
{
    use HasFactory;

    protected $fillable=['nom','description'];

    public function familles(){

        return $this->hasMany(Familly::class);
    }
}
