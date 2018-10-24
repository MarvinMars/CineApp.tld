<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'slug','settings_id'
    ];

    public function items()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function settings()
    {
        return $this->belongsTo(Settings::class);
    }

}
