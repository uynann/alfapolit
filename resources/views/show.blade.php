@extends('layouts.app')

@section('meta')
<title>{{ $article->title }} - អាល់ហ្វាផូលីត</title>
<meta name="description" content="{{ str_limit(strip_tags($article->content), 160) }}">
<meta property="og:url" content="{{ url('/' . $category->slug . '/' . (isset($article->subCategory) ? $article->subCategory->name : 'អ') . '/' . $article->slug) }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $article->title }}" />
<meta property="og:description" content="{{ str_limit(strip_tags($article->content), 160) }}" />
<meta property="og:image" content="{{ url('/img/featured-image/' . $article->image) }}" />
<meta property="og:locale" content="km_KH" />
<meta property="fb:app_id" content="269342813510825" />
@endsection

@section('content')

<div id="article-section" class="container">
    <div class="section group">
        <div class="col span_2_of_3">
            <div id="breadcrumbs-section" class="container">
                <a href="{{ url('/' . $category->slug) }}">{{ $category->name }}</a>  @if(!is_null($subcategory)) > <a href="  {{ url('/' . $category->slug . '/' .  $subcategory->slug) }}">{{ $subcategory->name }}</a> @endif
            </div>
            <div class="article-header">
                <h2>{{ $article->title }}</h2>
                <p class="date">{{ $article->created_at }}</p>
                <div class="featured-img">
                    <img src="{{ url('/img/featured-image/' . $article->image) }}" alt="{{ $article->image }}">
                </div>
            </div>
            <div class="article-body">

                {!! html_entity_decode($article->content) !!}

            </div>
            <div class="fb-share-button" data-href="{{ url('/' . $category->slug . '/' . (isset($article->subCategory) ? $article->subCategory->name : 'អ') . '/' . $article->slug) }}" data-layout="button" data-size="large" data-mobile-iframe="true"></div>
        </div>

        <div class="col span_1_of_3">
            <div class="sidebar-articles">
                <h2>អត្ដបទពេញនិយម</h2>
                <ul>
                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> នុយក្លេអ៊ែរ​កូរ៉េខាងជើង៖ ប្រមុខ​ការបរទេស​អាមេរិក​ចង់បាន​ដំណោះស្រាយ​ថ្មី ក្រៅពី​នយោបាយ​ការទូត</a></li>
                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> នុយក្លេអ៊ែរ​កូរ៉េខាងជើង៖ ប្រមុខ​ការបរទេស​អាមេរិក​ចង់បាន​ដំណោះស្រាយ​ថ្មី ក្រៅពី​នយោបាយ​ការទូត</a></li>
                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> នុយក្លេអ៊ែរ​កូរ៉េខាងជើង៖ ប្រមុខ​ការបរទេស​អាមេរិក​ចង់បាន​ដំណោះស្រាយ​ថ្មី ក្រៅពី​នយោបាយ​ការទូត</a></li>
                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> នុយក្លេអ៊ែរ​កូរ៉េខាងជើង៖ ប្រមុខ​ការបរទេស​អាមេរិក​ចង់បាន​ដំណោះស្រាយ​ថ្មី ក្រៅពី​នយោបាយ​ការទូត</a></li>
                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> នុយក្លេអ៊ែរ​កូរ៉េខាងជើង៖ ប្រមុខ​ការបរទេស​អាមេរិក​ចង់បាន​ដំណោះស្រាយ​ថ្មី ក្រៅពី​នយោបាយ​ការទូត</a></li>

                </ul>
            </div>

            <div class="sidebar-articles">
                <h2>អត្ដបទសម្រាបអ្នក</h2>
                <ul>
                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> នុយក្លេអ៊ែរ​កូរ៉េខាងជើង៖ ប្រមុខ​ការបរទេស​អាមេរិក​ចង់បាន​ដំណោះស្រាយ​ថ្មី ក្រៅពី​នយោបាយ​ការទូត</a></li>
                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> នុយក្លេអ៊ែរ​កូរ៉េខាងជើង៖ ប្រមុខ​ការបរទេស​អាមេរិក​ចង់បាន​ដំណោះស្រាយ​ថ្មី ក្រៅពី​នយោបាយ​ការទូត</a></li>
                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> នុយក្លេអ៊ែរ​កូរ៉េខាងជើង៖ ប្រមុខ​ការបរទេស​អាមេរិក​ចង់បាន​ដំណោះស្រាយ​ថ្មី ក្រៅពី​នយោបាយ​ការទូត</a></li>
                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> នុយក្លេអ៊ែរ​កូរ៉េខាងជើង៖ ប្រមុខ​ការបរទេស​អាមេរិក​ចង់បាន​ដំណោះស្រាយ​ថ្មី ក្រៅពី​នយោបាយ​ការទូត</a></li>
                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> នុយក្លេអ៊ែរ​កូរ៉េខាងជើង៖ ប្រមុខ​ការបរទេស​អាមេរិក​ចង់បាន​ដំណោះស្រាយ​ថ្មី ក្រៅពី​នយោបាយ​ការទូត</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
