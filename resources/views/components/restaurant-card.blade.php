<div class="bg-white p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <img class="rounded object-cover h-48 w-full" src="{{$restaurant->cover_image}}" alt="">
    <div
        class="text-center trounded w-full  text-xl tracking-tight text-gray-900 dark:text-white flex justify-between items-center">
        <h5 class="max-h-8">{{$restaurant->name}}</h5>
        <a href="#"
           class="rounded text-center text-xs h-5 w-20  border border-gray-300 bg-green-100 text-gray-700 shadow-sm hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100">
            Stats</a>
    </div>
    <div
        class="text-center trounded w-full text-xl tracking-tight text-gray-900 dark:text-white flex justify-between items-center">
        <h6 class="text-sm text-gray-400 font-bold">4.7</h6>
        <button id="dropdownDefaultButton-{{$restaurant->id}}" data-dropdown-toggle="dropdown-{{$restaurant->id}}"
                class="rounded text-center text-xs h-5 w-20 inline-flex justify-center border border-gray-300 bg-white text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100"
                type="button">
            Options
            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdown-{{$restaurant->id}}"
             class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-20 dark:bg-gray-700">
            <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton-{{$restaurant->id}}">
                <li>
                    <a href="{{route('admin.restaurants.edit', ['restaurant' => $restaurant->id])}}"
                       class="block px-2 py-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                </li>
                <li>
                    <form action="{{route('admin.restaurants.destroy', ['restaurant' => $restaurant->id])}}"
                          method="post">
                        @csrf
                        @method('delete')
                        <input type="submit"
                               class="block px-2 py-1 w-full text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" value="Delete" />
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
