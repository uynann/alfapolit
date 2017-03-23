<?php

namespace Alfapolit;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'slug',
    ];

    public function articles() {
        return $this->hasMany('Alfapolit\Article');
    }

    public function articlesPublished() {
        return $this->articles()->where('status', '=', 'published');
    }

    public function setSlugAttribute($slug)
    {
        $this->attributes['slug'] = preg_replace('/\s+/', '', $slug);
    }
}
