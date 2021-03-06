@extends('layouts.app')

@section('meta')
<title>{{ $article->title }} - អាល់ហ្វាផូលីត</title>
<meta name="description" content="{{ str_limit(strip_tags($article->content), 160) }}">
<meta name="google-site-verification" content="..." />
<meta property="og:url" content="{{ url('/' . $category->slug . '/' . (isset($article->subCategory) ? $article->subCategory->slug : 'អ') . '/' . $article->slug) }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $article->title }}" />
<meta property="og:description" content="{{ str_limit(strip_tags($article->content), 160) }}" />
<meta property="og:image" content="{{ url('/img/featured-image/' . $article->image) }}" />
<meta property="og:locale" content="km_KH" />
<meta property="fb:app_id" content="269342813510825" />
<meta property="og:site_name" content="អាល់ហ្វាផូលីត" />
@endsection

@section('content')

<div id="article-section" class="container">
    <div class="section group">
        <div class="col span_2_of_3">
            <div id="breadcrumbs-section" class="container">
                <a href="{{ url('/' . $category->slug) }}">{{ $category->name }}</a>  @if(!is_null($subcategory)) > <a href="  {{ url('/' . $category->slug . '/' .  $subcategory->slug) }}">{{ $subcategory->name }}</a> @endif
                
                @if(Auth::check())
                <a href="{{ url('/admin/articles/' . $article->id . '/edit') }}" class="edit-article"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                @endif
            </div>
            <div class="article-header">
                <h2>{{ $article->title }}</h2>
                <p class="date">{{ $article->created_at }}</p>
                <div class="featured-img">
                   @if($article->image != null)
                    <img src="{{ url('/img/featured-image/' . $article->image) }}" alt="{{ $article->image }}">
                    @endif
                </div>
            </div>
            <div class="article-body">

                {!! html_entity_decode($article->content) !!}

            </div>
            
            <div class="social-buttons">
                <div class="fb-share-button" data-href="{{ url('/' . $category->slug . '/' . (isset($article->subCategory) ? $article->subCategory->slug : 'អ') . '/' . $article->slug) }}" data-layout="button" data-size="small" data-mobile-iframe="true"></div>
                
                <div class="fb-send" data-href="{{ url('/' . $category->slug . '/' . (isset($article->subCategory) ? $article->subCategory->slug : 'អ') . '/' . $article->slug) }}"></div>
                
            </div>
            
            <div class="fb-comments" data-href="{{ url('/' . $category->slug . '/' . (isset($article->subCategory) ? $article->subCategory->slug : 'អ') . '/' . $article->slug) }}" data-numposts="5" data-width="100%"></div>
            
        </div>

        <div class="col span_1_of_3">
            <div class="sidebar-articles">
                <h2>អត្ដបទពេញនិយម</h2>
                <ul>
                   @foreach($popular_articles as $popular_article)
                   <li><a href="{{ url('/' . $popular_article->category->slug . '/' . (isset($popular_article->subCategory) ? $popular_article->subCategory->slug : 'អ') . '/' . $popular_article->slug) }}"><i class="fa fa-angle-right" aria-hidden="true"></i> {{ $popular_article->title }}</a></li>
                   @endforeach

                </ul>
            </div>

            <div class="sidebar-articles">
                <h2>អត្ដបទសម្រាបអ្នក</h2>
                <ul>
                    @foreach($recommended_articles as $recommended_article)
                   <li><a href="{{ url('/' . $recommended_article->category->slug . '/' . (isset($recommended_article->subCategory) ? $recommended_article->subCategory->slug : 'អ') . '/' . $recommended_article->slug) }}"><i class="fa fa-angle-right" aria-hidden="true"></i> {{ $recommended_article->title }}</a></li>
                   @endforeach
            
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
