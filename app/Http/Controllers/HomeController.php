<?php

namespace Alfapolit\Http\Controllers;

use Illuminate\Http\Request;
use Alfapolit\SiteInfo;
use Alfapolit\CustomField;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', [
            'site_info' => SiteInfo::find(1),
            'custom_fields' => CustomField::all(),
        ]);
    }
}
