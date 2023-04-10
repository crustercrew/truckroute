@extends('dashboard.layout.main')
 
@section('container')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Tambah User :</h5>
    </div>
  <div class="container p-md-3">
    <form method="post" action="/create" >
      @csrf
      <div class="row g-3 mb-3">
      <div class="col-12">
        <label for="inputuser" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="nama lengkap anda">
        @error('nama_sopir')
        <div class="invalid-feedback">
        {{ $message }}
          </div>  
        @enderror  
      </div>
        <div class="col-6">
          <label for="inputuser" class="form-label">UserName</label>
          <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username anda" required>
          @error('username')
          <div class="invalid-feedback">
          {{ $message }}
            </div>  
          @enderror  
        </div>
        <div class="col-6">
          <label for="inputuser" class="form-label">Email</label>
          <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email anda" required>
          @error('email')
          <div class="invalid-feedback">
          {{ $message }}
            </div>  
          @enderror  
        </div>
      <div class="col-6">
        <label for="status" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password anda" required>
        @error('password')
        <div class="invalid-feedback">
        {{ $message }}
          </div>  
        @enderror  
      </div>
    </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      
    </form>
  
  </div>
  </div>

@endsection