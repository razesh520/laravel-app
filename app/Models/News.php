<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class News extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = 'news';

    protected $fillable = ['title', 'category_id', 'slug', 'content', 'image', 'created_at', 'updated_at', 'created_by',  'updated_by'];


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

    public function getCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
