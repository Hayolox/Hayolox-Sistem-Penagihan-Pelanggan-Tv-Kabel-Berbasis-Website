@extends('layouts.app')
@section('title', 'Tagihan Sukses')
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
              <h3 class="mb-0">Data Tagihan Sukses</h3>
            </div>

        <!-- Light table -->
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Np</th>
                <th scope="col">Nama</th>
                <th scope="col">No Hp</th>
                <th scope="col">Alamat </th>
                <th scope="col">Tgl Pembayaran</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($succes as $item)
              <tr>
                <th scope="row">{{ $item->user->Nomor_pelanggan }}</th>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->user->no_hp }}</td>
                <td>{{ $item->user->alamat }}</td>
                <td>{{ $item->created_at }}</td>
              </tr>
              @endforeach
            </tbody>
            {{ $succes->links() }}
          </table>
        </div>
      </div>
    </div>
  </div>



</div>
</div>

@endsection
