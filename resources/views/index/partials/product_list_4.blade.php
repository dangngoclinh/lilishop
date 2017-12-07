<ul class="products">
    @foreach($products as $key => $product)
        @php
            $class = '';
            if($key% 4 == 0)
                $class = 'first';
        @endphp
        <li class="dt-sc-one-fourth column {{ $class }}">
            @include('index.partials.product_unit', ['product' => $product])
        </li>
    @endforeach
</ul>