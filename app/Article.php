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
        return $this->belongsTo('Alfapolit\Category');
    }

    public function subCategory() {
        return $this->belongsTo('Alfapolit\SubCategory');
    }

    public function setSlugAttribute($slug)
    {
        $this->attributes['slug'] = preg_replace('/\s+/', '', $slug);
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("title", "LIKE","%$keyword%");
            });
        }
        return $query;
    }
}
