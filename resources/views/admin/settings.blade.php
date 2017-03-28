@extends('layouts.admin')

@section('title')Settings @endsection

@section('content')

<div class="page all-items admin-wrapper">
    <div class="page-header">
        <h2>Settings</h2>
    </div>

    @if(session('message'))
    <div class="message">
        <p>{{ session('message') }}</p>
        <span class="close-message"><i class="fa fa-times" aria-hidden="true"></i></span>
    </div>
    @endif
    
    <div class="group">
        <div class="col span_4_of_5">
            <form action="{{ url('/admin/settings') }}" class="new-form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="group">
                    <div class="col span_1_of_6">
                        <p>Site Logo:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <input type="file" class="form-control" name="image">

                        @if ($errors->has('image'))
                        <span class="help-block">
                            <p>{{ $errors->first('image') }}</p>
                        </span>
                        @endif
                        
                        @if(!empty($site_info->image))
                        <div class="featured-image">
                            <img src="{{ url('/img/' . $site_info->image) }}" alt="{{ $site_info->image }}">
                        </div>
                        @endif
                    </div>
                </div>
                
                <div class="group">
                    <div class="col span_1_of_6">
                        <p>Site Image:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <input type="file" class="form-control" name="image1">

                        @if ($errors->has('image1'))
                        <span class="help-block">
                            <p>{{ $errors->first('image1') }}</p>
                        </span>
                        @endif
                        
                        @if(!empty($site_info->image1))
                        <div class="featured-image">
                            <img src="{{ url('/img/' . $site_info->image1) }}" alt="{{ $site_info->image1 }}">
                        </div>
                        @endif
                    </div>
                </div>
                
                <div class="group">
                    <div class="col span_1_of_6">
                        <p><sup>*</sup> Site Name:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <input type="text" class="form-control" placeholder="ឈ្មោះវេបសាយ៍" name="name" value="{{ $site_info->name }}">

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <p>{{ $errors->first('name') }}</p>
                        </span>
                        @endif
                    </div>
                </div>
                
                <div class="group">
                    <div class="col span_1_of_6">
                        <p>Site Description:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <textarea name="description" class="form-control" placeholder="បរិយាយអំពីវេបសាយ៍" rows="5">{{ $site_info->description }}</textarea>

                        @if ($errors->has('description'))
                        <span class="help-block">
                            <p>{{ $errors->first('description') }}</p>
                        </span>
                        @endif
                    </div>
                </div>
                
                
                <div class="group">
                    <div class="col span_1_of_6">
                        <p>Email:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <input type="text" class="form-control" placeholder="អ៊ីម៉ែល" name="email" value="{{ $site_info->email }}">
                    </div>
                </div>
                
                <div class="group">
                    <div class="col span_1_of_6">
                        <p>Telephone:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <input type="text" class="form-control" placeholder="ទូរស័ព្ទ" name="phone" value="{{ $site_info->phone }}">
                    </div>
                </div>
                
                <div class="group">
                    <div class="col span_1_of_6">
                        <p>Facebook:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <input type="text" class="form-control" placeholder="តំណរភ្ជាប់ទៅកាន់ Facebook" name="fb_link" value="{{ $site_info->fb_link }}">
                    </div>
                </div>
                
                <div class="group">
                    <div class="col span_1_of_6">
                        <p>Twitter:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <input type="text" class="form-control" placeholder="តំណរភ្ជាប់ទៅកាន់ Twitter" name="tw_link" value="{{ $site_info->tw_link }}">
                    </div>
                </div>
                
                
                <div class="group">
                    <div class="col span_1_of_6">
                        <p>Instagram:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <input type="text" class="form-control" placeholder="តំណរភ្ជាប់ទៅកាន់ Instagram" name="ins_link" value="{{ $site_info->ins_link }}">
                    </div>
                </div>
                
                <div class="group">
                    <div class="col span_1_of_6">
                        <p>Vkontakte:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <input type="text" class="form-control" placeholder="តំណរភ្ជាប់ទៅកាន់ Vkontakte" name="vk_link" value="{{ $site_info->vk_link }}">
                    </div>
                </div>
                
                <div class="group">
                    <div class="col span_1_of_6">
                        <p>Youtube:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <input type="text" class="form-control" placeholder="តំណរភ្ជាប់ទៅកាន់ Youtube" name="yt_link" value="{{ $site_info->yt_link }}">
                    </div>
                </div>
                
                
                <div class="group">
                    <div class="col span_1_of_6">
                        <p>About You:</p>
                    </div>
                    <div class="col span_5_of_6 khmer">
                        <textarea name="about_admin" class="form-control" id="froala-editor" placeholder="បរិយាយអំពីអ្នក">{{ $site_info->about_admin }}</textarea>

                        @if ($errors->has('description'))
                        <span class="help-block">
                            <p>{{ $errors->first('description') }}</p>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="group">
                    <div class="col span_1_of_6">
                    </div>
                    <div class="col span_4_of_6">
                        <input type="submit" class="btn" value="Save">
                    </div>
                </div>
            </form>

            <div class="note-on-page">
                <span><strong><em>Note:</em></strong></span>
                <span><em>Fields marked with &#42;  are required.</em></span>
            </div>
        </div>
    </div>
</div>

@endsection
