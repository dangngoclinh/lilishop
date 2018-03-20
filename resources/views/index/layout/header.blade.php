<header>
    <div class="container clearfix">
        <div class="logo">
            <a href="{{ url('') }}" title="Kids Life"><img
                        src="{{ option('logo') }}"
                        alt="Kids Life" title="Kids Life"></a>
        </div>
        <div class="search-field fl">
            <form class="search" method="get" action="{{ route('search') }}">

                <input type="text" name="q" class="search_box" placeholder="@lang('Tìm sản phẩm')" value="">
            </form>
        </div>
    </div>
    @include('index.layout.primary')
</header>