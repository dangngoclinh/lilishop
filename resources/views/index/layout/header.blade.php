<header>
    <div class="container clearfix">
        <div class="logo">
            <a href="{{ url('') }}" title="Kids Life"><img
                        src="{{ asset('resources/assets/kidslife/images/logo.png') }}"
                        alt="Kids Life" title="Kids Life"></a>
        </div>
        <div class="header-right clearfix">
            <div class="contact-details">
                <p class="mail">
                    <a href="{{ route('page.contact') }}">{{ option('email') }}</a>
                    <span class="fa fa-envelope"></span>
                </p>
                <p class="phone-no">
                    <i>{{ option('phone') }}</i>
                    <span class="fa fa-phone"></span>
                </p>
            </div>
            <div class="cart">
                <a href="#" id="cart"><i class="fa fa-shopping-cart"></i> Cart <span class="badge">3</span></a>
            </div>
        </div>
    </div>
    @include('index.layout.menu')
</header>