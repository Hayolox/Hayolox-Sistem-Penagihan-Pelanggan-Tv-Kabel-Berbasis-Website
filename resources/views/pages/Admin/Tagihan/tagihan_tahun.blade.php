@extends('layouts.app')
@section('title', 'Tagihan Tahun')
@section('content')
    

    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col">
                    @if ($errors->any())
                    <div class="alert alert-danger mt-2 mb-2">
                            @foreach ($errors->all() as $error)
                               {{ $error }}
                            @endforeach
                    </div>
                    @endif
                    <form class="mt-4" action="{{ route('store-tahun') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="tahun">Tambahkan Tahun</label>
                                    <input class="form-control" type="text" name="tahun" id="tahun" placeholder="contoh 2050">
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