<a href="/products/{{ $product->slug }}" class="product" style="background-image: url('{{ $product->image }}')">
    <div class="product-head">
        <h3 class="title is-4">{{ $product->name }}</h3>
        <p class="subtitle is-6">{{ $product->description }}</p>
    </div>
</a>
