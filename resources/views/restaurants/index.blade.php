<x-app-layout>
{{--    <x-slot name="header">--}}
{{--        <div class="flex justify-end">--}}

{{--            <!-- Modal toggle -->--}}
{{--            <a href="{{route('products.create')}}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">--}}
{{--                {{ __('Add new Product') }}--}}
{{--            </a>--}}
{{--        </div>--}}

{{--    </x-slot>--}}
    <div class="py-12">
        <div class="w-full sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8  text-gray-900 ">

                    <x-map />

                    <ul class="flex pt-12">
                        <li class="flex-1 mr-2">
                            <a class="text-center block border border-blue-500 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white" href="#">Food</a>
                        </li>
                        <li class="flex-1 mr-2">
                            <a class="text-center block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-2 px-4" href="#">Restaurants</a>
                        </li>
                        <li class="text-center flex-1">
                            <a class="block py-2 px-4 text-gray-400 cursor-not-allowed" href="#">Chefs</a>
                        </li>
                    </ul>

                    <div class="pt-12">
                    @foreach($restaurants as $restaurant)
                        <x-restaurant-card :restaurant="$restaurant" />
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
