@extends('layouts.admin')

@section('title')
Create Article
@endsection

@section('content')

<div class="page new-item admin-wrapper">
    <div class="page-header">
        <h2>Add New Article</h2>
        <a href="{{ url('/admin/articles') }}" class="btn btn-small">Back to Articles</a>
    </div>

    <form action="{{ url('/admin/articles') }}" class="new-form" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="group">
            <div class="col span_1_of_5">
                <p><sup>*</sup> Title:</p>
            </div>
            <div class="col span_4_of_5 khmer">
                <input type="text" class="form-control" placeholder="ចំណងជើងអត្តបទ" name="title" value="{{ old('title') }}">

                @if ($errors->has('title'))
                <span class="help-block">
                    <p>{{ $errors->first('title') }}</p>
                </span>
                @endif
            </div>
        </div>
        <div class="group">
            <div class="col span_1_of_5">
                <p><sup>*</sup> Categories:</p>
            </div>
            <div class="col span_4_of_5 khmer">
                @foreach($categories as $category)
                <div class="category-block">
                    <div class="category">
                        <input type="radio" name="category" value="{{ $category->id }}"> {{ $category->name }}
                    </div>
                    @if(count($category->subcategories) > 0)
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <div class="subcategory">
                        ( @foreach($category->subcategories as $subcategory)
                        <input type="radio" name="subcategory" value="{{ $subcategory->id }}"> {{ $subcategory->name }}
                        @endforeach )
                    </div>
                    @endif
                </div>
                @endforeach

                @if ($errors->has('category'))
                <span class="help-block">
                    <p>{{ $errors->first('category') }}</p>
                </span>
                @endif
            </div>
        </div>
        <div class="group">
            <div class="col span_1_of_5">
                <p>Featured Image:</p>
            </div>
            <div class="col span_4_of_5 khmer">
                <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                @if ($errors->has('image'))
                <span class="help-block">
                    <p>{{ $errors->first('image') }}</p>
                </span>
                @endif
            </div>
        </div>

        <div class="group">
            <div class="col span_1_of_5">
                <p>Content:</p>
            </div>
            <div class="col span_4_of_5 khmer">
                <textarea class="form-control" id="froala-editor" name="content">{{ old('content') }}</textarea>
            </div>
        </div>
        <div class="group">
            <div class="col span_1_of_5">

            </div>
            <div class="col span_4_of_5">
                <input type="submit" class="btn" value="Publish" name="publish">
                <input type="submit" class="btn" value="Save" name="save">
            </div>
        </div>
    </form>

    <div class="note-on-page">
        <span><strong><em>Note:</em></strong></span>
        <span><em>Fields marked with &#42;  are required.</em></span>
    </div>


</div>

@endsection
