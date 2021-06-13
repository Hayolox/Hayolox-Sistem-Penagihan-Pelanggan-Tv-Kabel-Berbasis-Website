@extends('layouts.app')
@section('title', 'Tagihan Tv Kabel')
@section('content')
    

    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form class="mt-4" action="{{ route('Tagihan.store') }}" method="POST">
                        @csrf
                        <div class="row ml-3">
                            
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="Bulan">Tahun</label>
                                    <select name="tahun" class="form-control" id="Bulan">
                                      <option selected>Pilih Thun</option>
                                      @foreach ($years as $year)
                                    <option value="{{ $year->id }}">{{ $year->tahun }}</option>   
                                      @endforeach
                                    </select>
                                  </div> 
                            </div>  
                            
                            
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Bulan</label>
                                    <select name="bulan" class="form-control" id="exampleFormControlSelect1">
                                      <option selected>Pilih Bulan</option>
                                      @foreach ($months as $month)
                                    <option value="{{ $month->id }}">{{ $month->bulan }}</option>   
                                      @endforeach
                                    </select>
                                  </div> 
                            </div>   
    
                         

                            <div class="col-3" style="margin-top: 34px">
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
@endsection