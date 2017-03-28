<div id="admin-menu">
    <ul>
        <li class="close-menu"><i class="fa fa-backward" aria-hidden="true"></i> Close</li>
        <li><a href="{{ url('/') }}"><i class="fa fa-external-link" aria-hidden="true"></i><span>AlfaPolit</span></a></li>
        <li><a href="{{ url('/admin/articles') }}" {{ (Request::is('admin/articles') ? 'class=active' : '') }}><i class="fa fa-newspaper-o" aria-hidden="true"></i><span>Articles</span></a></li>
        <li><a href="{{ url('/admin/categories') }}" {{ (Request::is('admin/categories') ? 'class=active' : '') }}><i class="fa fa-list-alt" aria-hidden="true"></i><span>Categories</span></a></li>
        <li><a href="{{ url('/admin/subcategories') }}" {{ (Request::is('admin/subcategories') ? 'class=active' : '') }}><i class="fa fa-th-list" aria-hidden="true"></i><span>Sub Categories</span></a></li>
        <li><a href="{{ url('/admin/custom-fields') }}" {{ (Request::is('admin/custom-fields') ? 'class=active' : '') }}><i class="fa fa-sitemap" aria-hidden="true"></i><span>Custom Fields</span></a></li>
        <li><a href="{{ url('/admin/profile') }}" {{ (Request::is('admin/profile') ? 'class=active' : '') }}><i class="fa fa-user" aria-hidden="true"></i><span>Profile</span></a></li>
        <li><a href="{{ url('/admin/settings') }}" {{ (Request::is('admin/settings') ? 'class=active' : '') }}><i class="fa fa-cogs" aria-hidden="true"></i></i><span>Settings</span></a></li>
        
    </ul>
</div>
