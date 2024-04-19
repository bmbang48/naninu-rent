@extends('layouts.app')

@section('title','Kelola Data Mobil')
@section('content')

<div class="container">
    <h1>Kelola Data Mobil</h1>
    <div class="row">
        <div class="col-12">
            @if(Auth::check())
            <a href="{{url("cars/create")}}" class="btn btn-dark">Tambah Mobil</a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{url("cars/cetak_pdf")}}" class="btn btn-danger">Cetak PDF</a>
        </div>
    </div>
    <table class="w-100">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Merk</th>
                <th>Type</th>
                <th>Tahun</th>
                <th>Penumpang</th>
                <th>Transmisi</th>
                <th>Bbm</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php($number=1)
            @foreach($cars as $car)
            <tr>
                <td>{{$number}}</td>
                <td>
                    <img src="{{asset("images/$car->image")}}" alt="naninu_picture" width="70px">
                </td>
                <td>{{$car->merk}}</td>
                <td>{{$car->type}}</td>
                <td>{{$car->tahun}}</td>
                <td>{{$car->jml_penumpang}}</td>
                <td>{{$car->transmisi}}</td>
                <td>{{$car->bbm}}</td>
                <td>{{$car->harga}}</td>
                <td>

                    @if($car->isActive==true)
                    Tersedia
                    @else
                    Tidak Tersedia
                    @endif

                </td>
                <td class="d-flex">
                    <a href="{{url("cars/$car->id/edit")}}" class="text-decoration-none">
                        <button class="badge text-bg-primary">
                            Ubah
                        </button>
                    </a> |
                    <form action="{{url("cars/$car->id")}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="badge text-bg-primary" onclick="return confirm('Yakin ingin hapus ?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @php($number++)
            @endforeach
        </tbody>
    </table>
</div>

@endsection