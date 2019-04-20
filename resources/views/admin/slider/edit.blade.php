<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <i class="fas fa-edit"></i> Update Slider Information
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" id="updateForm" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{$slider->title}}">
            <input type="hidden" name="slider_id" value="{{$slider->id}}">
            <span class="text-danger" id="errTitle"></span>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" value="{{$slider->title}}">
            <span class="text-danger" id="errDescription" ></span>
          </div>
          <div class="form-group">
            <label for="image">Image</label>
            <input type="file" accept="image/*" class="form-control" name="image">
            <span class="text-danger" id="errImage"></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update </button>
        </div>
      </form>
    </div>
  </div>
</div>