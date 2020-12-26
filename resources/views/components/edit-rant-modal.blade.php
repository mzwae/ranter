<div class="modal" id="editModal-{{ $rant->id }}">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Edit Your Rant</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <form action="/rants/{{ $rant->id }}/edit" method="post">
            <div class="form-group">
            <label for="body">Edit Rant</label>
              <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{ $rant->body }}</textarea>
            </div>

            <input type="submit" value="Save" class="btn btn-outline-primary">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
          </form>
        </div>


      </div>
    </div>
  </div>
