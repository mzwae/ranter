@extends('layouts.app')

@section('content')

    <h3>Profile page for {{ $user->name }}</h3>

    <hr>

    @include('_timeline', [
        'rants' => $user->rants
    ])

@endsection
