<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Area;

class Tag extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'area_id'
    ];

    public function events(){
        return $this->belongsToMany(Event::class);
    }

    public function getAreaName(){
        $area = Area::find($this->area_id);
        return $area->name;
    }

}
