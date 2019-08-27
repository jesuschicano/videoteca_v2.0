<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $table = 'peliculas';

    public function genero(){
        return $this->belongsTo('App\Genero', 'id_genero');
    }
}
