<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory;
    use HasSlug;

    // protected $table = 'categories';

    protected $fillable = ['title', 'content', 'slug', 'url', 'image', 'created_at', 'updated_at'];

     /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->usingSeparator('-');
    }


    public function news()
    {
        return $this->hasMany(News::class);
    }
}
