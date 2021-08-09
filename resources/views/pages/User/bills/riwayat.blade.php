@if (Auth::user()->created_at == Auth::user()->updated_at && Auth::user()->roles == "USERS")

@else
@extends('layouts.user')
@section('title', 'Tagihan')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Riwayat Pembayaran </h6>
          </div>
        </div>
        <!-- Card stats -->
        <div class="row justify-content-center">

          @foreach ($bills as $bill)
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body bg-info ">
                  <div class="row">
                    <div class="col text-dark">
                      <h5 class="card-title text-uppercase text-white mb-0">{{ $bill->month->bulan }}  {{ $bill->year->tahun }}</h5>
                      <span class="h2 font-weight-bold text-white mb-0">{{ number_format($bill->user->tagihan, 0, ',', '.') }}</span>
                    </div>

                    <div class="col-auto mt-2">
                          <!-- Button trigger modal -->
                      <p  class="btn btn-white text-dark">Pending</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

            @foreach ($succes as $succes)
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body bg-info ">
                    <div class="row">
                      <div class="col text-dark">
                        <h5 class="card-title text-uppercase text-white mb-0">{{ $succes->month->bulan }}  {{ $succes->year->tahun }}</h5>
                        <span class="h2 font-weight-bold text-white mb-0">{{ number_format($succes->user->tagihan, 0, ',', '.') }}</span>
                      </div>

                      <div class="col-auto mt-2">
                             <!-- Button trigger modal -->
                        <p  class="btn btn-white text-dark">{{ $succes->status }}</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>


@endsection

@endif
