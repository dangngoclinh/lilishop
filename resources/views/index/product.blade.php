@extends('index/master', ['body_class' => 'page-category sidebar-left'])
@section('title', $product->name . ' - ' . option('sitename'))
@section('description', 'this is description')
@section('author', 'this is author')
@section('keyword', 'this is keyword')
@section('content')
    <div class="container">
        <a href="">
            <img src="{{ asset('public/upload/tichdiem1.jpg') }}" alt="">
        </a>
    </div>
    @if($breadcrumbs)
        <div class="container">
            <ol class="breadcrumb">
            {!! $breadcrumbs->toString() !!}
            </ol>
        </div>
    @endif
    <div class="container content-wrapper clearfix">
        <section id="primary" class="with-sidebar">
            <div class="product-detail clearfix">
                <div class="images">
                    <a href="#">
                        <img src="{{ media($product->featured->medium) }}" alt="" title="">
                    </a>
                </div>
                <div class="summary">
                    <h2>{{ $product->name }}</h2>
                    <p class="price">
                        @if($product->price_sale)
                            <del>{{ number_format($product->price) }}</del>
                            <span>{{ number_format($product->price_sale) }} đ</span>
                        @else
                            <span>{{ number_format($product->price) }} đ</span>
                        @endif
                    </p>
                    <p>
                        {!! $product->excerpt !!}
                    </p>
                    <form class="carts" method="post" action="#">
                        <div class="box-field columns">

                            <p class="color-label">
                                <label for="size">Chọn kích cỡ: </label>
                                <span>12T</span>
                            </p>
                            @include('index.partials.product_size', ['sizes' => $product->ProductSizes])
                        </div>
                        @include('index.partials.product_color', ['colors' => $product->ProductSizes->first()->productColors])
                        <div class="box-field columns box-quantity">
                            <label for="quantity">Số lượng: </label>
                            @include('index.partials.product_quantity', ['quantity' => $product->ProductSizes->first()->productColors->first()->pivot->quantity])
                            <button type="submit" class="dt-sc-button small">Thêm vào giỏ hàng</button>
                        </div>
                        <input type="hidden" name="add-to-cart" value="1146">
                    </form>
                    <div class="loading">
                        <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>

            <div class="related clearfix">
                <h2>Có thể bạn quan tâm</h2>
                {{--<ul class="products">
                    @foreach($product_related as $key => $related)
                        @php
                        $class = 'dt-sc-one-fifth column';
                            if($key % 5 == 0)
                                $class = 'dt-sc-one-fifth column first';
                        $photo = asset('public/upload/sanpham/' . $related->photo);
                        $url = route('page.product', ['name' => $related->tenkhongdau, 'id' => $related->id])
                        @endphp
                        <li class="{{ $class }}">
                            <div class="product-thumb">
                                <a href="#">
                                    <img src="{{ $photo }}" alt="" title="">
                                </a>
                                <div class="image-overlay">
                                    <div class="product-button">
                                        <a href="#" class="add-cart-btn"> Add to cart </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details">
                                <h5><a href="{{ $url }}"> {{ $related->ten }} </a></h5>
                                <span class="price"> $20.00 </span>
                            </div>
                        </li>
                    @endforeach
                </ul>--}}
            </div>
            <!-- end .related -->

            <div class="dt-sc-tabs-container">
                <ul class="dt-sc-tabs clearfix">
                    <li><a href="#">Thông tin sản phẩm</a></li>
                    <li><a href="#">Hướng dẫn chọn size</a></li>
                </ul>
                <div class="dt-sc-tabs-content">
                    <h3>Chi tiết sản phẩm</h3>
                    {!! html_entity_decode($product->noidung) !!}
                </div>
                <div class="dt-sc-tabs-content">
                    <h3>4 Reviews for Pretty Little Girl</h3>
                </div>
            </div>
            <!--dt-sc-tabs-container ends-->
            <div class="dt-sc-tabs-container">
                <ul class="dt-sc-tabs cleafix">
                    <li><a href="#">Bình Luận </a></li>
                    <li><a href="#">Category & Tags</a></li>
                </ul>
                <div class="dt-sc-tabs-content">
                    <h2>Mô tả sản phẩm</h2>
                </div>
                <div class="dt-sc-tabs-content">
                    <h3>Category</h3>
                    <ul class="tags">
                        @foreach($product->categories as $tag)
                            <li><a href="{{ route('product.tag', ['name' => $tag->slug, 'id' => $tag->id]) }}"
                                   class="tag">{{ $tag->name }}</a></li>
                        @endforeach
                    </ul>
                    <h3>Tags</h3>
                    <ul class="tags">
                        @foreach($product->tags as $tag)
                            <li><a href="{{ route('product.tag', ['name' => $tag->slug, 'id' => $tag->id]) }}"
                                   class="tag">{{ $tag->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!--dt-sc-tabs-container ends-->

            <div class="related">
                <h2>Sản phẩm liên quan</h2>
                <ul class="products">

                    <li class="dt-sc-one-third column first">
                        <div class="product-thumb">
                            <a href="#">
                                <img src="http://placehold.it/510x716" alt="" title="">
                            </a>
                            <div class="image-overlay">
                                <div class="product-button">
                                    <a href="#" class="add-cart-btn"> Add to cart </a>
                                </div>
                            </div>
                        </div>
                        <div class="product-details">
                            <h5><a href="#"> Ellents Style Grade </a></h5>
                            <span class="price"> $20.00 </span>
                        </div>
                    </li>
                    <li class="dt-sc-one-third column">
                        <div class="product-thumb">
                            <a href="#">
                                <img src="http://placehold.it/510x716" alt="" title="">
                            </a>
                            <div class="image-overlay">
                                <div class="product-button">
                                    <a href="#" class="add-cart-btn"> Add to cart </a>
                                </div>
                            </div>
                        </div>
                        <div class="product-details">
                            <h5><a href="#"> Ellents Style Grade </a></h5>
                            <span class="price"> $20.00 </span>
                        </div>
                    </li>
                    <li class="dt-sc-one-third column">
                        <div class="product-thumb">
                            <a href="#">
                                <img src="http://placehold.it/510x716" alt="" title="">
                            </a>
                            <div class="image-overlay">
                                <div class="product-button">
                                    <a href="#" class="add-cart-btn"> Add to cart </a>
                                </div>
                            </div>
                        </div>
                        <div class="product-details">
                            <h5><a href="#"> Ellents Style Grade </a></h5>
                            <span class="price"> $20.00 </span>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- end .related -->
        </section>
        <!--primary ends-->

        <!--secondary starts-->
        <section id="secondary">

            <aside class="widget widget_categories">
                <h3 class="widgettitle">Categories</h3>
                <ul>
                    <li>
                        <a href="">Play School<span>(16)</span></a>
                    </li>
                    <li>
                        <a href="">Academic Performance<span>(3)</span></a>
                    </li>
                    <li>
                        <a href="">Co-curricular<span>(26)</span></a>
                    </li>
                    <li>
                        <a href="">Visual Education<span>(18)</span></a>
                    </li>
                    <li>
                        <a href="">Inter Competition<span>(4)</span></a>
                    </li>
                </ul>
            </aside>

            <aside class="widget widget_text">
                <h3 class="widgettitle">Kids Achievements</h3>
                <p>In lobortis rhoncus pulvinar. Pellentesque habitant morbi tristique <a href="#" class="highlighter">senectus</a>
                    et netus et malesuada fames ac turpis egestas. </p>
                <p>Sed tempus ligula ac mi iaculis lobortis. Nam consectetur justo non nisi dapibus, ac commodo mi
                    sagittis. Integer enim odio.</p>
            </aside>

            <aside class="widget widget_text">
                <h3 class="widgettitle">Visual Guidance</h3>
                <p>Our methods of teaching and level of quality instructors all add up to a well-rounded experience.</p>
                <iframe src="http://player.vimeo.com/video/21195297" width="420" height="200"></iframe>
            </aside>

            <aside class="widget widget_recent_entries">
                <h3 class="widgettitle">Kids Voices</h3>
                <!--dt-sc-tabs-container starts-->
                <div class="dt-sc-tabs-container">
                    <ul class="dt-sc-tabs">
                        <li><a href="#"> New </a></li>
                        <li><a href="#"> Popular </a></li>
                    </ul>
                    <div class="dt-sc-tabs-content">
                        <h5><a href="">Explore your Thoughts!</a></h5>
                        <p>Nam consectetur justo non nis dapibus, ac commodo mi sagittis. Integer enim odio.</p>
                        <h5><a href="">Perform for Success!</a></h5>
                        <p>Sed ut perspiciatis unde omi iste natus error siterrecte voluptatem accusantium doloremque
                            laudantium.</p>
                    </div>
                    <div class="dt-sc-tabs-content">
                        <h5><a href="">Admire &amp; Achieve!</a></h5>
                        <p>Sed ut perspiciatis unde omi iste natus error siterrecte voluptatem accusantium doloremque
                            laudantium.</p>
                        <h5><a href="">Your Opportuntiy!</a></h5>
                        <p>Nam consectetur justo non nis dapibus, ac commodo mi sagittis. Integer enim odio.</p>
                    </div>
                </div>
                <!--dt-sc-tabs-container ends-->
            </aside>

            <aside class="widget widget_tag_cloud">
                <h3 class="widgettitle">Hit on Tags</h3>
                <div class="tagcloud">
                    <a href="">Listen</a>
                    <a href="">Observe</a>
                    <a href="">Admire</a>
                    <a href="">Accomplish</a>
                    <a href="">Perform</a>
                    <a href="">Achieve</a>
                    <a href="">Target</a>
                </div>
            </aside>

        </section>
        <!--secondary ends-->

    </div>
    <!--container ends-->
@endsection
@section('header')
@endsection
@section('footer')
    <script type="text/javascript" src="{{ asset('resources/assets/kidslife/js/jquery.tabs.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/assets/kidslife/js/shortcodes.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/assets/kidslife/js/custom.js') }}"></script>
    <script type="text/javascript">
        $(function () {

        });

        function selectSize() {

        }

        function selectColor() {

        }
    </script>
@endsection