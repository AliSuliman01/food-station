<x-app-layout>

    <div class="grid grid-cols-12 text-white">
        <div
            class="col-span-6 flex bg-[url('http://localhost:8000/storage/restaurants/olVinvcsw6vP36usXJ0JiOeIWLkk4YGCEeuomvh9.jpg')] bg-cover bg-center flex-col justify-between max-h-96 rounded-lg shadow-lg">
                <div class="backdrop-blur-sm bg-gray/50 w-full h-full  p-10 rounded-lg">

                <div class="grid grid-cols-6">
                    <div class="col-span-3">
                        <h1 class="text-5xl font-thin fadeAnimation1S">
                            {{$product->translation->name}}
                        </h1>
                        <div class="flex my-6 fadeAnimation1S items-center">
                            <span class="text-lg mr-2">${{$product->price}}</span>
                            <i class="fa-solid fa-star fa-xs" style="color: yellow"></i>
                            <i class="fa-solid fa-star fa-xs" style="color: yellow"></i>
                            <i class="fa-solid fa-star fa-xs" style="color: yellow"></i>
                            <i class="fa-solid fa-star fa-xs" style="color: yellow"></i>
                            <i class="fa-solid fa-star fa-xs" style="color: yellow"></i>
                        </div>
                    </div>
                    <div class="col-span-3 flex justify-end items-end">
                        <button type="button" class="flex flex-col items-center">
                            <img src="{{$product->restaurant->cover_image}}" alt=""
                                 class="w-20 h-20 rounded-lg shadow-lg object-cover">
                            <span class="font-thin text-orange-yellow">{{$product->restaurant->name}}</span>
                        </button>
                    </div>
                </div>
                <div class=" h-[50%]">
                    <form action="{{route('products.order',['product' => $product->id])}}" method="get"
                          class="w-full flex flex-col items-center justify-between h-full">
                        @csrf
                        <textarea id="message" rows="4"
                                  class="block p-2.5 text-sm w-full bg-transparent rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  name="notes"
                                  placeholder="Write your notes here..."></textarea>
                        <button type="submit" class="bg-red-800 rounded-lg py-2 px-4">
                            Order
                        </button>
                    </form>

                </div>
                </div>

        </div>
        <div class="col-span-6 fadeAnimation1S flex justify-center">
            <img src="{{asset('images/main-plate.png')}}" alt="" class="w-[75%]">
        </div>
    </div>
</x-app-layout>
