@extends('index/master', ['body_class' => 'main'])
@section('title', option('title'))
@section('description', option('description'))
@section('author', 'this is author')
@section('keyword', option('keyword'))
@section('footer')
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
    <script type="text/javascript"
            src="{{ asset('resources/assets/kidslife/js/twitter/jquery.tweet.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('vendor/bower_dl/jquery-parallax/scripts/jquery.parallax-1.1.3.js') }}"></script>
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
    <!--primary starts-->
    <section id="primary" class="content-full-width">
        <div class="container clearfix">
            <a href="">
                <img src="{{ asset('public/upload/tichdiem1.jpg') }}" alt="">
            </a>
        </div>
        <div class="dt-sc-hr"></div>
        <!--container starts-->
        <div class="container clearfix">
            <h2 class="dt-sc-hr-green-title">Sản Phẩm Mới</h2>
            <ul class="products">
                @foreach($products_new as $key => $product)
                    @php
                        //$url = url('san-pham/' . $product->tenkhongdau . '-' . $product->id . '.html');
                        $url = route('page.product', ['name' => $product->tenkhongdau, 'id' => $product->id]);
                        $photo  = url('public/upload/sanpham/' . $product->photo);
                        $class = '';
                        if($key% 4 == 0)
                            $class = 'first';
                    @endphp
                    <li class="dt-sc-one-fourth column {{ $class }}">
                        <div class="product-thumb">
                            <a href="{{ $url }}">
                                <img src="{{ $photo }}" alt="" title="">
                            </a>
                            <span class="sale"> Sale! </span>
                            <div class="image-overlay">
                                <div class="product-button">
                                    <a href="{{ $url }}" class="add-cart-btn"> Mua Ngay </a>
                                </div>
                            </div>
                        </div>
                        <div class="product-details">
                            <h5><a href="{{ $url }}"> {{ $product->ten }} </a></h5>
                            <p class="price-box"><span class="price"> {{ number_format($product->gia) }} đ </span></p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="dt-sc-hr"></div>
        <!--container starts-->
        <div class="container clearfix">
            <h2 class="dt-sc-hr-green-title">Bạn Muốn Mua Gì?</h2>

            <div class="column dt-sc-one-fourth first">
                <div class="dt-sc-team">
                    <div class="image">
                        <img class="item-mask" src="{{ asset('resources/assets/kidslife/images/mask.png') }}" alt=""
                             title="">
                        <img src="{{ asset('public/upload/boy.jpg') }}" alt="" title="">
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
                        <img src="{{ asset('public/upload/girl.jpg') }}" alt="" title="">
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
                        <img src="{{ asset('public/upload/toys.jpg') }}" alt="" title="">
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
                        <img src="{{ asset('public/upload/business-strategy.jpg') }}" alt="" title="">
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


        <div class="dt-sc-hr"></div>

        <!--container starts-->
        <div class="container clearfix">
            <h2 class="dt-sc-hr-green-title">Tin tức thời trang trẻ em</h2>
            <div class="column dt-sc-one-half first">
                <article class="blog-entry">
                    <div class="blog-entry-inner">
                        <div class="entry-meta">
                            <a href="blog-detail.html" class="blog-author"><img src="http://placehold.it/90x90"
                                                                                alt=""
                                                                                title=""></a>
                            <div class="date">
                                <span> 27 </span>
                                <p> Aug <br> 2014 </p>
                            </div>
                            <a href="#" class="comments">
                                12 <span class="fa fa-comment"> </span>
                            </a>
                            <a href="#" class="entry_format"><span class="fa fa-picture-o"></span></a>
                        </div>
                        <div class="entry-thumb">
                            <a href="blog-detail.html"><img src="http://placehold.it/1170x711" alt="" title=""></a>
                        </div>
                        <div class="entry-details">
                            <div class="entry-title">
                                <h3><a href="blog-detail.html"> Activities Improves Mind </a></h3>
                            </div>
                            <!--entry-metadata ends-->
                            <div class="entry-body">
                                <p>Roin bibendum nibhsds. Nuncsdsd fermdada msit ametadasd consequat. Praes porr
                                    nulla
                                    sit amet dui lobortis, id venenatis nibh accums.</p>
                            </div>
                            <a href="blog-detail.html" class="dt-sc-button small"> Read More <span
                                        class="fa fa-chevron-circle-right"> </span></a>
                        </div>
                    </div>
                </article>
            </div>
            <!--dt-sc-one-half ends-->
            <div class="column dt-sc-one-half">
                <article class="blog-entry">
                    <div class="blog-entry-inner">
                        <div class="entry-meta">
                            <a href="blog-detail.html" class="blog-author"><img src="http://placehold.it/90x90"
                                                                                alt=""
                                                                                title=""></a>
                            <div class="date">
                                <span> 27 </span>
                                <p> Aug <br> 2014 </p>
                            </div>
                            <a href="#" class="comments">
                                12 <span class="fa fa-comment"> </span>
                            </a>
                            <a href="#" class="entry_format"><span class="fa fa-picture-o"></span></a>
                        </div>
                        <div class="entry-thumb">
                            <a href="blog-detail.html"><img src="http://placehold.it/1170x711" alt="" title=""></a>
                        </div>
                        <div class="entry-details">
                            <div class="entry-title">
                                <h3><a href="blog-detail.html"> Weekly Reader Zone </a></h3>
                            </div>
                            <!--entry-metadata ends-->
                            <div class="entry-body">
                                <p>Iid venenatis nibh accums. Doinbibe ndum nibhsds. Nuncsdsd fermdada msit
                                    ametadasd
                                    consequat. Praes porr nulla sit amet dui lobortis, id venenatis nibh
                                    accumsan...</p>
                            </div>
                            <a href="blog-detail.html" class="dt-sc-button small"> Read More <span
                                        class="fa fa-chevron-circle-right"> </span></a>
                        </div>
                    </div>
                </article>
            </div>
            <!--dt-sc-one-half ends-->
        </div>
        <!--container ends-->

        <div class="dt-sc-hr"></div>

    </section>
    <!--primary ends-->
@endsection