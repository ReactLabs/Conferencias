<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
    ];

    public function events(){
        return $this->belongsToMany(Event::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

}
