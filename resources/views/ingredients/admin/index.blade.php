<x-admin-layout>

    <x-control-bar addingButtonTarget="{{route('admin.ingredients.create')}}" searching/>
    <div class="p-8 text-gray-900 md:grid md:grid-cols-4 gap-2">
        @foreach($ingredients as $ingredient)
            <x-ingredient-card :ingredient="$ingredient" />
        @endforeach
    </div>

</x-admin-layout>
