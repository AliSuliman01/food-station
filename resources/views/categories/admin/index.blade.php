<x-admin-layout>

    <x-control-bar addingButtonTarget="{{route('admin.categories.create')}}" searching />
    <div class="p-8 text-gray-900 md:grid md:grid-cols-4 gap-2">
        @foreach($categories as $category)
            <x-category-card :category="$category" />
        @endforeach
    </div>

</x-admin-layout>
