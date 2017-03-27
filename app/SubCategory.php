<?php

namespace Alfapolit;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'name', 'description', 'slug', 'category_id',
    ];

    public function articles() {
        return $this->hasMany(Article::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
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
