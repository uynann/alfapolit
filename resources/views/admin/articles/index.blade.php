@extends('layouts.admin')

@section('title')Articles @endsection

@section('content')

<div class="page all-items admin-wrapper">
    <div class="page-header">
        <h2>Articles</h2>
        <a href="{{ url('/admin/articles/create') }}" class="btn btn-small">Add New</a>
    </div>

    @if(session('message'))
    <div class="message">
        <p>{{ session('message') }}</p>
        <span class="close-message"><i class="fa fa-times" aria-hidden="true"></i></span>
    </div>
    @endif

    <div class="statistics">
        <span>All ({{ count($article_all) }})</span>
        <span>Published ({{ count($article_published) }})</span>
        <span>Draft ({{ count($article_draft) }})</span>
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

        @forelse($articles as $article)

        <div class="item-body group">
            <div class="col span_3_of_6 khmer">
                <a href="{{ url('/admin/articles/' . $article->id . '/edit') }}">{{ $article->title }}
                @if($article->status == 'saved')<b>- ព្រាង</b>@endif</a>
            </div>
            <div class="col span_1_of_6 khmer">
                <a href=""><b>{{ $article->category->name }}  @if($article->subCategory) <i class="fa fa-angle-right" aria-hidden="true"></i> {{ $article->subCategory->name }}
                @endif </b></a>
            </div>
            <div class="col span_1_of_6 khmer">
                <p>{{ $article->created_at }}</p>
            </div>
            <div class="col span_1_of_6">
                <a href="{{ url('/admin/articles/' . $article->id . '/edit') }}" class="btn btn-small btn-item-big"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                <form class="delete-form" action="{{ url('/admin/articles/' . $article->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-small"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>

        @empty
        <div class="item-body group">
            <p class="not-found-text">No articles found.</p>
        </div>
        @endforelse

    </div>

    {{ $articles->links() }}

    <div class="note-on-page">
        <span><strong><em>Note:</em></strong></span>
        <span><em>Deleting an article does not delete it permanently. Instead article is moved to trash.</em></span>
    </div>
</div>


<div class="confirm-modal">
    <div class="modal-header">
        <h3>Delete Article</h3>
        <span class="close-modal"><i class="fa fa-times" aria-hidden="true"></i></span>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to delete this article?</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn confirm">Yes</button>
        <button type="button" class="btn btn-trans cancel">Cancel</button>
    </div>
</div>

<div class="modal-overlay"></div>

@endsection
