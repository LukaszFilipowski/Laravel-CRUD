<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insta extends Model
{
    protected $table = 'insta_profiles';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name'
    ];
}
