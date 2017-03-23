@extends('layouts.admin')

@section('title')
Edit Article
@endsection

@section('content')

<div class="page new-item admin-wrapper">
    <div class="page-header">
        <h2>Edit Article</h2>
        <a href="{{ url('/admin/articles') }}" class="btn btn-small">Back to Articles</a>
        <a href="{{ url('/'. $article->category->slug . '/' . $article->slug) }}" class="btn btn-small">Show Article</a>
    </div>

    @if(session('message'))
    <div class="message">
        <p>{{ session('message') }}</p>
        <span class="close-message"><i class="fa fa-times" aria-hidden="true"></i></span>
    </div>
    @endif

    <form action="{{ url('/admin/articles/' . $article->id) }}" class="new-form" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="group">
            <div class="col span_1_of_5">
                <p><sup>*</sup> Title:</p>
            </div>
            <div class="col span_4_of_5 khmer">
                <input type="text" class="form-control" placeholder="ចំណងជើងអត្តបទ" name="title" value="{{ $article->title }}">

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
                <select class="form-control" name="category" value="{{ old('category') }}">
                    @foreach($categories as $category)
                        @if($category->id == $article->category->id))
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="group">
            <div class="col span_1_of_5">
                <p>Featured Image:</p>
            </div>
            <div class="col span_4_of_5 khmer">
                <input type="file" name="image" class="form-control">
                @if ($errors->has('image'))
                <span class="help-block">
                    <p>{{ $errors->first('image') }}</p>
                </span>
                @endif

                @if(!empty($article->image))
                <div class="featured-image">
                    <img src="{{ url('/img/featured-image/thumbs/' . $article->image) }}" alt="{{ $article->image }}">
                </div>
                @endif
            </div>
        </div>

        <div class="group">
            <div class="col span_1_of_5">
                <p>Content:</p>
            </div>
            <div class="col span_4_of_5 khmer">
                <textarea class="form-control" id="froala-editor" name="content">{{ $article->content }}</textarea>
            </div>
        </div>

        <div class="group">
            <div class="col span_1_of_5">
                <p>Status:</p>
            </div>
            <div class="col span_4_of_5 khmer">
                <input type="radio" name="status" value="published" @if($article->status == 'published') checked @endif> ផ្សប់ផ្យាយ<br>
                <input type="radio" name="status" value="saved" @if($article->status == 'saved') checked @endif> ព្រាង<br>
            </div>
        </div>

        <div class="group">
            <div class="col span_1_of_5">

            </div>
            <div class="col span_4_of_5">
                <input type="submit" class="btn" value="Update">
            </div>
        </div>
    </form>

    <div class="note-on-page">
        <span><strong><em>Note:</em></strong></span>
        <span><em>Fields marked with &#42;  are required.</em></span>
    </div>


</div>

@endsection
