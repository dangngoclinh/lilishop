<div class="related clearfix">
    <h2>Có thể bạn quan tâm</h2>
    {{--<ul class="products">
        @foreach($product_related as $key => $related)
            @php
            $class = 'dt-sc-one-fifth column';
                if($key % 5 == 0)
                    $class = 'dt-sc-one-fifth column first';
            $photo = asset('public/upload/sanpham/' . $related->photo);
            $url = route('page.product', ['name' => $related->tenkhongdau, 'id' => $related->id])
            @endphp
            <li class="{{ $class }}">
                <div class="product-thumb">
                    <a href="#">
                        <img src="{{ $photo }}" alt="" title="">
                    </a>
                    <div class="image-overlay">
                        <div class="product-button">
                            <a href="#" class="add-cart-btn"> Add to cart </a>
                        </div>
                    </div>
                </div>
                <div class="product-details">
                    <h5><a href="{{ $url }}"> {{ $related->ten }} </a></h5>
                    <span class="price"> $20.00 </span>
                </div>
            </li>
        @endforeach
    </ul>--}}
</div>
<!-- end .related -->