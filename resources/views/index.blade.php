@extends('layouts.app')

@section('meta')
<title>អាល់ហ្វាផូលីត</title>
<meta name="description" content="{{ $site_info->description }}">
<meta property="og:url" content="{{ url('/') }}" />
<meta property="og:title" content="{{ $site_info->name }}" />
<meta property="og:description" content="{{ $site_info->description }}" />
<meta property="og:image" content="{{ url('/img/alpha-icon-min.png') }}" />
<meta property="og:locale" content="km_KH" />
<meta property="fb:app_id" content="269342813510825" />
@endsection

@section('content')

<div id="slider" class="container">
    <div class="carousel-wrapper">
        <div id="owl-carousel" class="owl-carousel">
           
           @foreach($custom_fields as $custom_field)
            @if($custom_field->type == 'slide')
            <div class="item">
                <a href="{{ $custom_field->link }}"><img src="{{ url('/img/sliders/' . $custom_field->image) }}" alt="{{ $custom_field->image }}">
                    <div class="description">
                        <h1>{{ $custom_field->title }}</h1>
                        <p>{{ $custom_field->description }}</p>
                    </div>
                </a>
            </div>
            @endif
            @endforeach
            
        </div>
    </div>
</div>

<div id="alfapolit" class="site-section">
    <div class="section group container">
        <div class="img-wrapper col span_1_of_2">
            <img src="{{ url('/img/' . $site_info->image1) }}" alt="{{ $site_info->name }}">
        </div>
        <div class="col span_1_of_2">
            <div class="box">
                <h1>{{ $site_info->name }}</h1>
                <p>{{ $site_info->description }}</p>
            </div>
        </div>
    </div>
</div>

<div id="knowledge" class="site-section">
    <div class="section group container">
       @foreach($custom_fields as $custom_field)
        @if($custom_field->type == 'knowledge')
        <div class="col span_1_of_3">
            <div class="box">
                {!! html_entity_decode($custom_field->image) !!}
                <h2>{{ $custom_field->title }}</h2>
                <p>{{ $custom_field->description }}</p>
            </div>
        </div>
        @endif
        @endforeach
        
    </div>
</div>

<div id="aboutus" class="site-section">
    <div class="container box">
        <h1>អំពីយើង</h1>
        {!! html_entity_decode($site_info->about_admin) !!}
    </div>
</div>

@endsection
