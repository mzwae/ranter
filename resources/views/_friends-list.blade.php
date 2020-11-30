<h3 class="font-bold text-xl mb-4">Following</h3>


<ul>
    @forelse(current_user()->follows as $user)

    <li class="mb-4">
        <div class="flex items-center text-sm">
        <a href="{{ route('profile', $user->name)}}">
        <img src="{{$user->avatar}}" alt="img" class="rounded-full mr-2" width="40" height="40">
            {{ $user->name }}
        </a>
        </div>

    </li>

    @empty
    <li>No friends yet!</li>



    @endforelse


</ul>
