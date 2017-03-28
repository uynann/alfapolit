<?php

namespace Alfapolit;

use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'image', 
        'image1', 
        'about_admin', 
        'email', 
        'phone',
        'fb_link',
        'tw_link',
        'ins_link',
        'vk_link',
        'yt_link',
    ];
}
