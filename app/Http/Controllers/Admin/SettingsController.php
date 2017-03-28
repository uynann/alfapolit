<?php

namespace Alfapolit\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Alfapolit\Http\Controllers\Controller;
use Alfapolit\SiteInfo;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings', ['site_info' => SiteInfo::find(1)]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,bmp|max:1000',
            'image1' => 'mimes:jpeg,jpg,png,bmp|max:1000',
        ]);
        
        SiteInfo::find(1)->update([
            'name' => $request->name,
            'description' => $request->description,
            'email' => $request->email,
            'phone' => $request->phone,
            'fb_link' => $request->fb_link,
            'tw_link' => $request->tw_link,
            'ins_link' => $request->ins_link,
            'vk_link' => $request->vk_link,
            'yt_link' => $request->yt_link,
            'about_admin' => $request->about_admin,
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '-' . $image->getClientOriginalName();

            $image->move('img/', $filename);

            SiteInfo::find(1)->update(['image' => $filename]);
        }
        
        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $filename1 = uniqid() . '-' . $image1->getClientOriginalName();

            $image1->move('img/', $filename1);

            SiteInfo::find(1)->update(['image1' => $filename1]);
        }
        
        
        return redirect()->back()->with('message', 'Settings saved.');
    }
}
