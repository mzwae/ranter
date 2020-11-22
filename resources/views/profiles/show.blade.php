@extends('layouts.app')

@section('content')

   <header class="mb-6 relative">
       <img src="/images/default-profile-banner.jpg" alt="profile-banner" class="mb-2">

       <div class="flex justify-between items-center mb-4">

           <div>
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans()}}</p>
           </div>

           <div class="flex">
               @if(auth()->user()->is($user))
                    <a href="" class="bg-blue-500 rounded-full shadow py-2 px-4 text-black text-xs mr-2">Edit Profile</a>
               @endif
               {{-- <a href="" class="bg-blue-500 rounded-lg shadow py-2 px-4 text-white text-xs">Follow Me</a> --}}

                <x-follow-button :user="$user"></x-follow-button>
           </div>

       </div>

       <p class="text-sm">
           It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
           The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,
           content here', making it look like readable English.
       </p>

    <img
        src="{{ $user->avatar }}"
        alt="avatar"
        class="rounded-full mr-2 absolute"
        style="width: 150px; left: calc(50% - 75px); top: 38%;"
        >


   </header>

    <hr>

    @include('_timeline', [
        'rants' => $user->rants
    ])

@endsection
