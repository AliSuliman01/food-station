<x-admin-layout>

    <x-control-bar addingButtonTarget="{{route('admin.products.create')}}" searching/>
    <div class="p-8 text-gray-900 md:grid md:grid-cols-4 gap-2">
        @foreach($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>

</x-admin-layout>
