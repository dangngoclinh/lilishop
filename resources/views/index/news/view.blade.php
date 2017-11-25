@extends('index/master', ['body_class' => 'page-category'])
@section('title', 'title')
@section('description', 'this is description')
@section('author', 'this is author')
@section('keyword', 'this is keyword')
@section('content')
    <!--breadcrumb-section starts-->
    <div class="breadcrumb-section">
        <div class="container">
            <h1>{{ $news->name }}</h1>
            <div class="breadcrumb">
                <a href="{{ route('page.home') }}">Lilishop</a>
                <span class="fa fa-angle-double-right"></span>
                <a href="{{ route('index.news') }}">Tin Tức</a>
                <span class="fa fa-angle-double-right"></span>
                <span class="current">{{ $news->name }}</span>
            </div>
        </div>
    </div>
    <!--breadcrumb-section ends-->
    <!--container starts-->
    <div class="container">
        <!--primary starts-->
        <section id="primary" class="with-sidebar">

            <article class="blog-entry">
                <div class="blog-entry-inner">
                    <div class="entry-meta">
                        <a href="#" class="blog-author">
                            <img src="http://placehold.it/90x90" alt="" title="">
                        </a>
                        <div class="date">
                            {!! $news->created_at->format('<\s\p\a\n> d </\s\p\a\n><\p> M <\b\r\> Y </\p>') !!}
                        </div>
                        <a href="#" class="comments">
                            12 <span class="fa fa-comment"> </span>
                        </a>
                        <a href="#" class="entry_format"><span class="fa fa-picture-o"></span></a>
                    </div>
                    <div class="entry-thumb">
                        <a href="#">
                            @if($news->media)
                                <img src="{{ media($news->media->file) }}" alt="{{ $news->media->name }}"
                                     title="{{ $news->media->name }}">
                            @else
                                <img src="http://placehold.it/1170x711" alt=""
                                     title="">
                            @endif
                        </a>
                    </div>
                    <div class="entry-details">
                        <div class="entry-title">
                            <h3>{{ $news->name }}</h3>
                        </div>
                        <!--entry-metadata ends-->
                        <div class="entry-body">
                            {!! html_entity_decode($news->content) !!}
                        </div>
                    </div>
                </div>
            </article>
            <!--commententries starts-->
            <div class="commententries">
                <h2 class="dt-sc-title"><span>Bình Luận</span></h2>
                <ul class="commentlist">
                    <li>
                        <article class="comment">
                            <header class="comment-author">
                                <img class="item-mask" src="images/author-hexa-bg.png" alt="" title="">
                                <img src="http://placehold.it/119x101" alt="" title="">
                            </header>
                            <section class="comment-details">
                                <div class="author-name">
                                    <a href="">Jeniffer Conolley</a>
                                </div>
                                <div class="commentmetadata">21 Nov 2012</div>
                                <div class="comment-body">
                                    <div class="comment-content">
                                        <p>To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure.</p>
                                    </div>
                                </div>
                                <div class="reply">
                                    <a class="comment-reply-link" href="">Reply <span class="fa fa-angle-double-right"></span></a>
                                </div>
                            </section>
                        </article>
                        <ul class="children">
                            <li>
                                <article class="comment">
                                    <header class="comment-author">
                                        <img class="item-mask" src="images/author-hexa-bg.png" alt="" title="">
                                        <img src="http://placehold.it/119x101" alt="" title="">
                                    </header>
                                    <section class="comment-details">
                                        <div class="author-name">
                                            <a href="">Lilly Dafoe</a>
                                        </div>
                                        <div class="commentmetadata">21 Nov 2012</div>
                                        <div class="comment-body">
                                            <div class="comment-content">
                                                <p>To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure.</p>
                                            </div>
                                        </div>
                                        <div class="reply">
                                            <a class="comment-reply-link" href="">Reply <span class="fa fa-angle-double-right"></span></a>
                                        </div>
                                    </section>
                                </article>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <article class="comment">
                            <header class="comment-author">
                                <img class="item-mask" src="images/author-hexa-bg.png" alt="" title="">
                                <img src="http://placehold.it/119x101" alt="" title="">
                            </header>
                            <section class="comment-details">
                                <div class="author-name">
                                    <a href="">Michael Richards</a>
                                </div>
                                <div class="commentmetadata">21 Nov 2012</div>
                                <div class="comment-body">
                                    <div class="comment-content">
                                        <p>To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure.</p>
                                    </div>
                                </div>
                                <div class="reply">
                                    <a class="comment-reply-link" href="">Reply <span class="fa fa-angle-double-right"></span></a>
                                </div>
                            </section>
                        </article>
                    </li>
                </ul>
                <div id="respond" class="comment-respond">
                    <h2>Enroll Your Words</h2>
                    <form method="post" action="#" id="commentform" class="comment-form">
                        <p class="column dt-sc-one-half first">
                            <input id="author" name="author" type="text" placeholder="Name" required="">
                        </p>
                        <p class="column dt-sc-one-half">
                            <input id="email" name="email" type="email" placeholder="Email ID" required="">
                        </p>
                        <p>
                            <textarea id="comment" name="comment" placeholder="Message"></textarea>
                        </p>
                        <p>
                            <input name="submit" type="submit" id="submit" value="Add Comment">
                        </p>
                    </form>
                </div>

            </div>
            <!--commententries ends-->
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
                <p>In lobortis rhoncus pulvinar. Pellentesque habitant morbi tristique <a href="#" class="highlighter">senectus</a> et netus et malesuada fames ac turpis egestas. </p>
                <p>Sed tempus ligula ac mi iaculis lobortis. Nam consectetur justo non nisi dapibus, ac commodo mi sagittis. Integer enim odio.</p>
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
                        <p>Sed ut perspiciatis unde omi iste natus error siterrecte voluptatem accusantium doloremque laudantium.</p>
                    </div>
                    <div class="dt-sc-tabs-content">
                        <h5><a href="">Admire &amp; Achieve!</a></h5>
                        <p>Sed ut perspiciatis unde omi iste natus error siterrecte voluptatem accusantium doloremque laudantium.</p>
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