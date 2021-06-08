@extends('layouts.app')
@section('title', 'Verifikasi Tagihan')
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
              <h3 class="mb-0">Data Verifikasi Tagihan</h3>
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
                <th scope="col">Tahun</th>
                <th scope="col">Image </th>
                <th scope="col">Action </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">108</th>
                <td>Hizbullah Haidar Anis Al Wakil</td>
                <td>081253053581</td>
                <td>081253053581</td>
                <td>Rp 36.000</td>
                <td>Jl Beringin No 51</td>
                <td>  
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                    Verifikasi
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Yakin Untuk Verifikasi?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                  
                        <div class="modal-footer d-flex justify-content-center">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <form action="" class="form-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-info">Yakin</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>     
        </div>
      </div>
    </div>
  </div>
  

</div>
</div>
    
@endsection