@extends('admin.layouts.app')
@section('content')
<div class="row">

  <div class="col-lg-3 mb-4">
      <div class="card h-100">
          <div class="card-header pb-0 d-flex justify-content-between mb-lg-n4">
              <div class="card-title mb-0">
                  <h5 class="mb-0">Total System Users</h5>
              </div>
          </div>
          <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <h2 class="mb-0">{{ $total_users }}
                </div>
          </div>
      </div>
  </div>


  <div class="col-lg-3 mb-4">
    <div class="card h-100">
        <div class="card-header pb-0 d-flex justify-content-between mb-lg-n4">
            <div class="card-title mb-0">
                <h5 class="mb-0">Total Members</h5>
            </div>
        </div>
        <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mt-4">
                  <h2 class="mb-0">{{ $total_members }}</h2>
              </div>
        </div>
    </div>
</div>


<div class="col-lg-3 mb-4">
    <div class="card h-100">
        <div class="card-header pb-0 d-flex justify-content-between mb-lg-n4">
            <div class="card-title mb-0">
                <h5 class="mb-0">Total Blogs</h5>
            </div>
        </div>
        <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mt-4">
                  <h2 class="mb-0">{{ $total_blogs }}</h2>
              </div>
        </div>
    </div>
</div>


<div class="col-lg-3 mb-4">
    <div class="card h-100">
        <div class="card-header pb-0 d-flex justify-content-between mb-lg-n4">
            <div class="card-title mb-0">
                <h5 class="mb-0">Total Events</h5>
            </div>
        </div>
        <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mt-4">
                  <h2 class="mb-0">{{ $total_events }}</h2>
              </div>
        </div>
    </div>
</div>


</div>
@endsection
