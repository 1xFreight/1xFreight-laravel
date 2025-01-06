<section>
    @foreach($products->data as $product)
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->description }}</p>

        @foreach($prices->data as $price)
            @if($price->product == $product->id)
                <p>Price: {{ $price->unit_amount / 100 }} {{ strtoupper($price->currency) }}</p>
            @endif
        @endforeach
    @endforeach
</section>
