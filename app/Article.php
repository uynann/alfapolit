<?php

namespace Alfapolit;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Article extends Model
{
//    for soft delete
//    use SoftDeletes;
//    protected $dates = ['deleted_at'];


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
    
    public function getCreatedAtAttribute($date)
    {
        $text = Carbon::createFromFormat('Y-m-d H:i:s', $date)->timezone('Europe/Moscow')->format('d M Y');
        
        $text = str_replace('1', '១', $text);
        $text = str_replace('2', '២', $text);
        $text = str_replace('3', '៣', $text);
        $text = str_replace('4', '៤', $text);
        $text = str_replace('5', '៥', $text);
        $text = str_replace('6', '៦', $text);
        $text = str_replace('7', '៧', $text);
        $text = str_replace('8', '៨', $text);
        $text = str_replace('9', '៩', $text);
        $text = str_replace('0', '០', $text); 
        
        $text = str_replace('Jan', 'មករា', $text);
        $text = str_replace('Feb', 'កុម្ភះ', $text);
        $text = str_replace('Mar', 'មិនា', $text);
        $text = str_replace('Apr', 'មេសា', $text);
        $text = str_replace('May', 'ឧសភា', $text);
        $text = str_replace('Jun', 'មិថុនា', $text);
        $text = str_replace('Jul', 'កក្កដា', $text);
        $text = str_replace('Aug', 'សីហា', $text);
        $text = str_replace('Sep', 'កញ្ញា', $text);
        $text = str_replace('Oct', 'តុលា', $text);
        $text = str_replace('Nov', 'វិច្ឆិកា', $text);
        $text = str_replace('Dec', 'ធ្នូ', $text);
        
        return $text;
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
