@unless (current_user()->is($user)) <!-- test user''s profile not showing follow button -->

    <form method="POST" action="{{ route('follow', $user->username)}}">
        @csrf
        <button type="submit" class="bg-blue-500 rounded-full px-4 py-2 shadow text-white text-xs">
            {{ auth()->user()->following($user) ? 'Unfollow Me': 'Follow Me' }}
        </button>
    </form>

@endunless

