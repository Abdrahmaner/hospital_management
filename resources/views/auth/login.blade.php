@extends('layouts.default')

@section('content')


<div class="welcome_docmed_area" style='background-color:#cbeae7'>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_thumb">
                        <div class="thumb_1">
                            <img src="img/about/1.png" alt="">
                        </div>
                        <div class="thumb_2">
                            <img src="img/about/2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
        <h1 class='h1' style='margin-left: 45px;font-family:serif;'>Authentification</h1>
                       
        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
<form style="width: 23rem;" method="post" action="{{ route('login') }}">
  @csrf
  <div class="form-outline mb-4">
  <label class="form-label" >Email address</label>
    <input type="email" id="email" class="form-control form-control-lg" name="email"/>
   
    @error('email')
          <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
          </span>
        @enderror
  </div>

  <div class="form-outline mb-4">
  <label class="form-label" >Password</label>
    <input type="password" id="password" class="form-control form-control-lg" name="password" />
    @error('password')
          <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
          </span>
        @enderror
  </div>

  <div class="pt-1 mb-4">
    <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
  </div>

  <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
  <p>Don't have an account? <a href="/register" class="link-info">Register here</a></p>

</form>

</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
