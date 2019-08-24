<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
    	'first_name', 'last_name'
    ];

    public function getNameAttribute()
    {
    	return $this->first_name . " " . $this->last_name;
    }

    public function books()
    {
    	return $this->hasMany('App\Models\Book');
    }
}
