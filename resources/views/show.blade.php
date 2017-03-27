@extends('layouts.app')

@section('title'){{ $article->title }} - អាល់ហ្វាផូលីត@endsection

@section('description'){{ str_limit(strip_tags($article->content), 160) }}@endsection

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
