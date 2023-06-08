<x-app-layout>

    <div class="flex justify-center">

        <div
            class="md:w-1/2 lg:w-1/3 min-h-72 border border-gray-500 rounded-lg shadow-lg p-10 text-white">
            <div class="flex items-center w-1/3 justify-between border-b border-gray-500 w-full px-3 py-5">

                <img src="{{asset('images/main-plate.png')}}" alt=""
                     class="w-20 h-20 rounded-lg shadow-lg object-cover">

                <span>{{$product->translation->name}}</span>
            </div>
            <div class="flex items-center w-1/3 justify-between border-b border-gray-500 w-full px-3 py-5">

                <img src="{{$product->restaurant->cover_image}}" alt=""
                     class="w-20 h-20 rounded-lg shadow-lg object-cover">

                <span>{{$product->restaurant->name}}</span>
            </div>
            <div class="flex items-center w-1/3 justify-between w-full px-3 py-5">
                <span>price</span>
                <span>{{$product->price}}</span>
            </div>
            <div class="flex items-center w-1/3 justify-center w-full px-3 py-5">
                <button class="border border-gray-500 rounded-lg py-2 px-4 hover:shadow-lg hover:shadow-orange-yellow/50">Checkout</button>
            </div>
        </div>
    </div>

</x-app-layout>
