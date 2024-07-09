@extends('layouts.app')
@section('title','Edit Mobil')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-4 fs-1">
            <h3 class="text-dark">Ubah Data Mobil</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12 my-3">
            <a class="btn btn-primary" href="{{url("manage_cars")}}">Kelola Mobil</a>
        </div>
    </div>
    <form action='{{url("cars/$car->id")}}' method="POST" enctype="multipart/form-data">
        <div class="row pt-2">
            <div class="col-md-6">
                @method(' PATCH')
                @csrf
                <div class="form-group mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input type="text" name="merk" id="merk" class="form-control" value="{{$car->merk}}">
                </div>
                <div class="form-group mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" name="type" id="type" class="form-control" value="{{$car->type}}">
                </div>
                <div class="form-group mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="text" name="tahun" id="tahun" class="form-control" value="{{$car->tahun}}">
                </div>
                <div class="form-group mb-3">
                    <label for="jml_penumpang" class="form-label">Jumlah Penumpang</label>
                    <input type="number" name="jml_penumpang" id="jml_penumpang" class="form-control" value="{{$car->jml_penumpang}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="transmisi" class="form-label">Transmisi</label>
                    <input type="text" name="transmisi" id="transmisi" class="form-control" value="{{$car->transmisi}}">
                </div>
                <div class="form-group mb-3">
                    <label for="bbm" class="form-label">Bahan Bakar</label>
                    <input type="text" name="bbm" id="bbm" class="form-control" value="{{$car->bbm}}">
                </div>
                <div class="form-group mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" value="{{$car->harga}}">
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-title">Upload Foto</div>
                    </div>
                    <img src="{{asset("images/$car->image")}}" alt="" width=50px>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Ubah Mobil</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection