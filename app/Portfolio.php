<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolio';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name', 'content_type', 'content', 'artist_id'
    ];
    
    public function artist() {
        return $this->belongsTo('App\Artist');
    }
}
