<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'link','title','description','image'
    ];


    public function comments()
    {
        return $this->hasMany(FilmComment::class);
    }

}
