@extends('layouts.app')

@section('content')

<header class="mb-6 relative">
    <img src="/images/default-profile-banner.jpg" alt="profile-banner" class="mb-2">

    <div class="flex justify-between items-center mb-4">

        <div style="max-width: 270px;">
            <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
            <p class="text-sm">Joined {{ $user->created_at->diffForHumans()}}</p>
        </div>

        <div class="flex">
            @can('edit', $user)
                <a href="{{ $user->path('edit')}}" class="bg-blue-500 rounded-full shadow py-2 px-4 text-black text-xs mr-2">Edit Profile</a>
            @endcan
            {{-- <a href="" class="bg-blue-500 rounded-lg shadow py-2 px-4 text-white text-xs">Follow Me</a> --}}

            <x-follow-button :user="$user"></x-follow-button>
        </div>

    </div>

    <p class="text-sm">
        {{ $user->bio ? $user->bio->body : "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium" }}

    </p>

    <img src="{{ $user->avatar }}" alt="avatar" class="rounded-full mr-2 absolute" style="width: 150px; left: calc(50% - 75px); top: 38%;">


</header>

<hr>

@include('_timeline', [
'rants' => $rants
])

@endsection
