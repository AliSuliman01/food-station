<x-admin-layout>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <div class="p-8 text-gray-900">
        <div class="border border-gray-200 border-3 rounded p-2">
                <div class=" md:grid md:grid-cols-4 gap-8">
                    <div class="m-4 flex flex-col items-center justify-start col-span-1">
                        <div class="flex flex-col justify-center items-center">
                            <img src="{{$category->image?->path}}" id="categoryImage" class="w-36 h-36 object-contain rounded-full" alt="">
                            <button id="OpenImgUpload" class="bg-none border-b border-1 p-1">upload</button>
                        </div>
                        <div>
                            <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}"
                                  method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn-danger"  value="Delete"/>
                            </form>
                        </div>
                    </div>

                    <div class="col-span-3">
                        <form class="w-full" action="{{route('admin.categories.update', ['category' => $category->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <input type="file" name="cover_image" id="imgupload" onchange="$('#categoryImage').attr('src', window.URL.createObjectURL(this.files[0]))" hidden/>
                            <div class="flex items-center py-8">
                            <div class="md:w-1/6">
                                <label class="block text-gray-500 font-bold  mb-1 md:mb-0"
                                       for="inline-full-price">
                                    Parent
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <select
                                    class="bg-gray-200 border-2 appearance-none border-gray-200 rounded w-full text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-full-name" type="text" name="user_id">
                                    <option></option>
                                @foreach($categories as $oneCategory)
                                        <option value="{{$oneCategory->id}}" @if($oneCategory->id == $category->parent_category_id) selected @endif>{{$oneCategory->translation?->name}}</option>
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
                                    id="inline-full-name" type="text" name="name" value="{{$category->translation?->name}}">
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
                                <textarea class="h-36 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                          name="description">{{$category->translation?->description}}</textarea>
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
        $('#OpenImgUpload').click(function(e){
            $('#imgupload').trigger('click');
            return false;
        });
        function setLocation(){
            console.log(window.marker.getLngLat())
            let lnglat = window.marker.getLngLat();
            $("#latitude").val(lnglat.lat);
            $("#longitude").val(lnglat.lng);
        }
    </script>
</x-admin-layout>
