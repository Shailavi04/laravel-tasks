<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasTranslations, HasSlug;

    protected $fillable = ['title', 'description', 'slug', 'image_path'];
    public $translatable = ['title', 'description'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title.en') // Generate slug from English title
            ->saveSlugsTo('slug');
    }
}
