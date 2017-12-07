@extends('index.master', ['body_class' => 'page-contact'])
@section('title', 'Liên hệ - ' . option('sitename'))
@section('description', 'Liên hệ mua quần áo thời trang trẻ em tại lilishop')
@section('keyword', 'liên hệ')
@section('content')
    <div class="breadcrumb-section">
        <div class="container">
            <h1>Liên Hệ</h1>
            <div class="breadcrumb">
                <a href="{{ route('page.home') }}">Lilishop</a>
                <span class="fa fa-angle-double-right"></span>
                <span class="current">Liên Hệ</span>
            </div>
        </div>
    </div>
    <!--breadcrumb-section ends-->

    <div class="container">
        <section id="primary" class="content-full-width">

            <div id="map"></div>
            <script>
                function initMap() {
                    var uluru = {lat: -25.363, lng: 131.044};
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 4,
                        center: uluru
                    });
                    var marker = new google.maps.Marker({
                        position: uluru,
                        map: map
                    });
                }
            </script>

            <div class="column dt-sc-three-fourth first contact_form_outer">
                <form name="frcontact" class="contact-form" method="post"
                      action="{{ action('Index\ContactController@store') }}">
                    @if(Session::get('status'))
                        <h3>Thư của bạn đã được gửi.</h3>
                        <p>Chúng tôi sẽ trả lời thư bạn sớm nhất có thể.</p>
                        <p>Trân Trọng</p>
                    @else
                        <h2>Liên hệ với chúng tôi!</h2>
                        {{ csrf_field() }}
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <p>Người liên hệ: <strong>{{ \Illuminate\Support\Facades\Auth::user()->name }}</strong></p>
                        @else
                            <div class="clearfix" style="margin-bottom: 10px;">
                                <p class="column dt-sc-one-third first">
                                    <input name="name" type="text" placeholder="Tên" required="">
                                </p>
                                <p class="column dt-sc-one-third">
                                    <input name="email" type="email" placeholder="Email ID" required="">
                                </p>
                                <p class="column dt-sc-one-third">
                                    <input name="phone" type="text" placeholder="Điện Thoại" required="">
                                </p>
                            </div>
                        @endif
                        <p>
                            <input name="title" type="text" placeholder="Tiêu Đề" required="">
                        </p>
                        <p>
                            <textarea name="content" placeholder="Nội Dung"></textarea>
                        </p>
                        <p>
                            {!! NoCaptcha::display() !!}
                        </p>
                        <div id="ajax_contact_msg"></div>
                        <p>
                            <input name="submit" type="submit" class="dt-sc-button medium" value="Gửi Email">
                        </p>
                    @endif
                </form>
            </div>
            <!--dt-sc-two-third ends-->

            <!--dt-sc-one-third starts-->
            <div class="column dt-sc-one-fourth class_hours">
                <h2>Giờ làm việc</h2>
                <ul class="class_hours">
                    <li>Thứ 2<span>8h sáng - 5h chiều</span></li>
                    <li>Thứ 3<span>8h sáng - 5h chiều</span></li>
                    <li>Thứ 4<span>8h sáng - 5h chiều</span></li>
                    <li>Thứ 5<span>8h sáng - 5h chiều</span></li>
                    <li>Thứ 6<span>8h sáng - 5h chiều</span></li>
                    <li>Thứ 7<span>8h sáng - 5h chiều</span></li>
                    <li>Chủ nhật<span>Nghỉ</span></li>
                </ul>
                <div class="dt-sc-hr-small"></div>
                <p><strong>Liên hệ <span class="highlighter">Lilishop</span> trên mạng xã hội</strong></p>
                <ul class="dt-sc-social-icons">
                    <li class="facebook"><a href="#" title="Facebook" class="dt-sc-tooltip-bottom"><img
                                    src="{{ asset('resources/assets/kidslife/images/facebook.png') }}" alt="" title=""></a>
                    </li>
                    <li class="twitter"><a href="#" title="Twitter" class="dt-sc-tooltip-bottom"><img
                                    src="{{ asset('resources/assets/kidslife/images/twitter.png') }}" alt=""
                                    title=""></a></li>
                    <li class="gplus"><a href="#" title="Google Plus" class="dt-sc-tooltip-bottom"><img
                                    src="{{ asset('resources/assets/kidslife/images/gplus.png') }}" alt="" title=""></a>
                    </li>
                    <li class="pinterest"><a href="#" title="Pinterest" class="dt-sc-tooltip-bottom"><img
                                    src="{{ asset('resources/assets/kidslife/images/pinterest.png') }}" alt="" title=""></a>
                    </li>
                </ul>
            </div>
            <!--dt-sc-one-third ends-->
        </section>
        <!--primary ends-->
    </div>
    <!--container ends-->
@endsection
@section('head')
    <style>
        #map {
            margin: 40px 0;
        }
    </style>
@endsection
@section('footer')
    <script>
        function initMap() {
            var uluru = {lat: 10.84083, lng: 106.595934};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDQU9rp2uUXOXIBerYBh1Ome4YdwE4JZc&callback=initMap">
    </script>
    {!! NoCaptcha::renderJs() !!}
@endsection