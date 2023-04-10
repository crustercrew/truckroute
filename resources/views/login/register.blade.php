@extends('layout.main')
@section('isi')

<div class="container-fluid">
  <div class="row main-content bg-success text-center">
    <div class="col-md-4 text-center company__info">
      <span class="company__logo "><h2><img src="img/{{ $logo }}" alt="sidoarjo" width="200"></span></h2></span>
      <h4 class="company_title">{{ $name }}</h4>
    </div>
    <div class="col-md-8 col-xs-12 col-sm-15 login_form ">
      <div class="container-fluid">
        <div class="row">
          <h2>Register</h2>
        </div>
        <div class="row">
          <form class="form-group" action="/register" method="post">
            @csrf
            <div class="row">
              <input type="text" name="name" id="name" class="regis__input @error('name') is-invalid @enderror" placeholder="name" required value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">
            {{ $message }}
              </div>  
            @enderror  
            </div>

            <div class="row">
                <input type="text" name="username" id="username" class="regis__input @error('username') is-invalid @enderror" placeholder="username" required value="{{ old('username') }}">
                @error('username')
                <div class="invalid-feedback ">
                {{ $message }}
                  </div>  
                @enderror 
              </div>

              <div class="row">
                <input type="text" name="email" id="email" class="regis__input @error('email') is-invalid @enderror" placeholder="email" required value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">
                {{ $message }}
                  </div>  
                @enderror 
              </div>

            <div class="row">
              <input type="password" name="password" id="password" class="regis__input @error('password') is-invalid @enderror" placeholder="Password" required>
              @error('password')
              <div class="invalid-feedback">
              {{ $message }}
                </div>  
              @enderror 
            </div>

              <span class="fa fa-lock">
              <div class="row">
                <input type="submit" value="register" class="btn m-lg-5">
              </div>
              </span>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer -->
<div class="container-fluid text-center footer">
  Coded with &hearts; by <a href="https://bit.ly/yinkaenoch">Yinka.</a></p>
</div>
@endsection