<x-app>
    <header class="mb-6 relative">
        <div class="relative">
            <img src="/images/default-profile-banner.jpg" alt="" class="mb-2">

            <img src="{{ $user->avatar }}" alt="your avatar" class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2" style="width: 150px; left: 50%;">
        </div>

        <div class="flex justify-between items-center mb-6">
            <div style="max-width: 270px">
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">

                @can ('edit', $user)
                    <a href="{{ $user->path('edit') }}" class="rounded-full px-4 py-2 border border-grey-300 text-black text-xs mr-2">Edit Porfile</a>
                @endcan

                <x-follow-button :user="$user"></x-follow-button>

            </div>
        </div>

        <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Quo voluptatibus praesentium tempora tenetur.
        Quae reprehenderit adipisci optio eveniet incidunt
        nisi dicta! Velit atque, nesciunt unde possimus maxime
        temporibus obcaecati, incidunt rerum reprehenderit itaque fugiat,
        animi nulla molestiae praesentium vero distinctio!</p>


    </header>

    @include ('_timeline', [
        'tweets' => $tweets
    ])

</x-app>
