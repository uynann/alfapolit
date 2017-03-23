@extends('layouts.admin')

@section('title')
Articles
@endsection

@section('content')

<div class="page all-items admin-wrapper">
    <div class="page-header">
        <h2>Articles</h2>
        <a href="{{ url('/admin/articles/create') }}" class="btn btn-small">Add New</a>
    </div>

    <div class="items-table">
        <div class="item-titles group">
            <div class="col span_3_of_6">
                <b>Title</b>
            </div>
            <div class="col span_1_of_6">
                <b>Category</b>
            </div>
            <div class="col span_1_of_6">
                <b>Date</b>
            </div>
            <div class="col span_1_of_6">
                <b>Action</b>
            </div>
        </div>

        @foreach($articles as $article)

        <div class="item-body group">
            <div class="col span_3_of_6 khmer">
                <a href="{{ url('/admin/articles/' . $article->id . '/edit') }}">{{ $article->title }}
                @if($article->status == 'saved')<b>- ព្រាង</b>@endif</a>
            </div>
            <div class="col span_1_of_6 khmer">
                <a href=""><b>{{ $article->category->name }}</b></a>
            </div>
            <div class="col span_1_of_6 khmer">
                <p>{{ $article->created_at }}</p>
            </div>
            <div class="col span_1_of_6">
                <a href="{{ url('/admin/articles/' . $article->id . '/edit') }}" class="btn btn-small btn-item-big"><span>Edit</span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a href="" class="btn btn-small btn-item-big"><span>Delete</span><i class="fa fa-trash" aria-hidden="true"></i></a>
            </div>
        </div>

        @endforeach

    </div>

    {{ $articles->links() }}

    <div class="note-on-page">
        <span><strong><em>Note:</em></strong></span>
        <span><em>Deleting an article does not delete it permanently. Instead article is moved to trash.</em></span>
    </div>


</div>

@endsection
