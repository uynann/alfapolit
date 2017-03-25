<?php

namespace Alfapolit\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Alfapolit\Http\Controllers\Controller;

class CustomFieldsController extends Controller
{
    public function index()
    {
        return view('admin.custom-fields');
    }
}
