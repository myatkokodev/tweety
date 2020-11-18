<div class="flex p-4 {{ $loop->last ? '': 'border-b border-b-grey-400' }}">
    <div class="mr-4 flex-shrink-0">
        <a href="{{ $tweet->user->path() }} "><img src="{{ $tweet->user->avatar }}" alt="" class="rounded-full mr-4" width="40" height="40"></a>
    </div>
    <div>
        <h5 class="font-bold mb-4">
            <a href="{{ $tweet->user->path() }}">{{ $tweet->user->name }}</a>
        </h5>

        <p class="text-sm mb-3">
           {{ $tweet->body }}
        </p>


        <div class="flex">
            <div class="flex items-center mr-4"><!-- from zondicons.com !-->

                <img src="https://img.icons8.com/material-rounded/24/000000/facebook-like.png" class="w-3 mr-2" />

                <span class="text-xs text-gray-500">{{ $tweet->likes ?: 0 }}</span>
            </div>

            <div class="flex items-center"><!-- from zondicons.com !-->

                <img src="https://img.icons8.com/material-rounded/24/000000/thumbs-down.png" class="w-3 mr-2" />

                <span class="text-xs text-gray-500">{{ $tweet->dislikes ?: 0 }}</span>
            </div>
        </div>


    </div>



</div>
