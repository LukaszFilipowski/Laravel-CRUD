<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $table = 'achievements';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name', 'content', 'artist_id'
    ];
    
    public function artist() {
        return $this->belongsTo('App\Artist');
    }
}
