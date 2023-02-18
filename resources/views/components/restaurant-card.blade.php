<div class="bg-white p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="{{route('admin.restaurants.edit', ['restaurant' => $restaurant->id])}}">
        <img class="rounded object-cover h-48 w-full" src="{{$restaurant->cover_image}}" alt="">
        <div class="text-center trounded w-full mb-4 text-xl tracking-tight text-gray-900 dark:text-white" > {{$restaurant->name}} </div>
    </a>
</div>
