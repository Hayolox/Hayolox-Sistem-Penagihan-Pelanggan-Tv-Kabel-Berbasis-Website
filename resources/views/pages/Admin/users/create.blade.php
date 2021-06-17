@extends('layouts.app')
@section('title', 'Tambah User')
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
                <form action="{{ route('Users.store') }}" method="POST">
                  @csrf
                 
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Username</label>
                          <input name="name" type="text" id="input-username" class="form-control" placeholder="Username">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Email address</label>
                          <input name="email" type="email" id="input-email" class="form-control" placeholder="jesse@example.com">
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
                          <input name="alamat" id="input-address" class="form-control" placeholder="Jl beringin no 52"  type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="hp">No Handphone</label>
                          <input name="no_hp" type="text" id="hp" class="form-control" placeholder="0812****">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="tagihan">Tagihan</label>
                          <input name="tagihan" type="number" id="tagihan" class="form-control" value="53000">
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="role">Role</label>
                          <select name="roles" id="role" class="form-control">
                            <option selected value="USERS">User</option>
                            <option value="ADMIN">Admin</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
               
                  <div class=" ml-4 justify-content-end">
                    <button type="submit" class="btn btn-primary ">Tambahkan</button>
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