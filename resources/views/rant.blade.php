<div class="flex p-4 border-b border-b-gray-400">

    <div class="mr-2 flex-shrink-0">
    <a href="{{ route('profile', $rant->user->name)}}">
            <img src="{{ $rant->user->avatar }}" alt="img" class="rounded-full mr-2" width="40" height="40">
        </a>
    </div>

    <div>
        <h5 class="font-bold mb-4">{{ $rant->user->name }}</h5>

        <p class="text-sm">{{ $rant->body }}</p>
        <hr class="mt-3 mb-3">
        <div>
            <span class="fa fa-thumbs-up p-2 btn btn-outline-success mr-5 {{ $rant->isLikedBy(current_user()) ? 'disabled':'' }}">{{ $rant->likes ?: 0 }}</span>
            <span class="fa fa-thumbs-down p-2 btn btn-outline-danger {{ $rant->isDislikedBy(current_user()) ? 'disabled':'' }}">{{ $rant->dislikes ?: 0}}</span>
        </div>
    </div>

</div>
