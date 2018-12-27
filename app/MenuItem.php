<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'slug','title','menu_id'
    ];

    protected $appends = ['icon'];

    public function getIconAttribute($value)
    {
        return ucfirst($value);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

}
