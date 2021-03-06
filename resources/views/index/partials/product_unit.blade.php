@php
    $url = route('page.product', ['name' => $product->slug, 'id' => $product->id]);
    $featured = $product->featured;
    if($featured)
    {
        $photo = media($featured->medium);
    } else {
        $photo = 'http://via.placeholder.com/350x450';
    }
@endphp
<div class="product-thumb">
    <a href="{{ $url }}">
        <img src="{{ $photo }}" alt="" title="">
    </a>
    @if($product->discount_price)
        <span class="sale"> Giảm! </span>
    @endif
    <div class="image-overlay">
        <div class="product-button">
            <a href="{{ $url }}" class="add-cart-btn"> @lang('Mua ngay') </a>
        </div>
    </div>
</div>
<div class="product-details">
    <h5><a href="{{ $url }}"> {{ $product->name }} </a></h5>
    <p class="price-box">
        @if($product->discount_price)
            <span class="price">
                <del><span class="old">{{ number_format($product->price) }} đ </span></del>
                <span class="current">{{ number_format($product->discount_price) }} đ</span>
            </span>
        @else
            <span class="price"> {{ number_format($product->price) }} đ </span>
        @endif
    </p>
</div>