@extends('layouts.admin')

@section('title')Custom Fields @endsection

@section('content')

<div class="page all-items admin-wrapper">
    <div class="page-header">
        <h2>Custom Fields</h2>
    </div>

    @if(session('message'))
    <div class="message">
        <p>{{ session('message') }}</p>
        <span class="close-message"><i class="fa fa-times" aria-hidden="true"></i></span>
    </div>
    @endif
    
    
    <div class="custom_fields">
     <h3>Slides</h3>
    @foreach($custom_fields as $custom_field)
     @if($custom_field->type == 'slide')
      <div class="group">
        <div class="col span_4_of_5">
            <form action="{{ url('/admin/settings/' . $custom_field->id . '/edit') }}" class="new-form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
                <div class="group">
                    <div class="col span_1_of_6">
                        <p><sup>*</sup> Image:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <input type="file" class="form-control" name="image">

                        @if ($errors->has('image'))
                        <span class="help-block">
                            <p>{{ $errors->first('image') }}</p>
                        </span>
                        @endif
                        
                        @if(!empty($custom_field->image))
                        <div class="featured-image">
                            <img src="{{ url('/img/sliders/' . $custom_field->image) }}" alt="{{ $custom_field->image }}">
                        </div>
                        @endif
                    </div>
                </div>
                
                <div class="group">
                    <div class="col span_1_of_6">
                        <p><sup>*</sup> Title:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <input type="text" class="form-control" placeholder="ចំណងជើង" name="title" value="{{ $custom_field->title }}">

                        @if ($errors->has('title'))
                        <span class="help-block">
                            <p>{{ $errors->first('title') }}</p>
                        </span>
                        @endif
                    </div>
                </div>
                
                <div class="group">
                    <div class="col span_1_of_6">
                        <p>Link:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <input type="text" class="form-control" placeholder="តំណរភ្ជាប់" name="link" value="{{ $custom_field->link }}">

                        @if ($errors->has('link'))
                        <span class="help-block">
                            <p>{{ $errors->first('link') }}</p>
                        </span>
                        @endif
                    </div>
                </div>
                
                <div class="group">
                    <div class="col span_1_of_6">
                        <p>Description:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <textarea name="description" class="form-control" placeholder="បរិយាយ" rows="5">{{ $custom_field->description }}</textarea>

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
                        <input type="submit" class="btn btn-small" value="Save">
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif
    @endforeach
    <div class="note-on-page">
        <span><strong><em>Note:</em></strong></span>
        <span><em>Fields marked with &#42;  are required.</em></span>
    </div>
    
    </div>
    
    
    <div class="custom_fields">
     <h3>Knowledges</h3>
    @foreach($custom_fields as $custom_field)
     @if($custom_field->type == 'knowledge')
      <div class="group">
        <div class="col span_4_of_5">
            <form action="{{ url('/admin/settings/' . $custom_field->id . '/edit') }}" class="new-form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
                <div class="group">
                    <div class="col span_1_of_6">
                        <p><sup>*</sup> Title:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <input type="text" class="form-control" placeholder="ចំណងជើង" name="title" value="{{ $custom_field->title }}">

                        @if ($errors->has('title'))
                        <span class="help-block">
                            <p>{{ $errors->first('title') }}</p>
                        </span>
                        @endif
                    </div>
                </div>
                
                <div class="group">
                    <div class="col span_1_of_6">
                        <p>Description:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <textarea name="description" class="form-control" placeholder="បរិយាយ" rows="5">{{ $custom_field->description }}</textarea>

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
                        <input type="submit" class="btn btn-small" value="Save">
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif
    @endforeach
    <div class="note-on-page">
        <span><strong><em>Note:</em></strong></span>
        <span><em>Fields marked with &#42;  are required.</em></span>
    </div>
    
    </div>
    
    
</div>

@endsection
