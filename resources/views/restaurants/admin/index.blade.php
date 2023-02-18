<x-admin-layout>

    <x-control-bar addingButtonTarget="{{route('admin.restaurants.create')}}" searching />
    <div class="p-8 text-gray-900 md:grid md:grid-cols-4 gap-2">
        @foreach($restaurants as $restaurant)
            <x-restaurant-card :restaurant="$restaurant" />
        @endforeach
    </div>

</x-admin-layout>
