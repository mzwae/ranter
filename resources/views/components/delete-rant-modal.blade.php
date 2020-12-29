<div class="modal" id="deleteModal-{{ $rant->id }}">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete Your Rant</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="/rants/{{ $rant->id }}/delete" method="post">
                    @method('delete')
                    @csrf
                    <div class="form-group">
                        <p>Are you sure you want to delete this rant? This action cannot be undone.</p>
                    </div>

                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                    <button class="btn btn-outline-info" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
