<div class="p-6 bg-white rounded shadow">
    <a href="{{route('admin.ingredients.edit', ['ingredient' => $ingredient->id])}}">
        <img class="w-full shadow-lg h-48 object-cover" src="{{$ingredient->images[0]->path}}" alt="">
        <h3 class="text-center">{{$ingredient->translation?->name}}</h3>
    </a>
</div>
