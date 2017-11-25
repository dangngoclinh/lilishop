@extends('index.master', ['body_class' => 'page-contact'])
@section('title', 'title')
@section('description', 'this is description')
@section('author', 'this is author')
@section('keyword', 'this is keyword')
@section('footer')
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    {!! NoCaptcha::renderJs() !!}
@endsection
@section('content')
    <!--breadcrumb-section starts-->
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
    <!--container starts-->
    <div class="container">
        <!--primary starts-->
        <section id="primary" class="content-full-width">

            <div id="map"> </div>

            <div class="dt-sc-hr"> </div>

            <!--dt-sc-two-third starts-->
            <div class="column dt-sc-three-fourth first contact_form_outer">
                <form name="frcontact" class="contact-form" method="post" action="php/contactmail.php">
                    <h2>Liên hệ với chúng tôi!</h2>
                    <p class="column dt-sc-one-third first">
                        <input id="name" name="txtname" type="text" placeholder="Tên" required="">
                    </p>
                    <p class="column dt-sc-one-third">
                        <input id="email" name="txtemail" type="email" placeholder="Email ID" required="">
                    </p>
                    <p class="column dt-sc-one-third">
                        <input id="phone" name="txtphone" type="text" placeholder="Điện Thoại" required="">
                    </p>
                    <p>
                        <input id="subject" name="txtsubject" type="text" placeholder="Tiêu Đề" required="">
                    </p>
                    <p>
                        <textarea id="comment" name="txtmessage" placeholder="Nội Dung"></textarea>
                    </p>
                    <p>
                        {!! NoCaptcha::display() !!}
                    </p>
                    <div id="ajax_contact_msg"> </div>
                    <p>
                        <input name="submit" type="submit" id="submit" class="dt-sc-button medium" value="Gửi Email">
                    </p>
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
                    <li class="facebook"><a href="#" title="Facebook" class="dt-sc-tooltip-bottom"><img src="{{ asset('resources/assets/kidslife/images/facebook.png') }}" alt="" title=""></a></li>
                    <li class="twitter"><a href="#" title="Twitter" class="dt-sc-tooltip-bottom"><img src="{{ asset('resources/assets/kidslife/images/twitter.png') }}" alt="" title=""></a></li>
                    <li class="gplus"><a href="#" title="Google Plus" class="dt-sc-tooltip-bottom"><img src="{{ asset('resources/assets/kidslife/images/gplus.png') }}" alt="" title=""></a></li>
                    <li class="pinterest"><a href="#" title="Pinterest" class="dt-sc-tooltip-bottom"><img src="{{ asset('resources/assets/kidslife/images/pinterest.png') }}" alt="" title=""></a></li>
                </ul>
            </div>
            <!--dt-sc-one-third ends-->

        </section>
        <!--primary ends-->
    </div>
    <!--container ends-->
@endsection