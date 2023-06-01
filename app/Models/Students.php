<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'students';

    protected $fillable = ['id', 'name', 'email', 'password','content','fathername','address','rollno','class','subject','classteacher'];

    public function searchableAs(): string
    {
        return 'index';
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords($value);
    }
}
