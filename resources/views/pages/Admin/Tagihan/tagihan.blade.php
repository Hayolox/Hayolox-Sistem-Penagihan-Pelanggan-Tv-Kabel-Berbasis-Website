@extends('layouts.app')
@section('title', 'Tagihan Tv Kabel')
@section('content')
    

    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form class="mt-4" action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Tahun</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                      <option>2021</option>
                                      <option>2022</option>
                                      <option>2023</option>
                                      <option>2024</option>
                                      <option>2025/option>
                                    </select>
                                  </div> 
                            </div>   
    
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Bulan</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                      <option>2021</option>
                                      <option>2022</option>
                                      <option>2023</option>
                                      <option>2024</option>
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