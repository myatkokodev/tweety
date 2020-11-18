<x-app>
    <form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label for="name" class="mb-2 uppercase block text-xs text-gray-700">Name</label>

        <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" value="{{ $user->name }}" required>

            @error('name')
                <p class="text-red-500 mt-2 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="username" class="mb-2 uppercase block text-xs text-gray-700">Username</label>

        <input class="border border-gray-400 p-2 w-full" type="text" name="username" id="username" value="{{ $user->username }}" required>

            @error('username')
                <p class="text-red-500 mt-2 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">

            <label for="avatar" class="mb-2 uppercase block text-xs text-gray-700">Avatar</label>

            <div class="flex">

                <input class="border border-gray-400 p-2 w-full" type="file" name="avatar" id="avatar" value="{{ $user->avatar }}">

                <img src="{{ $user->avatar }}" alt="your avatar" width="40">

            </div>

            @error('avatar')
                <p class="text-red-500 mt-2 text-xs">{{ $message }}</p>
            @enderror


        </div>

        <div class="mb-6">
            <label for="email" class="mb-2 uppercase block text-xs text-gray-700">Email</label>

        <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email" value="{{ $user->email }}" required>

            @error('email')
                <p class="text-red-500 mt-2 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="mb-2 uppercase block text-xs text-gray-700">Password</label>

            <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" required>

            @error('password')
                <p class="text-red-500 mt-2 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="mb-2 uppercase block text-xs text-gray-700">Password Confirmation</label>

            <input class="border border-gray-400 p-2 w-full" type="password" name="password_confirmation" id="password_confirmation" required>

            @error('password_confirmation')
                <p class="text-red-500 mt-2 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">Submit</button>
        <a href="{{ $user->path() }}" class="hover:underline">cancel</a>
        </div>

    </form>
</x-app>
