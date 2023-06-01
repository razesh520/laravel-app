<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';

    protected $fillable = ['title', 'students_id', 'slug', 'category', 'content', 'image', 'created_at', 'updated_at', 'created_by',  'updated_by'];

    public function getStudent(): BelongsTo
    {
        return $this->belongsTo(Students::class, 'students_id', 'id');
    }
}
