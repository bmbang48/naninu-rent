@extends('layouts.app')

@section('title','Kelola Data Order')
@section('content')

<div class="container-fluid px-3">
    <h1>Kelola Data Mobil</h1>
    <div class="row">
        <div class="col-12">
            <a href="{{url("orders/cetak_pdf")}}" class="btn btn-danger">Cetak PDF</a>
        </div>
    </div>
    <table class="w-100">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Invoice</th>
                <th>No Polisi</th>
                <th>Unit</th>
                <th>Nama</th>
                <th>KTP</th>
                <th>Telp</th>
                <th>Alamat</th>
                <th>Catatan</th>
                <th>Layanan</th>
                <th>Tujuan</th>
                <th>Mulai Sewa</th>
                <th>Lama Sewa</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php($number=1)
            @foreach($orders as $order)
            <tr>
                <td>{{$number}}</td>
                <td>{{$order->invoice}}</td>
                <td>{{$order->nopol}}</td>
                <td>{{$order->merk}} {{$order->type}}</td>
                <td>{{$order->nama_pelanggan}}</td>
                <td>{{$order->ktp}}</td>
                <td>{{$order->telp}}</td>
                <td>{{$order->alamat}}</td>
                <td>{{$order->catatan}}</td>
                <td>{{$order->layanan}}</td>
                <td>{{$order->tujuan}}</td>
                <td>{{$order->mulai_sewa}}</td>
                <td class="text-center">{{$order->lama_sewa}}</td>
                <td>{{$order->total_harga}}</td>
                <td>{{$order->status}}</td>

                <td class="d-flex">
                    <a href="{{url("order/$order->id/edit")}}" class="text-decoration-none">
                        <button class="badge text-bg-primary">
                            Ubah
                        </button>
                    </a> |
                    <form action="{{url("order/$order->id")}}" method="POST">
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