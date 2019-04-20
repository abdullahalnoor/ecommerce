<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <i class="fas fa-edit"></i> Update Category Information
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" id="updateForm">
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{$brand->name}}">
            <input type="hidden" name="brand_id" value="{{$brand->id}}">
            <span class="text-danger" id="errName"></span>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
             <option value="0" {{$brand->status == 0?'selected':''}}>Unpublished</option> 
             <option value="1" {{$brand->status == 1?'selected':''}}>Published</option>
           </select>
            <span class="text-danger" id="errStatus"></span>
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