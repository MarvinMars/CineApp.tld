<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\Media;

use Brackets\Media\HasMedia\HasMediaCollections;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;

class Film extends Model implements HasMediaCollections, HasMediaConversions
{

    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

    protected $fillable = [
        "title",
        "slug",
        "film_url",
        "year",
        "description",
        "rating",
        "likes",
        "enabled",
        "seo_keywords",
        "seo_description",
    
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
        return url('/admin/films/'.$this->getKey());
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('gallery')
            ->maxNumberOfFiles(10);

        $this->addMediaCollection('poster')
            ->maxNumberOfFiles(1);

        $this->addMediaCollection('video')
            ->maxNumberOfFiles(1)
            ->maxFilesize(20*1024*1024);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->autoRegisterThumb200();

        $this->addMediaConversion('detail_hd')
            ->width(1920)
            ->height(1080)
            ->performOnCollections('gallery');

        $this->addMediaConversion('detail_hd')
            ->width(1920)
            ->height(1080)
            ->performOnCollections('poster');
    }
    
}
