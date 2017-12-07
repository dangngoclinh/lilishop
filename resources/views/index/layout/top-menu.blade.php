<div id="TopMenu">
    <div class="container clearfix">
        <div class="contact-details">
            <div class="dt-sc-one-half column first">
                <p class="phone-no ">
                    <i>{{ option('phone') }}</i>
                    <span class="fa fa-phone"></span>
                </p>

                <p class="mail">
                    <a href="{{ route('contact') }}" title="@lang('Liên hệ')">{{ option('email') }}</a>
                    <span class="fa fa-envelope"></span>
                </p>
            </div>
            <div class="dt-sc-one-half column">
                <div class="float-right">
                    <div class="toolbar-customer">
                        <a href="/account/login" id="customer_login_link">@lang('Đăng nhập')</a>

                        <span class="or">or</span>
                        <a href="/account/register" id="customer_register_link">@lang('Đăng ký')</a>
                    </div>
                    <div class="cartcount"><a href="/cart">@lang('Giỏ hàng:(:number)', ['number' => 1])</a></div>
                </div>
            </div>
        </div>
    </div>
</div>