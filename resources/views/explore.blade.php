<x-app>
    <div>
        @foreach ($users as $user)
            <a href="{{ $user->path() }}" class="flex items-center mb-5">
                <img src="{{ $user->avatar }}" alt="{{$user->username}}'s avatar" width="60" class="mr-4 rounded">

                <h4 class="font-bold">{{ '@'.$user->username }}</h4>
            </a>
        @endforeach

        {{ $users->links() }}
    </div>
</x-app>
