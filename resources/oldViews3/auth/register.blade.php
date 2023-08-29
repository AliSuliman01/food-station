<x-app-layout>
    <div class="text-white  grid grid-cols-12 gap-2">
        <div class="col-span-6 flex justify-center items-center fadeAnimation1S">
            <div class="w-full mx-5">
                <form class="w-full max-w-lg text-white">
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/2 px-3 mb-2 md:mb-0">
                            <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-first-name">
                                First Name
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-first-name" type="text" placeholder="Jane">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-email">
                                Email
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-email" type="email" placeholder="test@example.com">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-password">
                                Password
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200  border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-password" type="password" placeholder="******************">
                            <p class="text-orange-yellow text-xs italic">Make it as long and as crazy as you'd like</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-password">
                                Confirm Password
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200  border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-password" type="password" placeholder="******************">
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit"
                                class="text-white bg-orange-pinky-500 rounded-lg px-5 py-2 shadow shadow-lg shadow-orange-yellow/50 hover:bg-orange-pinky font-bold">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-span-6 fadeAnimation1S">
            <img src="{{asset('images/login.png')}}" alt="">
        </div>
    </div>
</x-app-layout>
