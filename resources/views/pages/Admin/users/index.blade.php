@extends('layouts.app')
@section('title', 'Data Users')
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
              <li class="breadcrumb-item"><a href="{{ route('Users.index') }}">Data User</a></li>
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
              <h3 class="mb-0">Data User</h3>
            </div>

            <div class="col justify-content-lg-end mb-3">
             <a href="{{ route('Users.create') }}" class="btn btn-primary" >Tambahkan Data User</a>
            </div>

            <div class="col justify-content-lg-end mb-3">
                <form action="{{ route('Users.index') }}" method="GET" class="form-inline">
                  @csrf
                  <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search Np" >
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> 
            </div>

        <!-- Light table -->
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Np</th>
                <th scope="col">Nama</th>
                <th scope="col">No Hp</th>
                <th scope="col">Tagihan</th>
                <th scope="col">Alamat </th>
                <th scope="col">Status </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <th scope="row">{{ $user->Nomor_pelanggan }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->no_hp }}</td>
                <td>{{ $user->tagihan }}</td>
                <td>{{ $user->alamat }}1</td>
                <td>
                  <a href="{{ route('Users.edit',$user->id) }}" class="btn btn-info">Edit</a>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                    Hapus
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Yakin Untuk Menghapus?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                  
                        <div class="modal-footer d-flex justify-content-center">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <form action="{{ route('Users.destroy', $user->id) }}" method="POST" class="form-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger">Yakin</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>    
              </tr>
              @endforeach
            </tbody>
          </table>  
          {{ $users->links() }}   
        </div>
      </div>
    </div>
  </div>
  
  
 
</div>
</div>
    
@endsection