<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    // protected $table = 'menus';

    protected $fillable = ['title', 'content','url', 'status', 'created_at', 'updated_at' ];
}
