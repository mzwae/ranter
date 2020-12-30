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

        <x-like-buttons :rant="$rant"/>
    </div>

</div>
<x-edit-rant-modal :rant="$rant"/>
<x-delete-rant-modal :rant="$rant"/>
