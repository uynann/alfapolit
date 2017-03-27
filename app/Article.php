<?php

namespace Alfapolit;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    // for soft delete
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'title', 'content', 'image', 'status', 'category_id', 'slug', 'view_count', 'sub_category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function subCategory() {
        return $this->belongsTo(SubCategory::class);
    }

    // Route Binding
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setSlugAttribute($slug)
    {
        $this->attributes['slug'] = preg_replace("/[!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s+*$]/", '', $slug);
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '') {   
            $query->whereHas("Category", function($query) use ($keyword) {
                $query->where("name", "LIKE", "%$keyword%");
            })
                ->orWhereHas("SubCategory", function($query) use ($keyword) {
                $query->where("name", "LIKE", "%$keyword%");
            })
                ->orWhere("title","LIKE","%$keyword%")->get();
        } 
    }
}
