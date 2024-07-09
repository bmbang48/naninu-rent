@extends('layouts.app')

@section('title','Kelola Data Order')
@section('content')

<div class="container-fluid px-3">
    <h1>Kelola Data Order</h1>
    <div class="row">
        <div class="col-md-9">
            <form action="{{url("orders/cetak_transaksi")}}" method="GET">
                <div class="row">
                    <div class="col-md-3">
                        <label for="dari_tanggal">Dari Tanggal</label>
                        <input type="date" name="dari_tanggal" id="dari_tanggal" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="sampai_tanggal">Sampai Tanggal</label>
                        <input type="date" name="sampai_tanggal" id="sampai_tanggal" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-danger mt-4">Cetak PDF</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3">
            <form class="col-12 me-3 col-lg-auto mb-3 mb-lg-0 d-flex px-5 p-lg-0" role="search" action="{{url("orders/search")}}" method="GET">
                <input type="search" class="form-control" name="keyword" placeholder="Cari Order..." aria-label="Search">
                <button type="submit" class="btn btn-success">Cari</button>
            </form>
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
                            Detail
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
    {{$orders->withQueryString()->links('pagination::bootstrap-5')}}
</div>

@endsection