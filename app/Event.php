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

    public function getUserName(){
        $user = User::find($this->user_id);
        return $user->name;
    }

}