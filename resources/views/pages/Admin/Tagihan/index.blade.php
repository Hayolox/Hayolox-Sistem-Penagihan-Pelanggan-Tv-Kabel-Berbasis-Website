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
              <li class="breadcrumb-item"><a href="{{ route('Tagihan.index') }}">Data Tagihan</a></li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 d-flex justify-content-center">
          <a href="{{ route('Tagihan.create') }}" class="btn btn-sm btn-info text-center" >Buat Tagihan</a>
          <a href="{{ route('create-tahun') }}" class="btn btn-sm btn-info text-center">Buat Tahun Tagihan</a>
          <a href="{{ route('delete-tahun') }}" class="btn btn-sm btn-danger text-center">Hapus Tahun Tagihan</a>
          
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
            <form class="form-inline mb-4" action="{{ route('Tagihan.index') }}" method="GET">
              <!-- Example single danger button -->
              <div class="btn-group">
                <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Bulan
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('Tagihan.index') }}">All</a>
                  @foreach ($months as $month)
                  <a class="dropdown-item" href="{{ route('tagihan-bulan',$month->id) }}">{{ $month->bulan }}</a>
                  @endforeach
                </div>
              </div>
              @csrf
              <div class="form-group ml-5 mr-3">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search Np" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </div>
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
                <th scope="row">{{ $bill->Nomor_pelanggan }}</th>
                <td>{{ $bill->name }}</td>
                <td>{{ $bill->no_hp }}</td>
                <td>{{ $bill->tagihan }}</td>
                <td>{{ $bill->alamat }}</td>
                <td>{{ $bill->bulan}} | {{ $bill->tahun }}</td>
                <td>
                  <form action="{{ route('Tagihan.update',$bill->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <button type="submit">
                      <i class="fab fa-whatsapp"></i>
                    </button>
                  </form>
                </td>   
                @endforeach  
              </tr>
              @if($bills instanceof \Illuminate\Pagination\LengthAwarePaginator )

              {{$bills->links()}}
           
           @endif
            </tbody>
          </table>     
        </div>
      </div>
    </div>
  </div>
  
  

</div>
</div>
    
@endsection