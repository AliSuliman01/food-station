<x-app-layout>
    <div class="text-white  grid grid-cols-12 gap-2">
        <div class="col-span-6 flex justify-center items-center fadeAnimation1S">
            <div class="w-full mx-5">
                <form class="w-full max-w-lg text-white" method="post" action="{{route('login')}}">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-email">
                                Email
                            </label>
                            <input
                                class=" text-black appearance-none block w-full bg-gray-200 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-email" name="email" type="email" placeholder="test@example.com">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-password">
                                Password
                            </label>
                            <input
                                class=" text-black appearance-none block w-full bg-gray-200  border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-password" name="password" type="password" placeholder="******************">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                                class="text-white bg-orange-pinky-500 rounded-lg px-5 py-2 shadow shadow-lg shadow-orange-yellow/50 hover:bg-orange-pinky font-bold">
                            Sign In
                        </button>
                        <a class="inline-block align-baseline font-bold text-sm text-orange-yellow-500 hover:text-orange-yellow"
                           href="#">
                            Forgot Password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-span-6 fadeAnimation1S">
            <img src="{{asset('images/login.png')}}" alt="">
        </div>
    </div>

</x-app-layout>
