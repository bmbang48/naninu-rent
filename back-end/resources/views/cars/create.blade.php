@extends('layouts.app')
@section('title','Tambah Mobil')
@section('content')
<div class="container">
    <form action="{{url('cars')}}" method="POST" enctype="multipart/form-data">
        <div class="row pt-5">
            <div class="col-md-6">
                @csrf
                <div class="form-group mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input type="text" name="merk" id="merk" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" name="type" id="type" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="text" name="tahun" id="tahun" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="jml_penumpang" class="form-label">Jumlah Penumpang</label>
                    <input type="number" name="jml_penumpang" id="jml_penumpang" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="transmisi" class="form-label">Transmisi</label>
                    <input type="text" name="transmisi" id="transmisi" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="bbm" class="form-label">Bahan Bakar</label>
                    <input type="text" name="bbm" id="bbm" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control">
                </div>
                <div class="card card-success">
                    <div class="card-header">
                        <div class="card-title">Upload Foto</div>
                    </div>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Tambah Mobil</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection