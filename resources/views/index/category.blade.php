@extends('index/master', ['body_class' => 'page-category'])
@section('title', 'title')
@section('description', 'this is description')
@section('author', 'this is author')
@section('keyword', 'this is keyword')
@section('content')
    <!--breadcrumb-section starts-->
    <div class="breadcrumb-section">
        <div class="container">
            <h1>Shop</h1>
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <span class="fa fa-angle-double-right"></span>
                <a href="{{ url('/san-pham.html') }}">Sản Phẩm</a>
                <span class="fa fa-angle-double-right"></span>
                <span class="current"></span>
            </div>
        </div>
    </div>
    <!--breadcrumb-section ends-->
    <!--container starts-->
    <div class="container">
        <!--primary starts-->
        <section id="primary" class="with-sidebar">

            <ul class="products">
                @foreach($products as $key => $product)
                    @php
                        //$url = url('san-pham/' . $product->tenkhongdau . '-' . $product->id . '.html');
                        $url = route('page.product', ['name' => $product->tenkhongdau, 'id' => $product->id]);
                        $photo  = url('public/upload/sanpham/' . $product->photo);
                        $class = '';
                        if($key% 3 == 0)
                            $class = 'first';
                    @endphp
                    <li class="dt-sc-one-third column {{ $class }}">
                        <div class="product-thumb">
                            <a href="#">
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
                            <p class="price-box"><span class="price"> {{ $product->gia }} </span></p>
                        </div>
                    </li>
                @endforeach
            </ul>
            {{  $products->links('vendor.pagination.kidslife') }}

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