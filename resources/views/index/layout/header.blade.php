<header>
    <div class="container clearfix">
        <div class="logo">
            <a href="{{ url('') }}" title="Kids Life"><img
                        src="{{ asset('resources/assets/kidslife/images/logo.png') }}"
                        alt="Kids Life" title="Kids Life"></a>
        </div>
        <div class="search-field fl">
            <form class="search" action="/search">

                <input type="text" name="q" class="search_box" placeholder="Search" value="">
            </form>
        </div>
    </div>
    @include('index.layout.menu')
</header>