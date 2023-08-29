<div>
    <input wire:model="search" type="search" class="w-full rounded-lg" placeholder="Search Food And Restaurants...">

    <div class="grid grid-cols-12 gap-8 py-[15vh] text-white">
        @foreach($products as $product)
                <div
                    class="col-span-3 relative rounded-lg bg-gradient-to-b from-neutral-600 to-black w-full h-32 cursor-pointer" wire:click="productDetails({{$product->id}})">
                    <div class="absolute -top-[25px] -left-[25px] w-20 h-20">
                        <img src="{{asset('images/main-plate.png')}}" alt="">
                    </div>
                    <div class="ml-16 mt-3 mr-10">
                        <h6 class="text-sm">{{$product->translation->name}}</h6>
                        <div class="flex justify-between items-center">
                            <div class="flex">
                                <img class="w-3 h-3" src="{{asset('images/star.png')}}" alt="">
                                <img class="w-3 h-3" src="{{asset('images/star.png')}}" alt="">
                                <img class="w-3 h-3" src="{{asset('images/star.png')}}" alt="">
                                <img class="w-3 h-3" src="{{asset('images/star.png')}}" alt="">
                                <img class="w-3 h-3" src="{{asset('images/star.png')}}" alt="">
                            </div>
                            <div class="text-sm text-orange-yellow-500">
                                ${{$product->price}}
                            </div>
                        </div>
                        <div class="text-xs mt-3">
                            {{$product->restaurant->name}}
                        </div>
                    </div>
                    <div
                        class="absolute -bottom-[10px] -right-[15px] w-8 h-8 bg-orange-500 flex items-center justify-center rounded-br-full rounded-t-[170rem] rounded-bl-[170rem]">
                        <i class="fa-solid fa-cart-shopping fa-xs"></i>
                    </div>
                </div>
        @endforeach

    </div>
</div>
