    <div class="images">
        <a href="#">
            <img src="{{ media($product->featured->medium) }}" alt="" title="">
        </a>
    </div>
    <div class="summary">
        <h2>{{ $product->name }}</h2>
        <p class="price">
            @if($product->price_sale)
                <del>{{ number_format($product->price) }}</del>
                <span>{{ number_format($product->price_sale) }} đ</span>
            @else
                <span>{{ number_format($product->price) }} đ</span>
            @endif
        </p>
        <p>
            {!! $product->excerpt !!}
        </p>
        <form class="carts" method="post" action="#">
            <div class="box-field columns">

                <p class="color-label">
                    <label for="size">Chọn kích cỡ: </label>
                    <span>12T</span>
                </p>
                @include('index.partials.product_size', ['sizes' => $product->sizes])
            </div>
            @include('index.partials.product_color', ['colors' => $product->colors])
            <div class="box-field columns box-quantity">
                <label for="quantity">Số lượng: </label>
                @include('index.partials.product_quantity', ['quantity' => $product->unit->quantity])
                <button type="submit" class="dt-sc-button small">Thêm vào giỏ hàng</button>
            </div>
            <input type="hidden" name="add-to-cart" value="1146">
        </form>
        <div class="loading">
            <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
            <span class="sr-only">Loading...</span>
        </div>
    </div>