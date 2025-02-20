<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //URLs amigables
    public function getRouteKeyName(){
        return "slug";
    }

    //Relacion uno a muchos inversa
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
