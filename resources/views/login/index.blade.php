@extends('layout.main')
@section('isi')

@if (session()->has('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<div class="container-fluid">
  @if (session()->has('loginError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('loginError') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
  <div class="row main-content bg-success text-center">
    <div class="col-md-4 text-center company__info">
      <span class="company__logo "><h2><img src="img/{{ $logo }}" alt="sidoarjo" width="200"></span></h2></span>
      <h4 class="company_title">{{ $name }}</h4>
    </div>
    <div class="col-md-8 col-xs-12 col-sm-15 login_form ">
      <div class="container-fluid">
        <div class="row">
          <h2>Log In</h2>
        </div>
        <div class="row">
          <form class="form-group" action="/login" method="post">
            @csrf
            <div class="row">
              <input type="text" name="username" id="username" class="form__input" @error('username') is-invalid @enderror placeholder="Username" autofocus required>
              @error('username')
              <div class="invalid-feedback ">
              {{ $message }}
                </div>  
              @enderror
            </div>
            <div class="row">
              <input type="password" name="password" id="password" class="form__input" @error('password') is-invalid @enderror placeholder="Password" required>
              @error('password')
              <div class="invalid-feedback">
              {{ $message }}
                </div>  
              @enderror 
            </div>
              <span class="fa fa-lock">
              <div class="row">
                <input type="submit" value="Submit" class="btn m-lg-5">
              </div>
              </span>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection