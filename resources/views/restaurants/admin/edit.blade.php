<x-admin-layout>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <div class="p-8 text-gray-900">
        <div class="border border-gray-200 border-3 rounded p-2">
            <div class=" md:grid md:grid-cols-4 gap-8">
                <div class="m-4 flex flex-col items-center justify-start col-span-1">
                    <div class="flex flex-col justify-center items-center">
                        <img src="{{$restaurant->cover_image}}" id="restaurantImage"
                             class="w-36 h-36 object-contain rounded-full" alt="">
                        <button id="OpenImgUpload" class="bg-none border-b border-1 p-1">upload</button>
                    </div>
                    <div>
                        <form action="{{route('admin.restaurants.destroy', ['restaurant' => $restaurant->id])}}"
                              method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn-danger" value="Delete"/>
                        </form>
                    </div>
                </div>

                <div class="col-span-3">
                    <form class="w-full"
                          action="{{route('admin.restaurants.update', ['restaurant' => $restaurant->id])}}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="file" name="cover_image" id="imgupload"
                               onchange="$('#restaurantImage').attr('src', window.URL.createObjectURL(this.files[0]))"
                               hidden/>
                        <div class="flex items-center py-8">
                            <div class="md:w-1/6">
                                <label class="block text-gray-500 font-bold  mb-1 md:mb-0"
                                       for="inline-full-price">
                                    User
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <select
                                    class="bg-gray-200 border-2 appearance-none border-gray-200 rounded w-full text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-full-name" type="text" name="user_id">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}"
                                                @if($user->id == $restaurant->user_id) selected @endif>{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex items-center py-8">
                            <div class="md:w-1/6">
                                <label class="block text-gray-500 font-bold  mb-1 md:mb-0"
                                       for="inline-full-name">
                                    Name
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input
                                    class="bg-gray-200 border-2 appearance-none border-gray-200 rounded w-full text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-full-name" type="text" name="name" value="{{$restaurant->name}}">
                            </div>
                        </div>
                        <div class="flex items-center py-8">
                            <div class="md:w-1/6">
                                <label class="block text-gray-500 font-bold  mb-1 md:mb-0"
                                       for="inline-full-name">
                                    Location
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <div class="flex justify-between items-center">
                                    <button data-modal-target="defaultModal"
                                            data-modal-toggle="defaultModal"
                                            class="btn-primary"
                                            type="button">
                                        Open the map
                                    </button>
                                    <input type="text" readonly class="bg-gray-100 border-0 h-8 w-36" name="latitude"
                                           id="latitude" value="{{$restaurant->latitude}}">
                                    <input type="text" readonly class="bg-gray-100 border-0 h-8 w-36" name="longitude"
                                           id="longitude" value="{{$restaurant->longitude}}">
                                </div>
                                <div id="defaultModal" tabindex="-1" aria-hidden="true"
                                     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                    <div class="relative w-full h-full max-w-2xl md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Terms of Service
                                                </h3>
                                                <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="defaultModal">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">
                                                <x-map initLat="{{$restaurant->latitude}}"
                                                       initLong="{{$restaurant->longitude}}"/>
                                            </div>
                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button data-modal-hide="defaultModal" onclick="setLocation()"
                                                        type="button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Set
                                                </button>
                                                <button onclick="resetMarker()" type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Reset
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center py-8">
                            <div class="md:w-1/6">
                                <label class="block text-gray-500 font-bold  mb-1 md:mb-0 pr-4"
                                       for="inline-password">
                                    Full Address
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <textarea
                                    class="h-36 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    name="full_address">{{$restaurant->full_address}}</textarea>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>

    <script>
        $('#OpenImgUpload').click(function (e) {
            $('#imgupload').trigger('click');
            return false;
        });

        function setLocation() {
            console.log(window.marker.getLngLat())
            let lnglat = window.marker.getLngLat();
            $("#latitude").val(lnglat.lat);
            $("#longitude").val(lnglat.lng);
        }
    </script>
</x-admin-layout>
