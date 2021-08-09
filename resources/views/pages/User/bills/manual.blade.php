@if (Auth::user()->created_at == Auth::user()->updated_at && Auth::user()->roles == "USERS")
<a href="{{ route('profil-user', Auth::user()->id) }}" class="btn btn-danger d-flex justify-content-center h-10">
    Di karenakan anda pertama kali login. Klik text ini untuk ganti password
</a>
@else
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
                      <div class="pl-lg-4 ">
                        <div class="row">
                          <div class="col-d-3 col-md-6 mt-3">
                            <div class="card" style="width: 18rem;" >
                              <div class="card-body">
                                <h1 class="card-title">Informasi Penting</h1>
                                <h3 class="card-text">Di pastikan anda tranfer terlebih dahulu sebelum melakukan proses "konfirmasi pembayaran"</h3>
                                <h3 class="card-text">Proses konfirmasi pembayaran tagihan akan membutuhkan waktu sekitar 20 menit (dari pesan WhatsApp dikirim). Mohon menunggu dengan sabar dan terima kasih</h3>


                                <h1 class="card-title mt-2">Ada kendala? silahkan hubungi kami</h1>
                                <h3 class="card-text">No. WhatsApp 0812*******</h3>
                              </div>
                            </div>
                          </div>

                          <div class="col-d-3 col-md-6 mt-3">
                            <div class="card" style="width: 18rem;" >
                              <div class="card-body">
                                <h1 class="card-title">Tagihan Anda</h1>
                                <h3 class="card-text">Bulan {{ $bill->month->bulan }}</h3>
                                <h3 class="card-text">tahun {{ $bill->year->tahun }}</h3>
                                <p class="card-text">Sebesar Rp {{ number_format ($bill->user->tagihan, 0, ',', '.')  }}</p>
                                <h1 class="card-title">Transfer Pembayaran </h1>
                                <img src="{{ asset('logo/logo_bank.png') }}" alt="Logo Bank Bri" style="height: 50px">
                                <h4 class="card-text">4271284635</h4>
                                <h3 class="card-text">PT Akil Sejahtera</h3>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                      <div class=" ml-4" style="margin-inline-end: ">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                          Konfirmasi Pembayaran
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Apakah anda sudah melakukan pembayaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>

                              <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button class="btn btn-info">Sudah</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                   <div class="row">
                       <form action="{{ route('proses-pembayaran-va',$bill->id) }}" method="POST">
                        @csrf
                        <div class="col-d-3 col-md-6 mt-3">
                            <div class="card" style="width: 18rem;" >
                              <div class="card-body">
                                <h1 class="card-title">Tagihan Anda</h1>
                                <h3 class="card-text">Bulan {{ $bill->month->bulan }}</h3>
                                <h3 class="card-text">tahun {{ $bill->year->tahun }}</h3>
                                <p class="card-text">Sebesar Rp {{ number_format ($bill->user->tagihan, 0, ',', '.')  }}</p>
                                <h1 class="card-title">Transfer Pembayaran </h1>
                                <img src="{{ asset('logo/logo_bank.png') }}" alt="Logo Bank Bri" style="height: 50px">
                                <h4 class="card-text">4271284635</h4>
                                <h3 class="card-text">PT Akil Sejahtera</h3>
                                <button type="submit" class="btn btn-info mt-2">Bayar Sekarang</button>
                              </div>
                            </div>
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
  </div>
</div>
</div>
@endsection
@endif
