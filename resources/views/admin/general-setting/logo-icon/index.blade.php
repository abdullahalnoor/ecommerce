@extends('admin.master') 
@section('title','Dashboard') @push('style')
<style>
  .file {
    visibility: hidden;
    position: absolute;
  }
</style>





@endpush 
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-images"></i> Logo and Icon</h1>

    </div>

  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
          <i class="fas fa-images"></i> Viw & Update Logo & Icon
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="card border-info">
                <div class="card-header bg-info text-white">
                  <i class="fas fa-image"></i> View and Update Icon
                </div>
                <div class="card-body">
                  <div class="d-block text-center " style="width:300px; height:150px">
                    <div class="row justify-content-center align-self-center">
                      <img src="{{asset('img/icon.png')}}" alt="icon">
                    </div>
                  </div>
                  <form action="{{route('update.icon')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label><strong style="text-transform:uppercase">Upload Icon</strong> </label>
                      <input type="file" name="icon" accept="image/*" class="file">
                      <div class="input-group col-xs-12">

                        <input type="text" class="form-control " disabled placeholder="Upload Icon">
                        <span class="input-group-btn">
                                                <button class="browse btn btn-primary " type="button">
                                                <i class="fa fa-image"></i> Browse</button>
                                                </span>
                      </div>
                      @if($errors->has('icon'))
                      <span class="text-danger font-weight-bold">
                         {{ $errors->first('icon') }}
                       </span> @endif
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-info btn-block">
                        Update Icon
                      </button>
                    </div>
                  </form>
                </div>
              </div>

            </div>

            <div class="col-md-6">
              <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                  <i class="fas fa-image"></i> View and Update Logo
                </div>
                <div class="card-body">
                  <div class="d-block text-center border-primary">
                    <img src="{{asset('img/logo.png')}}" style="width:300px; height:150px" alt="logo">
                  </div>
                  <form action="{{route('update.logo')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label><strong style="text-transform:uppercase">Upload Logo</strong> </label>
                      <input type="file" name="logo" accept="image/*" class="file">
                      <div class="input-group col-xs-12">

                        <input type="text" class="form-control " disabled placeholder="Upload Logo">
                        <span class="input-group-btn">
                                                            <button class="browse btn btn-primary " type="button">
                                                            <i class="fa fa-image"></i> Browse</button>
                                                            </span>
                      </div>
                      @if($errors->has('logo'))
                      <span class="text-danger font-weight-bold">
                                     {{ $errors->first('logo') }}
                                   </span> @endif
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-info btn-block">
                                    Update Logo
                                  </button>
                    </div>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>
@endsection
 @push('script')
<script>
  $(document).on('click', '.browse', function () {
       var file = $(this).parent().parent().parent().find('.file');
       file.trigger('click');
   });
  
   $(document).on('change', '.file', function () {
       $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
   });

</script>





@endpush