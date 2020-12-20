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
</div>
