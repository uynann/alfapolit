<?php

namespace Alfapolit;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'type', 'link',
    ];
}
