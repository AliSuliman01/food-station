<div class="p-6 bg-white rounded shadow">
    <a href="{{route('admin.products.edit', ['product' => $product->id])}}">
        <img class="w-full h-48 object-cover" src="{{$product->images[0]->path}}" alt="">
        <h3 class="text-center">{{$product->translation?->name}}</h3>
    </a>
</div>
