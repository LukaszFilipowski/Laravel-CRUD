<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
    
    public function addImage($filename, $oldImage = false) {
        if ($filename != null) {
            if($oldImage) {
                Storage::delete($this->content);
            }
            $path = $filename->store('public/images/items');
            $this->content = $path;
        }
    }
}
