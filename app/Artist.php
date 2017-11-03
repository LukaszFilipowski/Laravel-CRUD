<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'artists';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name', 'category', 'contact_mail', 'contact_instagram', 'contact_facebook', 'description', 'accepted'
    ];
    
    public function achievements() {
        return $this->hasMany('App\Achievement');
    }
    
    public function portfolioItem() {
        return $this->hasMany('App\Portfolio');
    }
    
    public static function validation() {
        return array(
            'name' => 'required',
            'category' => 'required',
            'contact_mail' => 'required',
            'contact_instagram' => 'required',
            'contact_facebook' => 'required',
            'description' => 'required',
            'achievement_name0' => 'required',
            'achievement_content0' => 'required',
        );
    }
}
