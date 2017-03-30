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
    
    public function updateSlide(Request $request, $id) 
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,bmp|max:1000',
        ]);
        
        $customField = CustomField::find($id);
        
        $customField->update([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->ex_link,
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '-' . $image->getClientOriginalName();

            $image->move('img/sliders/', $filename);

            $customField->update(['image' => $filename]);
        }
         
        
        return redirect()->back()->with('message', 'Custom Field saved.');
    }
    
    public function updateKnowledge(Request $request, $id) 
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        
        CustomField::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
        
        ]);
        
        return redirect()->back()->with('message', 'Custom Field saved.');
    }
}
