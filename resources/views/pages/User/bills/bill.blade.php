@if (Auth::user()->created_at == Auth::user()->updated_at)
    <a href="{{ route('profil-user', Auth::user()->id) }}" class="btn btn-danger d-flex justify-content-center h-10">
        Di karenakan anda pertama kali login. Klik text ini untuk ganti password
    </a>
@else
@extends('layouts.user')
@section('title', 'Tagihan')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
              @if ($bill>0)
                <h6 class="h2 text-white d-inline-block mb-0">Tagihan Anda</h6>
              @else
                <h6 class="h2 text-white d-inline-block mb-0">Anda tidak mempunyai tagihan </h6>
              @endif
          </div>
        </div>
        <!-- Card stats -->
        <div class="row justify-content-center">


            @forelse ($bills as $bill)
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body bg-danger">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-white mb-0">{{ $bill->month->bulan }}  {{ $bill->year->tahun }}</h5>
                        <span class="h2 font-weight-bold text-white mb-0">{{ number_format($bill->user->tagihan, 0, ',', '.') }}</span>
                      </div>

                      <div class="col-auto">
                             <!-- Button trigger modal -->
                        <a href="{{route('tagihan-manual',$bill->id)}}" class="btn btn-info">Bayar</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            @empty

            @endforelse
        </div>
      </div>
    </div>
  </div>


@endsection
@endif
