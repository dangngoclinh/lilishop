<ul class="products">
    @foreach($products as $key => $product)
        @php
            $featured = $product->featured;
            if($featured)
            {
                $photo = media($featured->medium);
            } else {
            $photo = 'http://via.placeholder.com/350x450';
            }
            $url = route('page.product', ['name' => $product->slug, 'id' => $product->id]);
            $class = '';
            if($key% 4 == 0)
                $class = 'first';
        //dd($product->featured);
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
                <h5><a href="{{ $url }}"> {{ $product->name }} </a></h5>
                <p class="price-box"><span class="price"> {{ number_format($product->price) }} đ </span></p>
            </div>
        </li>
    @endforeach
</ul>