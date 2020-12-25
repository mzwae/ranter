<div class="form-inline">
    {{-- <form action="/rants/{{ $rant->id }}/like" method="post"> --}}
    <form action="{{ action('RantLikesController@store', ['rant' => $rant->id]) }}" method="post">
        @csrf
        <button type="submit" class="fa fa-thumbs-up p-2 btn btn-outline-success mr-5 {{ $rant->isLikedBy(current_user()) ? 'disabled':'' }}"> {{ $rant->likes ?: 0 }}</button>
    </form>

    <form action="/rants/{{ $rant->id }}/like" method="post">
        @csrf
        @method('delete')
        <button class="fa fa-thumbs-down p-2 btn btn-outline-danger {{ $rant->isDislikedBy(current_user()) ? 'disabled':'' }}"> {{ $rant->dislikes ?: 0}}</button>
    </form>

    @if(current_user()->id === $rant->user_id)
    <form action="/rants/{{ $rant->id }}/edit">
        <button class="fa fa-pencil p-2 ml-5 btn btn-outline-info">Edit</button>
    </form>
    @endif
</div>
