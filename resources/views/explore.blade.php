@extends('layouts.app')

@section('content')
<h1 class="display-3 m-5 text-center"><b>Explore Users</b></h1>
<hr>
@foreach($users as $user)
<div class="row m-3">
    <div class="col-9">
        <h1 class="display-4"> {{ $user->name }} </h1>
        <p><a href="{{ route('profile', $user->username)}}">{{ '@'.$user->username }}</a></p>
    </div>
    <div class="col-3 p-3">
        <img class="img-fluid rounded-circle float-right" src="{{$user->avatar}}" alt="">
    </div>
</div>
<hr>
@endforeach
{{ $users->links() }}
@endsection
