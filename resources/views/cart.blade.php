  <x-app-layout>

    <div class="grid grid-cols-12">
        <div class="col-span-6 text-white p-5">
            <div class="text-xs font-thin">EASY WAY TO ORDER YOUR FOOD</div>
            <div class="text-6xl font-bold fadeRightAnimation2S"> Restaurants Location <span class="text-red-900">anytime!</span></div>
            <div>
                <p class="font-thin my-3">Just confirm your order and enjoy your delicious fastest delivery.</p>
            </div>
            <div class="flex items-center w-56 justify-between">
                <div><button class="text-white bg-orange-pinky rounded-lg px-5 py-2 shadow shadow-lg shadow-orange-yellow/50"> Order Now</button></div>
                <div><a href="" class="text-xs font-bold text-orange-yellow border-b-2 border-orange-yellow">See Menu</a></div>
            </div>
        </div>
        <div class="col-span-6 fadeAnimation1S">
            <img src="{{asset('images/main-plate.png')}}" alt="">
        </div>
    </div>
</x-app-layout>
