<div class="flex p-4 border-b border-b-gray-400">

    <div class="mr-2 flex-shrink-0">
        <img src="https://i.pravatar.cc/50?u={{ auth()->user()->email }}" alt="img" class="rounded-full mr-2">
    </div>

    <div>
        <h5 class="font-bold mb-4">{{ $rant->user->name }}</h5>

        <p class="text-sm">{{ $rant->body }}</p>
    </div>

</div>
