<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socials extends Model
{
    use HasFactory;


    protected $fillable = ['content', 'facebook_link','youtube_link','twitter_link','status'];
}
