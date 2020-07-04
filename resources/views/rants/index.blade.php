@extends('layouts.app')

@section('content')

    @include('_publish-rant-panel')

    <div class="border border-gray-300 rounded-lg">

        @foreach($rants as $rant)
            @include('rant')
        @endforeach

    </div>

@endsection
