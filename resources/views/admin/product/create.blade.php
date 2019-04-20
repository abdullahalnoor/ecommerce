@extends('admin.master') 
@section('title','Dashboard') 
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-info-circle"></i> Product Information</h1>
    </div>

  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">

        <div class="card-header">
          <i class="fas fa-info-circle"></i> Product Information
          <button class="btn btn-info float-right" id="addModal">
            <i class="fas fa-plus"></i>
            Add New
          </button>
        </div>

        <div class="card-body" id="load">
          <form action="{{route('create.product')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="category_id" class="font-weight-bold">Slelct Category</label>
                  <select name="category_id" class="form-control">
                    <option value="">Select One</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{old('category_id') == $category->id ?'selected':'' }}>{{$category->name}}</option>
                    @endforeach
                  </select> @if($errors->has('category_id'))
                  <span class="text-danger font-weight-bold">
                      {{ $errors->first('category_id') }}</span> @endif

                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="brand_id" class="font-weight-bold">Slelct Brand</label>
                  <select name="brand_id" class="form-control">
                    <option value="">Select One</option>
                    @foreach ($brands as $brand)
                        <option value="{{$brand->id}}" {{ old('brand_id') == $brand->id?'selected':'' }} >{{$brand->name}}</option>
                    @endforeach
                  </select> @if($errors->has('brand_id'))
                  <span class="text-danger font-weight-bold">
                      {{ $errors->first('brand_id') }}</span> @endif
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="quantity" class="font-weight-bold">Quantity</label>
                  <input type="number" name="quantity" value="{{old('quantity')}}" class="form-control"> @if($errors->has('quantity'))
                  <span class="text-danger font-weight-bold">
                      {{ $errors->first('quantity') }}</span> @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="price" class="font-weight-bold">Price</label>
                  <input type="number" step=any name="price" value="{{old('price')}}" class="form-control"> @if($errors->has('price'))
                  <span class="text-danger font-weight-bold">
                      {{ $errors->first('price') }}</span> @endif
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="title" class="font-weight-bold">Title</label>
                  <input type="text" name="title" value="{{old('title')}}" class="form-control"> @if($errors->has('title'))
                  <span class="text-danger font-weight-bold">
                      {{ $errors->first('title') }}</span> @endif
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="description" class="font-weight-bold">Description</label>
                  <textarea name="description" rows="5" cols="12" class="form-control">{{old('description')}}</textarea>                  @if($errors->has('description'))
                  <span class="text-danger font-weight-bold">
                      {{ $errors->first('description') }}</span> @endif
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="image" class="font-weight-bold">Image</label>
                  <input type="file" name="image" class="form-control"> @if($errors->has('image'))
                  <span class="text-danger font-weight-bold">
                      {{ $errors->first('image') }}</span> @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="images" class="font-weight-bold">Slider Images (choose one more image)</label>
                  <input type="file" name="images" multiple class="form-control"> @if($errors->has('images'))
                  <span class="text-danger font-weight-bold">
                      {{ $errors->first('images') }}</span> @endif
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="status" class="font-weight-bold">Status</label>
                  <select name="status" class="form-control">
                                      <option value="">Select One</option>
                                      <option value="1" {{old('status') == 1?'selected':''}} >Published</option>
                                      <option value="0" {{old('status') == 0?'selected':''}}>Unpublished</option>
                                </select> @if($errors->has('status'))
                  <span class="text-danger font-weight-bold">
                                    {{ $errors->first('status') }}</span> @endif
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <button type="submit" class="btn btn-block btn-info">Save</button>
                </div>
              </div>

            </div>

          </form>
        </div>

      </div>

    </div>
  </div>
</main>
@endsection