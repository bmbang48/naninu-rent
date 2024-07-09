@extends('layouts.app')
<?php
// $harga = $order->harga;


?>
@section('title','Edit Order')
@section('content')
<div class="container pt-3">
    <div class="form-group my-3">
        <a class="btn btn-primary" href="{{url("manage_orders")}}">Kelola Order</a>
    </div>
    <div class="form-group my-3">
        <p>Status</p>
        @if($order->status=='Dibayar')
        <span class="badge rounded-pill text-bg-primary">{{$order->status}}</span>
        <a href="{{url("orders/cetak_kwitansi/$order->id")}}" class="btn btn-success">Cetak Kwitansi</a>
        <a href="{{url("orders/cetak_checklist/$order->id")}}" class="btn btn-success">Cetak Checklist</a>
        @elseif($order->status=='Belum Dibayar')
        <span class="badge rounded-pill text-bg-warning">{{$order->status}}</span>
        <a href="{{url("confirm_order/$order->invoice")}}" class="text-decoration-none">
            <button class="badge text-bg-primary">
                Bayar ?
            </button></a>
        @endif
    </div>
    <form action="{{url('order/$order->id')}}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row pt-2">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="invoice" class="form-label">No Invoice</label>
                    <input type="hidden" name="invoice" id="invoice" class="form-control" value="{{$order->invoice}}">
                    <input type="text" name="invoice-2" id="invoice-2" class="form-control" value="{{$order->invoice}}" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="nopol" class="form-label">No Polisi</label>
                    <input type="text" name="nopol" id="nopol" class="form-control" value="{{$order->nopol}}">
                </div>
                <div class="form-group mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input type="text" name="merk" id="merk" class="form-control" value="{{$order->merk}}" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" name="type" id="type" class="form-control" value="{{$order->type}}" disabled>
                </div>

                <div class="form-group mb-4">
                    <label for="harga" class="form-label">Harga</label>
                    <?php
                    if ($order->layanan == "Mobil Saja") {
                        $harga = $order->harga;
                    } else if ($order->layanan == "Dengan Supir") {
                        $harga = $order->harga + 350000;
                    } else {
                        $harga = $order->harga + 950000;
                    }

                    ?>
                    <input type="number" name="harga" id="harga" class="form-control" value="{{$harga}}">
                </div>
                <input class="d-none" type="number" name="harga" value="{{$order->harga}}">
                <div class="form-group mb-3">
                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" value="{{$order->nama_pelanggan}}">
                </div>
                <div class="form-group mb-3">
                    <label for="ktp" class="form-label">No KTP</label>
                    <input type="text" name="ktp" id="ktp" class="form-control" value="{{$order->ktp}}">
                </div>
                <div class="form-group mb-3">
                    <label for="telp" class="form-label">Whatsapp</label>
                    <input type="number" name="telp" id="telp" class="form-control" value="{{$order->telp}}">
                </div>
                <div class="form-group mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" class="form-control" rows="5">{{$order->alamat}}</textarea>
                </div>
                <div class="form-check">
                    <div onclick="layananOrder(0)">
                        <input type="radio" name="layanan" class="form-check-input" value="Mobil Saja" id="mobil" <?php print ($order->layanan == 'Mobil Saja') ? "checked" : "" ?>>
                    </div>
                    <label for="mobil" class="form-check-label"> Mobil Saja</label>
                    <div onclick="layananOrder(1)">
                        <input type="radio" name="layanan" class="form-check-input" value="Dengan Supir" id="supir" <?php print ($order->layanan == 'Dengan Supir') ? "checked" : "" ?>>
                    </div>
                    <label for="supir" class="form-check-label"> Dengan Supir</label>
                    <div onclick="layananOrder(2)">
                        <input type="radio" name="layanan" class="form-check-input" value="All In" id="allin" <?php print ($order->layanan == 'All In') ? "checked" : "" ?>>
                    </div>
                    <label for="allin" class="form-check-label"> All In</label>
                </div>
                <div class="form-group mb-3">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <input type="text" name="tujuan" id="tujuan" class="form-control" value="{{$order->tujuan}}">
                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group mb-3">
                    <label for="tgl_sewa" class="form-label">Tanggal Sewa</label>
                    <input type="date" name="tgl_sewa" id="tgl_sewa" class="form-control" value="{{$order->mulai_sewa}}">
                </div>
                <div class="form-group mb-3">
                    <label for="selesai_sewa" class="form-label">Selesai Sewa</label>
                    <input type="date" name="selesai_sewa" id="selesai_sewa" class="form-control" value="{{$order->selesai_sewa}}">
                </div>
                <div class="form-group mb-3">
                    <label for="lama_sewa" class="form-label">Lama Sewa</label>
                    <input type="number" name="lama_sewa" class="lama_sewa form-control" value="{{$order->lama_sewa}}" oninput="hitung_total_harga()">
                    <p id="lama_sewa" class="mt-3 d-none">{{$order->lama_sewa}}</p>
                </div>
                <div class="form-group mb-3">
                    <label for="total_harga" class="form-label">Total Harga</label>
                    <input type="number" name="total_harga" id="total_harga" class="form-control" value="{{$order->total_harga}}">
                </div>
                <div class="form-group mb-3">
                    <label for="catatan" class="form-label">Catatan</label>
                    <textarea name="catatan" id="catatan" cols="30" class="form-control" rows="5">{{$order->catatan}}</textarea>
                </div>

                @if($order->status=='Dibayar')
                <div class="form-group mb-3">
                    <label for="overtime" class="form-label">Overtime</label>
                    <input type="number" name="overtime" id="overtime" class="form-control" value="{{$order->overtime}}">
                </div>
                <div class="form-group mb-3">
                    <label for="bayar" class="form-label">Bayar</label>
                    <input type="number" name="bayar" id="bayar" class="form-control" value="{{$order->bayar}}">
                </div>
                <div class="form-group mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" cols="30" class="form-control" rows="5">{{$order->keterangan}}</textarea>
                </div>
                <div class="form-group mb-3">
                    <img class="bukti_bayar thumbnails" src="{{asset("images/confirm_order/$order->bukti_bayar")}}">
                    <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control">
                </div>
                @endif
                <div class="form-group my-3">
                    <button type="submit" name="tambah" class="btn btn-success w-100">Simpan</button>
                </div>


            </div>
        </div>
    </form>

</div>
<script src="{{asset("js/app.js")}}"></script>

@endsection