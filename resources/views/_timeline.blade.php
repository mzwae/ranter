<div class="border border-gray-300 rounded-lg">

    @forelse($rants as $rant)
        @include('rant')


        @empty
        <p class="p-4">No rants yet.</p>



    @endforelse
</div>
<div class="flex justify-between w-64 mx-auto mt-5 mb-5">
    {{ $rants->links() }}
</div>
