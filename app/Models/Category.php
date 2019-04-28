<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    
    protected $fillable = [
        "title",
        "slug",
        "description",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
        "updated_at",
    
    ];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/categories/'.$this->getKey());
    }

    
}
