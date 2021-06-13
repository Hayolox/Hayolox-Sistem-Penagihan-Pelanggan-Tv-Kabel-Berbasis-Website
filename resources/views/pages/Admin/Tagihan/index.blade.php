@extends('layouts.app')
@section('title', 'Tagihan Tv Kabel')
@section('content')
    
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="{{ route('Tagihan.index') }}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="">Data Tagihan</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tables</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 d-flex justify-content-center">
          <button type="button"class="btn btn-sm btn-neutral text-center">
            <a href="{{ route('Tagihan.create') }}">Buat Tagihan</a>
          </button>
         
           <!-- Button trigger modal -->
           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
            Hapus Tagihan
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Yakin Untuk Menghapus Semua Tagihan?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
          
                <div class="modal-footer d-flex justify-content-center">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <form action="" class="form-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Yakin</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <button type="button"class="btn btn-sm btn-neutral text-center">
            <a href="{{ route('create-tahun') }}">Buat Tahun Tagihan</a>
          </button>
          <button  type="button"class="btn btn-sm btn-danger text-center">
            <a href="{{ route('delete-tahun') }}" class="text-white">Hapus Tahun Tagihan</a>
          </button>
          
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
              <h3 class="mb-0">Data Tagihan</h3>
            </div>

            <form class="form-inline mb-4" action="">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Tahun</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>2021</option>
                  <option>2022</option>
                  <option>2023</option>
                </select>
              </div>

              <div class="form-group ml-5">
                <label for="exampleFormControlSelect1">Bulan</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>Januari</option>
                  <option>februari</option>
                  <option>Mei</option>
                </select>
              </div>

              <div class="form-group ml-5">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              </div>
              
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search/Filter</button>
            </form>
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
                <th scope="col">Tahun </th>
                <th scope="col">Wa </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bills as $bill)
              <tr>
                <th scope="row">{{ $bill->user->Nomor_pelanggan }}</th>
                <td>{{ $bill->user->name }}</td>
                <td>{{ $bill->user->no_hp }}</td>
                <td>{{ $bill->user->tagihan }}</td>
                <td>{{ $bill->user->alamat }}</td>
                <td>{{ $bill->month->bulan}} | {{ $bill->year->tahun }}</td>
                <td>Rencana Wa</td>   
                @endforeach
                
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