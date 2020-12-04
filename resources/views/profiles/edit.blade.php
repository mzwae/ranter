@extends('layouts.app')

@section('content')

<h1 class="display-3">Edit your profile</h1>

<form action="{{ $user->path() }}" method="post">
    @csrf
    @method('patch')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text"
          class="form-control" name="name" value="{{ $user->name }}">

          @error('name')
            <p class="text-danger">{{ $message }}</p>
          @enderror
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text"
          class="form-control" name="username" value="{{ $user->username }}">

          @error('username')
            <p class="text-danger">{{ $message }}</p>
          @enderror
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email"
        class="form-control" name="email" value="{{ $user->email }}">

        @error('email')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

   </form>

@endsection
