@extends('layouts.app')

@section('meta')
<title>ស្វែងរក {{ $param_val }} - អាល់ហ្វាផូលីត</title>
<meta name="description" content="ស្វែងរក {{ $param_val }}">
<meta property="og:url" content="{{ url('/search?' . $param . '=' . $param_val) }}" />
<meta property="og:title" content="ស្វែងរក {{ $param_val }} - អាល់ហ្វាផូលីត" />
<meta property="og:description" content="ស្វែងរក {{ $param_val }}" />
<meta property="og:image" content="{{ url('/img/alpha-icon-min.png') }}" />
<meta property="og:locale" content="km_KH" />
<meta property="fb:app_id" content="269342813510825" />
@endsection

@section('content')

<div id="articles-section" class="container">
    <div id="article-section" class="container">
        <div class="section group">
            <div class="col span_2_of_3">
                <div class="category-header">
                    <h1>លទ្ធផលស្វែងរក</h1>
                    <form action="" class="search-form1">
                        <input type="text" name="search" placeholder="ស្វែងរក" value="{{ $param_val }}">
                        <button type="submit"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
                    </form>
                </div>
                
                @if(count($articles_all) > 0)
                    @if(count($articles_all) < 10)
                        <p class="results-amount">រកឃើញ {{ count($articles_all) }} លទ្ធផល</p>
                    @else
                    <p class="results-amount">រកឃើញច្រើនជាង {{ floor(count($articles_all) / 10) * 10 }} លទ្ធផល</p>
                    @endif
                @else
                    <p class="results-amount">រកអត់ឃើញអត្តបទ</p>
                @endif

                <div class="results">
                   @foreach($articles as $article)
                    <div class="search-article">
                        <a href="{{ url('/' . $article->category->slug . '/' . (isset($article->subCategory) ? $article->subCategory->slug : 'អ') . '/' . $article->slug) }}"><h3>{{ $article->title }}</h3></a>
                        <div class="group">
                            <div class="col span_1_of_4">
                                <a href="{{ url('/' . $article->category->slug . '/' . (isset($article->subCategory) ? $article->subCategory->slug : 'អ') . '/' . $article->slug) }}"><img src="{{ url('/img/featured-image/' . $article->image) }}" alt="{{ $article->image }}"></a>
                            </div>
                            <div class="col span_3_of_4">
                                <p>{{ str_limit(strip_tags($article->content), 150) }}</p>
                                <p class="date-category"><em>{{ $article->created_at }}</em> <b><a href="category.html">{{ $article->category->name }}</a> @if(isset($article->subCategory)) <a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> {{ $article->subCategory->name }} </a> @endif</b></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                @if(count($articles) > 0)
                    {!! $articles->appends([$param => $param_val])->render() !!}
                @endif
                
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
</div>

@endsection
