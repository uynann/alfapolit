<div id="footer">
    <div class="footer-top">
        <div class="group container">
            <div class="col span_1_of_4">
                <ul>
                   @foreach($categories as $category)
                    <li><a href="{{ url('/' . $category->slug) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col span_1_of_4">
                <ul id="info-footer">
                    <li><a href="{{ url('/#aboutus') }}">អំពីយើង</a></li>
                    <li><a href="#">ទំនាក់ទំនង</a></li>
                    <p>{{ $site_info->email }}</p>
                    <p>{{ $site_info->phone }}</p>
                    <li>
                        <a href="{{ $site_info->fb_link }}" target="_blank"><i class="fa fa-facebook-official fa-lg" aria-hidden="true"></i></a>
                        <a href="{{ $site_info->tw_link }}" target="_blank"><i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i></a>
                        <a href="" target="_blank"><i class="fa fa-instagram fa-lg" aria-hidden="true"></i></a>
                        <a href="" target="_blank"><i class="fa fa-youtube-square fa-lg" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col span_1_of_4">
                <ul>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright container">
        <p>&copy; រក្សាសិទ្ធិគ្រប់យ៉ាងដោយ​ AlfaPolit.com  |  រចនា &amp; អភិវឌ្ឍដោយ <a href="https://www.facebook.com/uynann" target="_blank"><b>អ៊ុយ​ណាន់</b></a></p>
    </div>
</div>
