   <x-app-layout>

    <div class="grid grid-cols-12 text-white">
        <div class="col-span-6">
            <h1 class="text-5xl font-thin fadeAnimation1S">
                Each Order Pass Four Stages
            </h1>

            <ul class="p-5 text-2xl font-thin h-64 flex flex-col justify-between">
                <li class="text-blue-300 fadeRightAnimation2S"> Requesting</li>
                <li class="text-blue-500 fadeRightAnimation3S"> Cooking</li>
                <li class="text-orange-400 fadeRightAnimation4S"> Delivering</li>
                <li class="text-green-500 text-4xl fadeRightAnimation5S">
                    Delivered
                    <i class="fa-regular fa-circle-check fadeAnimation6S"></i>
                </li>
            </ul>
        </div>
        <div class="col-span-6 fadeAnimation1S">
            <img src="{{asset('images/tracking.png')}}" alt="">
        </div>
    </div>
</x-app-layout>
