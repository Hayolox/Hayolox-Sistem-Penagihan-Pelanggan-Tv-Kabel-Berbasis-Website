@extends('layouts.app')
@section('title', 'Tagihan Tahun')
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
                                    <label for="exampleFormControlSelect1">Tambahkan Tahun</label>
                                    <input class="form-control" type="text" name="" id="" placeholder="contoh 2050">
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