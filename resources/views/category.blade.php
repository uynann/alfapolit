@extends('layouts.app')

@section('meta')
<title>{{ $category->name }} - អាល់ហ្វាផូលីត</title>
<meta name="description" content="{{ $category->decription }}">
<meta property="og:url" content="{{ url('/' . $category->slug) }}" />
<meta property="og:title" content="{{ $category->name }} - អាល់ហ្វាផូលីត" />
<meta property="og:description" content="{{ $category->decription }}" />
<meta property="og:image" content="{{ url('/img/alpha-icon-min.png') }}" />
<meta property="og:locale" content="km_KH" />
<meta property="fb:app_id" content="269342813510825" />
@endsection

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
