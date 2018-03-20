@extends('index/master', ['body_class' => 'page-category news-index'])
@section('title', 'title')
@section('description', 'this is description')
@section('author', 'this is author')
@section('keyword', 'this is keyword')
@section('content')
    <!--breadcrumb-section starts-->
    <div class="breadcrumb-section">
        <div class="container clearfix">
            <h1>Tin Tức</h1>
            <div class="breadcrumb">
                <a href="{{ route('page.home') }}">Home</a>
                <span class="fa fa-angle-double-right"></span>
                <span class="current">Tin Tức</span>
            </div>
        </div>
    </div>
    <!--breadcrumb-section ends-->
    <!--container starts-->
        <div class="container clearfix">
            <!--primary starts-->
            <section id="primary" class="with-sidebar">
                @foreach($news_list as $key => $news)
                    @php
                        $url = url(route('news.view', ['name' => $news->slug, 'id' => $news->id]));
                        $photo = ($news->featured) ? $news->featured->file : 'http://placehold.it/90x90';
                    @endphp
                    <div class="column dt-sc-one-half first">
                        <article class="blog-entry">
                            <div class="blog-entry-inner">
                                <div class="entry-meta">
                                    <a href="{{ $url }}" class="blog-author">
                                        <img src="http://via.placeholder.com/90x90" alt="" title=""></a>
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
                                    <a href="{{ $url }}">
                                        @if($news->featured)
                                            <img src="{{ media($news->featured->file) }}"
                                                 alt="{{ $news->featured->name }}"
                                                 title="{{ $news->featured->name }}">
                                        @else
                                            <img src="http://placehold.it/1170x711" alt=""
                                                 title="">
                                        @endif
                                    </a>
                                </div>
                                <div class="entry-details">
                                    <div class="entry-title">
                                        <h3><a href="{{ $url }}"> {{ $news->name }} </a></h3>
                                    </div>
                                    <!--entry-metadata ends-->
                                    <div class="entry-body">
                                        <p>{{ $news->excerpt }}</p>
                                    </div>
                                    <a href="{{ $url }}" class="dt-sc-button small"> @lang('Xem Thêm') <span
                                                class="fa fa-chevron-circle-right"> </span></a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach

            </section>
            <!--primary ends-->

            <!--secondary starts-->
            <section id="secondary">
                @include('index.widgets.categories')

                <aside class="widget widget_text">
                    <h3 class="widgettitle">Kids Achievements</h3>
                    <p>In lobortis rhoncus pulvinar. Pellentesque habitant morbi tristique <a href="#"
                                                                                              class="highlighter">senectus</a>
                        et netus et malesuada fames ac turpis egestas. </p>
                    <p>Sed tempus ligula ac mi iaculis lobortis. Nam consectetur justo non nisi dapibus, ac commodo mi
                        sagittis. Integer enim odio.</p>
                </aside>

                <aside class="widget widget_text">
                    <h3 class="widgettitle">Visual Guidance</h3>
                    <p>Our methods of teaching and level of quality instructors all add up to a well-rounded
                        experience.</p>
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
                            <p>Sed ut perspiciatis unde omi iste natus error siterrecte voluptatem accusantium
                                doloremque
                                laudantium.</p>
                        </div>
                        <div class="dt-sc-tabs-content">
                            <h5><a href="">Admire &amp; Achieve!</a></h5>
                            <p>Sed ut perspiciatis unde omi iste natus error siterrecte voluptatem accusantium
                                doloremque
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
@section('footer')
@endsection