@extends('layouts.default')
@section('content')
<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100" >
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0" style='width:80%;height:60%;'>
        <div class="card mb-3" style="border-radius: .5rem; ">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="/img/3774299.png"
                alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
              <h5>{{Auth::user()->fname}} {{Auth::user()->lname}}</h5>
              <a href="{{route('docedit')}}" class="btn btn-link">Edit</a>
              @if(Auth::user()->name=="admin")
              <p>Admin</p>
              @else
              <p>doctor</p>
              @endif
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted">{{Auth::user()->email}}</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Phone</h6>
                    <p class="text-muted">0616534323</p>
                  </div>
                </div>
                <h6>Projects</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Service</h6>
                    <p class="text-muted">{{Auth::user()->service}}</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>City</h6>
                    <p class="text-muted">Benslimane</p>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection