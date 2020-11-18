<x-master>
    <div class="container flex justify-center">
        <div class="px-12 py-6 bg-gray-200 border border-gray-300 rounded-lg">
            <div class="col-md-8">
                <div class="card">
                        <div class="font-bold text-lg mb-4">{{ __('Login') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-6">
                                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>

                                    <input id="email" type="email" class="border border-gray-400 p-2 w-full" name="email" required autofocus autocomplete="email" value="{{ old('email') }}" >

                                    @error('email')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>

                                    <input id="password" type="password" class="border border-gray-400 p-2 w-full" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <div>
                                        <input class="mr-1" type="checkbox" name="remember" id="remember" {{ old('remember' ? 'checked' : '') }}>

                                        <label class="text-xs text-gray-700 font-bold uppercase" for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2">Submit</button>
                                    <a href="{{ route('password.request') }}" class="text-xs text-gray-700">Forgot your password?</a>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-master>

