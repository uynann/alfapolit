<?php

namespace Alfapolit\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Alfapolit\Http\Controllers\Controller;
use Alfapolit\CustomField;

class CustomFieldsController extends Controller
{
    public function index()
    {
        return view('admin.custom-fields', ['custom_fields' => CustomField::all()]);
    }
}
