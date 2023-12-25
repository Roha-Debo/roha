<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia 
{
    use HasFactory ,HasTranslations ,  InteractsWithMedia;
    protected $guarded=[];
    public $translatable = ['section1_title','section1_description','footer_text','title_text','mete_description','mete_keywords'];


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('media'); // 'media' should match the name of the relationship in your model
    }
}
