<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'link',
        'title',
        'eng_title',
        'description',
        'image',
        'year',
        'quality_id',
        'world_art_id',
        'kinopoisk_id',
        'type'
    ];


    public function comments()
    {
        return $this->hasMany(FilmComment::class);
    }

}
