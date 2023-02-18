<x-admin-layout>

    <x-control-bar addingButtonTarget="{{route('admin.users.create')}}" searching/>
    <div class="p-8 text-gray-900 md:grid md:grid-cols-4 gap-2">
        @foreach($users as $user)
            <x-user-card :user="$user"/>
        @endforeach
    </div>

</x-admin-layout>
