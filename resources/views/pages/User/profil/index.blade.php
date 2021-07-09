@extends('layouts.user')
@section('title', 'Profil')
@section('content')

<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Tables</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tables</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <div class="row">
            
           <div class="col">
            <div class="card d-flex justify-content-center">
              <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('update-profil',$user->id) }}" method="POST">
                  
                  @csrf
                
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Username</label>
                          <input value="{{ $user->name }}" name="name" type="text" id="input-username" class="form-control" placeholder="Username">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Email address</label>
                          <input value="{{ $user->email }}" name="email" type="email" id="input-email" class="form-control" placeholder="jesse@example.com">
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-Password">Password</label>
                          <input  name="password" type="text" id="input-Password" class="form-control" >
                          <small>Kosongkan jika tidak ingin mengganti password</small>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Address -->
                 
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">Address</label>
                          <input value="{{ $user->alamat }}" name="alamat" id="input-address" class="form-control" placeholder="Jl beringin no 52"  type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="hp">No Handphone</label>
                          <input value="{{ $user->no_hp }}" name="no_hp" type="text" id="hp" class="form-control" placeholder="0812****">
                        </div>
                      </div>
                     
                    </div>
                  </div>
               
                  <div class=" ml-4 justify-content-end">
                    <button type="submit" class="btn btn-primary ">Update</button>
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
 
@endsection