<!--footer starts-->
<footer>
    <!--footer-widgets-wrapper starts-->
    <div class="footer-widgets-wrapper">
        <!--container starts-->
        <div class="container">

            <div class="column dt-sc-one-fourth first">
                <aside class="widget widget_text">
                    <h3 class="widgettitle red_sketch"> Giới thiệu Lilishop </h3>
                    {!! html_entity_decode(option('about')) !!}
                </aside>
            </div>
            <div class="column dt-sc-one-fourth">
                <aside class="widget widget_recent_entries">
                    <h3 class="widgettitle green_sketch">Về Lilishop</h3>
                    {!! html_entity_decode(option('widget_1')) !!}
                </aside>
            </div>
            <div class="column dt-sc-one-fourth">
                <aside class="widget tweetbox">
                    <h3 class="widgettitle yellow_sketch"><a href="#">Hợp tác và liên kết</a></h3>
                    {!! html_entity_decode(option('widget_2')) !!}
                </aside>
            </div>
            <div class="column dt-sc-one-fourth">
                <aside class="widget widget_text">
                    <h3 class="widgettitle steelblue_sketch">Liên Hệ</h3>
                    <div class="textwidget">
                        <p class="dt-sc-contact-info"><span class="fa fa-map-marker"></span> {{ option('address') }} </p>
                        <p class="dt-sc-contact-info"><span class="fa fa-phone"></span> {{ option('phone') }} </p>
                        <p class="dt-sc-contact-info"><span class="fa fa-envelope"></span><a
                                    href="{{ route('contact') }}"> {{ option('email') }} </a></p>
                    </div>
                </aside>
                <aside class="widget mailchimp">
                    <p> We're social </p>
                    <form name="frmnewsletter" class="mailchimp-form" action="php/subscribe.php" method="post">
                        <p>
                            <span class="fa fa-envelope-o"> </span>
                            <input type="email" placeholder="Email Address" name="mc_email" required/>
                        </p>
                        <input type="submit" value="Subscribe" class="button" name="btnsubscribe">
                    </form>
                </aside>
            </div>

        </div>
        <!--container ends-->
    </div>
    <!--footer-widgets-wrapper ends-->
    <div class="copyright">
        <div class="container">
            <p class="copyright-info">{!! html_entity_decode(option('copyright')) !!}</p>
            <div class="footer-links">
                <p>Theo dõi chúng tôi</p>
                <ul class="dt-sc-social-icons">
                    <li class="facebook"><a href="{{ option('facebook') }}"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="twitter"><a href="{{ option('twitter') }}"><img
                                    src="{{ asset('resources/assets/kidslife/images/twitter.png') }}" alt=""
                                    title=""></a></li>
                    <li class="gplus"><a href="{{ option('google') }}"><img
                                    src="{{ asset('resources/assets/kidslife/images/gplus.png') }}" alt=""
                                    title=""></a></li>
                    <li class="pinterest"><a href="{{ option('pinterest') }}"><img
                                    src="{{ asset('resources/assets/kidslife/images/pinterest.png') }}"
                                    alt="" title=""></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--footer ends-->