@extends('layouts.User')
@section('title', 'Bayar Tagihan')
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
                
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">ManuaL</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">VA</a>
                  </div>
                </nav>
                <div class="tab-content mt-2" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <form action="{{ route('proses-pembayaran',$bill->id) }}" method="POST">
                      @csrf
                      <div class="pl-lg-4">
                        <div class="row">
                          <div class="col-lg-12 text-center alert alert-info mt-2">
                              Tagihan anda bulan {{ $bill->month->bulan }} tahun {{ $bill->year->tahun }} sebesar Rp {{ number_format($bill->user->tagihan, 0, ',', '.')  }}
                          </div>
                          
                        </div>
                      </div>
                      <div class=" ml-4 justify-content-end">
                        <button type="submit" class="btn btn-primary ">Bayar tagihan sekarang</button>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                 
                </div>

               
              </div>
            </div>
           </div>
        
      </div>
    </div>
  </div>
  
  
 
</div>
</div>
    
@endsection