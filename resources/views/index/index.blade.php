@extends('index/master', ['body_class' => 'main'])
@section('title', option('title'))
@section('description', option('description'))
@section('keyword', option('keyword'))
@section('footer')
    <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "WebSite",
          "url": "https://www.example.com/",
          "potentialAction": {
            "@type": "SearchAction",
            "target": "https://query.example.com/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
          }
        }
    </script>
    <script type="text/javascript"
            src="{{ asset('vendor/bower_dl/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bower_dl/jquery.easing/js/jquery.easing.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bower_dl/jquery-sticky/jquery.sticky.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('vendor/bower_dl/jquery.nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/assets/kidslife/js/validation.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/assets/kidslife/js/jquery.tipTip.minified.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/assets/kidslife/js/jquery.bxslider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/assets/kidslife/js/jquery.prettyPhoto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/assets/kidslife/js/shortcodes.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/custom.js') }}"></script>

    <!-- Layer Slider -->
    <script type="text/javascript"
            src="{{ asset('resources/assets/kidslife/js/jquery-transit-modified.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('resources/assets/kidslife/js/layerslider.kreaturamedia.jquery.js') }}"></script>
    <script type='text/javascript' src="{{ asset('resources/assets/kidslife/js/greensock.js') }}"></script>
    <script type='text/javascript'
            src="{{ asset('resources/assets/kidslife/js/layerslider.transitions.js') }}"></script>
    <!--<script type="text/javascript">var lsjQuery = jQuery;</script>-->
    <script type="text/javascript">var lsjQuery = jQuery;</script>
    <script type="text/javascript"> lsjQuery(document).ready(function () {
            if (typeof lsjQuery.fn.layerSlider == "undefined") {
                lsShowNotice('layerslider_1', 'jquery');
            } else {
                lsjQuery("#layerslider_4").layerSlider({
                    responsiveUnder: 1240,
                    layersContainer: 1060,
                    skinsPath: 'js/layerslider/skins/'
                })
            }
        }); </script>
@endsection
@section('content')
    <section id="primary" class="content-full-width clearfix">
        <div class="container banner-large clearfix">
            <a href="#"><img src="{{ asset('public/upload/tichdiem1.jpg') }}" alt=""></a>
        </div>

        <div class="container margin-top-40 clearfix">
            <h2 class="dt-sc-hr-green-title">Sản Phẩm Mới</h2>
            @include('index.partials.product_list_4', ['products' => $products_new])
        </div>

        <div class="container margin-top-40 clearfix">
            <h2 class="dt-sc-hr-green-title">Bạn Muốn Mua Gì?</h2>

            <div class="column dt-sc-one-fourth first">
                <div class="dt-sc-team">
                    <div class="image">
                        <img class="item-mask" src="{{ asset('resources/assets/kidslife/images/mask.png') }}" alt=""
                             title="">
                        <img src="{{ media('boy.jpg') }}" alt="" title="">
                        <div class="dt-sc-image-overlay">
                            <a href="#" class="link"><span class="fa fa-link"></span></a>
                        </div>
                    </div>
                    <div class="team-details">
                        <h4> Thời trang bé trai </h4>
                        <p> Những sản phẩm dành cho bé trai từ 1 - 15 Tuổi. </p>
                    </div>
                </div>
            </div>
            <div class="column dt-sc-one-fourth">
                <div class="dt-sc-team">
                    <div class="image">
                        <img class="item-mask" src="{{ asset('resources/assets/kidslife/images/mask.png') }}" alt=""
                             title="">
                        <img src="{{ media('girl.jpg') }}" alt="" title="">
                        <div class="dt-sc-image-overlay">
                            <a href="#" class="link"><span class="fa fa-link"></span></a>
                        </div>
                    </div>
                    <div class="team-details">
                        <h4> Thời Trang Bé Gái </h4>
                        <p> Chuyên cung cấp đầm bé gái, đồ bộ, áo khoác ... </p>
                    </div>
                </div>
            </div>
            <div class="column dt-sc-one-fourth">
                <div class="dt-sc-team">
                    <div class="image">
                        <img class="item-mask" src="{{ asset('resources/assets/kidslife/images/mask.png') }}" alt=""
                             title="">
                        <img src="{{ media('toys.jpeg') }}" alt="" title="">
                        <div class="dt-sc-image-overlay">
                            <a href="#" class="link"><span class="fa fa-link"></span></a>
                        </div>
                    </div>
                    <div class="team-details">
                        <h4> Đồ chơi trẻ em </h4>
                        <p> Đồ chơi trẻ em bao gồm xe điều khiển, máy bay điều khiển. </p>
                    </div>
                </div>
            </div>
            <div class="column dt-sc-one-fourth">
                <div class="dt-sc-team">
                    <div class="image">
                        <img class="item-mask" src="{{ asset('resources/assets/kidslife/images/mask.png') }}" alt=""
                             title="">
                        <img src="{{ media('business.jpg') }}" alt="" title="">
                        <div class="dt-sc-image-overlay">
                            <a href="#" class="link"><span class="fa fa-link"></span></a>
                        </div>
                    </div>
                    <div class="team-details">
                        <h4> Hợp Tác Kinh Doanh </h4>
                        <p> Bạn muốn trở thành đại lý, nhà phân phối cho Lilishop?. </p>
                    </div>
                </div>
            </div>

        </div>
        <!--container ends-->

        <div class="container clearfix">
            <h2 class="dt-sc-hr-green-title">Tin tức thời trang trẻ em</h2>
            <div class="column dt-sc-one-half first">
                @include('index.partials.blog-entry')
            </div>
            <!--dt-sc-one-half ends-->
            <div class="column dt-sc-one-half">
                @include('index.partials.blog-entry')
            </div>
            <!--dt-sc-one-half ends-->
        </div>
        <!--container ends-->

    </section>
    <!--primary ends-->
@endsection