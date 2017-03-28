<div id="header">
    <div class="brand container">
        <a href="{{ url('/') }}">
            <img src="{{ url('img/' . $site_info->image) }}" alt="{{ $site_info->name }}">
        </a>
    </div>
    <div class="navigation mobile-nav">
        <span class="toggle-mobile-nav"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></span>
        <ul>
            <li><a href="{{ url('/') }}"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a></li>

            @foreach($categories as $category)
            <li class="{{ count($category->subcategories) > 0 ? 'has-dropdown' : '' }}"><a href="{{ url('/' . $category->slug) }}">{{ $category->name }}
                @if(count($category->subcategories) > 0)
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                @endif
                </a>

                @if(count($category->subcategories) > 0)
                <ul>
                    @foreach($category->subcategories as $subcategory)
                    <li><a href="{{ url('/' . $category->slug . '/' . $subcategory->slug) }}">{{ $subcategory->name }}</a></li>
                    @endforeach
                </ul>
                @endif

            </li>
            @endforeach
        </ul>

        <div class="search-wrapper container">
            <div class="search">
                <form action="{{ url('/search') }}" class="search-form">
                    <input type="text" name="search" placeholder="ស្វែងរក">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
