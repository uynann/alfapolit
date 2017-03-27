@extends('layouts.app')

@section('title'){{ $category->name }} - អាល់ហ្វាផូលីត@endsection

@section('description')Alfapolit website.@endsection

@section('content')
<div id="articles-section" class="container">
    <div class="category-header">
        <h1>{{ $category->name }} @if(isset($subcategory)) <i class="fa fa-angle-right" aria-hidden="true"></i> {{ $subcategory }} @endif</h1>
    </div>
    <div class="articles">

       @forelse($category_articles->chunk(3) as $articles)
        <div class="section group">
           @foreach($articles as $article)
            <div class="col span_1_of_3">
                <div class="article card">
                    <div class="card-img">
                        <a href="{{ url('/' . $category->slug . '/' . (isset($article->subCategory) ? $article->subCategory->name : 'អ') . '/' . $article->slug) }}"><img src="{{ url('/img/featured-image/thumbs/' . $article->image) }}" alt="{{ $article->image }}"></a>
                    </div>
                    <div class="card-block">
                        <div class="card-title">
                            <a href="{{ url('/' . $category->slug . '/' . (isset($article->subCategory) ? $article->subCategory->name : 'អ') . '/' . $article->slug) }}"><h4>{{ $article->title }}</h4></a>
                        </div>
                        <div class="card-footer">
                            <p class="date">{{ $article->created_at }}</p> <a href="">{{ $category->name }}</a> @if(isset($article->subCategory)) <a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> {{ $article->subCategory->name }} </a> @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @empty
            <p>អត់ទាន់មានអត្តបទនៅឡើយទេ។</p>
        @endforelse
    </div>

    {{ $category_articles->links() }}
</div>
@endsection
