<div class="relative bg-white p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

    <!-- Settings Dropdown -->
    <div class="absolute right-0 top-0 hidden sm:flex sm:items-center sm:ml-6">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('admin.categories.edit',['category' => $category->id])">
                    {{ __('Edit') }}
                </x-dropdown-link>
            </x-slot>
        </x-dropdown>
    </div>
    @if(isset($category->image))
        <img class="rounded object-cover h-48 w-full" src="{{$category->image?->path}}" alt="">
    @endif
    <a href="{{route('admin.categories.dive_or_edit', ['category' => $category->id])}}">

        <div
            class="text-center trounded w-full mb-4 text-xl tracking-tight text-gray-900 dark:text-white"> {{$category->translation?->name}} </div>
    </a>
</div>
