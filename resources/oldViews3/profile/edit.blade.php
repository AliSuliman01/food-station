<x-app-layout>

    <div class="grid grid-cols-12">
        <div class="col-span-6 text-white p-5">
            <div class="text-6xl font-bold fadeRightAnimation1S">{{$user->name}}</div>
            <div>
                <p class="font-thin my-3 fadeRightAnimation2S">{{$user->email}}</p>
            </div>
            <div class="flex items-center w-56 justify-between">
                <div><button class="text-white bg-orange-pinky rounded-lg px-5 py-2 shadow shadow-lg shadow-orange-yellow/50" wire:click="contactNow">Edit</button></div>
            </div>
        </div>
        <div class="col-span-6 fadeAnimation1S flex justify-end">
            <img src="{{$user->photo_path}}" alt="" class="w-1/2 object-cover h-[calc(100%-1rem)]">
        </div>
    </div>

</x-app-layout>
