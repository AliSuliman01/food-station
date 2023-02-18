<div class="bg-white p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="{{route('users.edit', ['user' => $user->id])}}">
                <img class="rounded shadow object-cover h-48 w-full" src="{{$user->photo_path}}" alt="">
                <div class="text-center trounded w-full mb-4 text-xl tracking-tight text-gray-900 dark:text-white" > {{$user->name}} </div>
            </a>
</div>
