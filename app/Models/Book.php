<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Book extends Model
{
    protected $fillable = [
    	'user_id', 'author_id', 'title', 'page_count', 'short_description', 'image'
    ];

    public function author()
    {
    	return $this->belongsTo('App\Models\Author');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function getImgAttribute()
    {
        return  Storage::disk('public')->exists($this->image) ?
            $this->image :
            config('book.defaultImagePath');
    }
}
