<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
}
