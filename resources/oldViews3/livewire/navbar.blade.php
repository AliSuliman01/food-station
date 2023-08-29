<nav class="flex text-white w-full h-28 justify-between items-center py-[15vh] text-sm">
    <div class="w-[10%]">
        <a href="/" class=""><img class="w-1/2 mx-auto" src="{{asset('images/logo.png')}}" alt=""></a>
    </div>
    <ul class="flex w-[40%] justify-between items-center font-bold">
        <li class="{{$activeNavPage == 'find-food' ? 'border-b-2 border-red-800' : 'hover:border-b-2 hover:border-red-800'}}">
            <button wire:click="setActiveNavPage('find-food')">Find Food</button>
        </li>
        <li class="{{$activeNavPage == 'tracking' ? 'border-b-2 border-red-800' : 'hover:border-b-2 hover:border-red-800'}}">
            <button wire:click="setActiveNavPage('tracking')">Tracking</button>
        </li>
        <li class="{{$activeNavPage == 'find-restaurant' ? 'border-b-2 border-red-800' : 'hover:border-b-2 hover:border-red-800'}}">
            <button wire:click="setActiveNavPage('find-restaurant')">Find Restaurant</button>
        </li>
        <li class="{{$activeNavPage == 'location' ? 'border-b-2 border-red-800' : 'hover:border-b-2 hover:border-red-800'}}">
            <button wire:click="setActiveNavPage('location')">Location</button>
        </li>
    </ul>
    <ul class="flex w-[15%] items-center justify-between">
        <li class="relative">
            <a href="{{route('cart')}}">
                <i class="fas fa-shopping-bag fa-lg"></i>
            <span
                class="absolute top-[-5px] right-[-8px] w-4 h-4 text-center text-xs rounded-full bg-red-500 text-white"> 2 </span>
            </a>
        </li>
        @guest()
            <li>
                <button wire:click="setActiveNavPage('login')">Sign In</button>
            </li>
            <li>
                <button class="btn bg-green-300 px-3 py-1 rounded-md shadow shadow-green-500 shadow-lg"
                        wire:click="setActiveNavPage('register')">Sign Up
                </button>
            </li>
        @else
            <li>

                <button id="dropdownDefaultButton11" data-dropdown-toggle="dropdown11"
                        class="text-white font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
                        type="button">
                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                    <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown11"
                     class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton11">
                        <li>
                            <a href="{{route('profile.edit')}}"
                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                        </li>
                        <li>
                            <a href="{{route('settings')}}"
                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <form action="{{route('logout')}}" method="post" class="w-full">
                                @csrf
                                <button type="submit"
                                        class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Sign out
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>

            </li>
        @endguest
    </ul>

</nav>
