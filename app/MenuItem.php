<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'slug','title','menu_id'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
