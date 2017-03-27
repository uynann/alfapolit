<?php

namespace Alfapolit;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name', 'description', 'slug',
    ];

    public function articles() {
        return $this->hasMany(Article::class);
    }

    public function subcategories() {
        return $this->hasMany(SubCategory::class);
    }

    // Route Binding
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function articlesPublished() {
        return $this->articles()->where('status', 'published');
    }

    public function setSlugAttribute($slug)
    {
        $this->attributes['slug'] = preg_replace("/[!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s+*$]/", '', $slug);
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("name", "LIKE","%$keyword%")
                    ->orWhere("description", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
