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
          <a class="btn btn-info float-right" href="{{route('create.product')}}" >
            <i class="fas fa-plus"></i>
            Add New
          </a>
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
                @forelse ($products as $item)
                <tr>
                  <td>
                    {{ $item->name }}
                  </td>
                  <td>
                    {{ $item->status == 0?'Unpublished':'Published' }}
                  </td>
                  <td>
                    <button type="button" class="btn btn-info editModal">
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
@endsection