<x-admin-layout>
    <div class="p-8 text-gray-900">
        <div class="border border-gray-200 border-3 rounded p-2">
            <form class="w-full"
                  action="{{route('admin.products.update', ['product' => $product->id])}}"
                  method="POST"
                  name="updateForm"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class=" md:grid md:grid-cols-4 gap-8">
                    <div class="m-4 flex flex-col items-center justify-start col-span-1">
                        <div class="flex flex-col justify-center items-center">
                            <img src="{{$product->images[0]->path}}" id="productImage"
                                 class="w-36 h-36 object-cover rounded-full" alt="">
                            <input type="file" name="image" id="imgupload"
                                   onchange="$('#productImage').attr('src', window.URL.createObjectURL(this.files[0]))"
                                   hidden/>
                            <button id="OpenImgUpload" class="bg-none border-b border-1 p-1">upload</button>
                        </div>
                        <div>
                            <form action="{{route('admin.products.destroy', ['product' => $product->id])}}"
                                  method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn-danger"  value="Delete"/>
                            </form>
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
                                    id="inline-full-name" type="text" name="name"
                                    value="{{$product->translation?->name}}">
                            </div>
                        </div>
                        <div class="flex items-center mb-6">
                            <div class="md:w-1/6">
                                <label class="block text-gray-500 font-bold  mb-1 md:mb-0 pr-4"
                                       for="description">
                                    Description
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <textarea
                                    class="h-48 bg-gray-200 appearance-none  border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="description"
                                    name="description">{{$product->translation?->description}}</textarea>
                            </div>
                        </div>

                        <div class="flex items-center py-8">
                            <div class="md:w-1/6">
                                <label class="block text-gray-500 font-bold  mb-1 md:mb-0"
                                       for="inline-full-price">
                                    Price
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input
                                    class="bg-gray-200 border-2 appearance-none border-gray-200 rounded w-full text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-full-price" type="text" name="price" value="{{$product->price}}">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="rounded border border-dashed border-2 border-gray-200 w-full h-64 px-2">

                    <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Ingredients</h3>
                    <ul class="grid w-full gap-6 md:grid-cols-12">
                        @foreach($ingredients as $ingredient)
                        <li>
                            <input type="radio" id="hosting-{{$ingredient->id}}" name="hosting" value="hosting-small" class="hidden peer" required>
                            <label for="hosting-{{$ingredient->id}}" class="shadow-lg inline-flex items-center justify-between w-full rounded-lg text-gray-500 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:shadow-blue-300 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="block">
                                    <img class="rounded-lg" src="{{$ingredient->images[0]->path}}" alt="">
                                    <h6 class="w-full text-center">{{$ingredient->translation?->name}}</h6>
                                </div>
                            </label>
                        </li>
                        @endforeach
                    </ul>

                </div>
                <div class="flex justify-end">
                    <button type="submit" class="btn-primary" onclick="document.updateForm.submit()">update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $('#OpenImgUpload').click(function (e) {
            $('#imgupload').trigger('click');
            return false;
        });
    </script>
</x-admin-layout>
