@extends('admin.master') 
@section('title','Dashboard') 
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-cogs"></i> General Inforamtion</h1>
     
    </div>

  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <i class="fas fa-info"></i> View & Update General Inforamtion
        </div>
        <div class="card-body">
          <form action="{{route('general.information')}}" method="POST">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="site_name">Website Name</label>
                  <input type="text" class="form-control" name="site_name" value="{{$generalSetting->site_name}}"> @if($errors->has('site_name'))
                  <span class="text-danger font-weight-bold">
                              {{$errors->first('site_name')}}
                            </span> @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="site_title">Website Title</label>
                  <input type="text" class="form-control" name="site_title" value="{{$generalSetting->site_title}}"> @if($errors->has('site_title'))
                  <span class="text-danger font-weight-bold">
                                          {{$errors->first('site_title')}}
                                        </span> @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="currency_name">Currency Name </label>
                  <input type="text" class="form-control" name="currency_name" value="{{$generalSetting->currency_name}}"> @if($errors->has('currency_name'))
                  <span class="text-danger font-weight-bold">
                                        {{$errors->first('currency_name')}}
                                      </span> @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="currency_symbol">Currency Symbol </label>
                  <input type="text" class="form-control" name="currency_symbol" value="{{$generalSetting->currency_symbol}}"> @if($errors->has('currency_symbol'))
                  <span class="text-danger font-weight-bold">
                                                    {{$errors->first('currency_symbol')}}
                                                  </span> @endif
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-12">
                <div class="form-group">
                  <button type="submit" class="btn btn-info btn-block"> Update</button>
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