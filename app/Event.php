<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Event extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','initials','date','description','qualis','link','deadline','user_id',
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function areas(){
        return $this->belongsToMany(Area::class);
    }

    public function getUserName(){
        $user = User::find($this->user_id);
        return $user->name;
    }

}