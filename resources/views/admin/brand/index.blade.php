@extends('admin.master') 
@section('title','Dashboard') 
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-info-circle"></i>  Brand Information</h1>
    </div>

  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">

        <div class="card-header">
         <i class="fas fa-info-circle"></i> Brand Information
          <button class="btn btn-info float-right" id="addModal">
            <i class="fas fa-plus"></i>
            Add New
          </button>
        </div>

        <div class="card-body" id="load">
          <div class="table-responsive" id="refreshTable">
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($brands as $item)
                <tr>
                  <td>
                    {{ $item->name }}
                  </td>
                  <td>
                    {{ $item->status == 0?'Unpublished':'Published' }}
                  </td>
                  <td>
                    <button type="button" data-route="{{route('edit.brand',$item->id)}}" class="btn btn-info editModal">
                    <i class="fas fa-edit"></i>  Edit
                    </button>

                  </td>
                </tr>
                @empty
                <tr class="text-center">
                  <td colspan="3">
                    <h2 class="text-danger">
                      No Record Found...
                    </h2>
                  </td>
                </tr>
                @endforelse


              </tbody>
            </table>
          </div>
        </div>

      </div>

    </div>
  </div>
</main>

<div id="viewModal"></div>
@endsection
 @push('script')
<script>
  $(document).ready(function(){
      $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    }); //end of ajax setup

    $("#addModal").on("click",function(e){
      e.preventDefault();
      $.get("{{route('create.brand')}}",function(data){
        $("#viewModal").empty().append(data);        
        $("#viewModal #createModal").modal("show");
      });
    });

    $(document).on("submit","#createForm",function(e){
      e.preventDefault();
      // var frmData = $(this).serialize();      
      var frmData = new FormData($(this)[0]);
      $.ajax({
        url:"{{route('create.brand')}}",
        type:"POST",
        data:frmData,
        contentType:false,
        cache:false,
        processData:false
      })
      .done(function(data){
        $("#viewModal #createModal").modal("hide").empty();
        success("Information Save Successfully.. ");
        documentReload();
      })
      .fail(function(err){
        var err = err.responseJSON.errors;
        errors(err);
      });
    });


    $(document).on("click",".editModal",function(e){
      e.preventDefault();
     
      var route = $(this).data("route");
      $.get(route,function(data){
        $("#viewModal").empty().append(data);        
        $("#viewModal #updateModal").modal("show");
      });
    });

  $(document).on("submit","#updateForm",function(e){
      e.preventDefault();
      var frmData = $(this).serialize();      
      // var frmData = new FormData($(this)[0]);
      $.ajax({
        url:"{{route('update.brand')}}",
        type:"POST",
        data:frmData,
      })
      .done(function(data){
        $("#viewModal #updateModal").modal("hide").empty();
        success("Information Updated Successfully.. ");
        documentReload();
      })
      .fail(function(err){
        var err = err.responseJSON.errors;
        errors(err);
      });
    });
    function documentReload(){
      setTimeout(function(){
        $("#load").load(location.href + " #refreshTable");
      },3000);
    };
    function errors(err){
      $("#viewModal #errName").empty().html(err.name);      
      $("#viewModal #errStatus").empty().html(err.status);      
    }

   
    });//end of document ready

</script>




































@endpush