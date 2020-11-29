<div class="border border-gray-300 rounded-lg">

    @forelse($rants as $rant)
        @include('rant')

        @empty
        <p class="p-4">No rants yet.</p>


    @endforelse

</div>
