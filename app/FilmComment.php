<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmComment extends Model
{
    protected $fillable = [
        'film_id','user_id','parent_id','text'
    ];


    public function sub_comments()
    {
        return $this->hasMany(FilmComment::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent_comment()
    {
        return $this->belongsTo(FilmComment::class, 'parent_id');
    }

}
