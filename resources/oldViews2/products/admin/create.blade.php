<x-admin-layout>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <div class="p-8 text-gray-900">
        <div class="border border-gray-200 border-3 rounded p-2">
            <form class="w-full" action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class=" md:grid md:grid-cols-4 gap-8">
                    <div class="m-4 flex items-start justify-center col-span-1">
                        <div class="flex flex-col justify-center items-center">
                            <img src="/storage/ingredients/default.svg" id="restaurantImage" class="w-36 h-36 object-contain rounded-full" alt="">
                            <input type="file" name="image" id="imgupload" onchange="$('#restaurantImage').attr('src', window.URL.createObjectURL(this.files[0]))" hidden/>
                            <button id="OpenImgUpload" class="bg-none border-b border-1 p-1">upload</button>
                        </div>
                    </div>
                    <div class="col-span-3">
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
                                    id="inline-full-name" type="text" name="name" value="">
                            </div>
                        </div>
                        <div class="flex items-center py-8">
                            <div class="md:w-1/6">
                                <label class="block text-gray-500 font-bold  mb-1 md:mb-0"
                                       for="inline-full-name">
                                    Price
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input
                                    class="bg-gray-200 border-2 appearance-none border-gray-200 rounded w-full text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-full-name" type="text" name="price" value="">
                            </div>
                        </div>

                        <div class="flex items-center py-8">
                            <div class="md:w-1/6">
                                <label class="block text-gray-500 font-bold  mb-1 md:mb-0 pr-4"
                                       for="inline-password">
                                    Description
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <textarea class="h-36 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $('#OpenImgUpload').click(function(e){
            $('#imgupload').trigger('click');
            return false;
        });
        function setLocation(){
            console.log(window.marker.getLngLat())
            let lnglat = window.marker.getLngLat();
            $("#latitude").val(parseFloat(lnglat.lat).toFixed(8));
            $("#longitude").val(parseFloat(lnglat.lng).toFixed(8));
        }
    </script>
</x-admin-layout>
