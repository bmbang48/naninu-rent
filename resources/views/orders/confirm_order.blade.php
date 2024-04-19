@extends('layouts.app')
@section('title','Konfirmasi Pembayaran')
@section('content')

<div class="container">
    <div class="row pt-5">
        <div class="col-12 mt-5 d-flex align-items-start justify-content-start">
            <img src="{{asset("images/$car->image")}}" alt="" width="250px">
            <div class="d-flex">
                <div class="description px-5">
                    <table>
                        <tr>
                            <td class="p-2">No Invoice</td>
                            <td class="p-2">:</td>
                            <td class="p-2">
                                {{$order->invoice}}
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2">Unit</td>
                            <td class="p-2">:</td>
                            <td class="p-2">
                                {{$car->merk}} {{$car->type}}
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2">Tanggal Sewa</td>
                            <td class="p-2">:</td>
                            <td class="p-2">
                                {{$order->mulai_sewa}}
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2">Lama Sewa</td>
                            <td class="p-2">:</td>
                            <td class="p-2">
                                {{$order->lama_sewa}} Hari ({{$order->layanan}})
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2">Total Harga</td>
                            <td class="p-2">:</td>
                            <td class="p-2">
                                Rp {{number_format($order->total_harga, 0, ',','.')}},00
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="description">
                    <table>
                        <tr>
                            <td class="p-2">No KTP</td>
                            <td class="p-2">:</td>
                            <td class="p-2">{{$order->ktp}}</td>
                        </tr>
                        <tr>
                            <td class="p-2">Nama Pelanggan</td>
                            <td class="p-2">:</td>
                            <td class="p-2">{{$order->nama_pelanggan}}</td>
                        </tr>
                        <tr>
                            <td class="p-2">No Whatsapp</td>
                            <td class="p-2">:</td>
                            <td class="p-2">{{$order->telp}}</td>
                        </tr>
                        <tr>
                            <td class="p-2">Alamat</td>
                            <td class="p-2">:</td>
                            <td class="p-2">{{$order->alamat}}</td>
                        </tr>
                        <tr>
                            <td class="p-2">Tujuan</td>
                            <td class="p-2">:</td>
                            <td class="p-2">{{$order->tujuan}}</td>
                        </tr>
                        <tr>
                            <td class="p-2">Catatan Pelanggan</td>
                            <td class="p-2">:</td>
                            <td class="p-2">{{$order->catatan}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex">
        <h5>* Untuk proses lebih lanjut harap lakukan pembayaran minimal 50% dari Total Harga</h5>
        <h5 class="metode-bayar">"Lakukan pembayaran dengan metode Transfer ke rekening Mandiri <span class="badge rounded-pill text-bg-primary">1290013167776</span> A/N Bambang Satmoto"</h5>
        <form action="{{url("confirm_order/$order->id")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 px-lg-3">
                    <div class="form-group mb-3">
                        <label for="bayar" class="form-label">Bayar</label>
                        <input type="number" name="bayar" id="bayar" class="form-control">
                    </div>
                    <div class=" form-group ">
                        <label for="bukti_bayar" class="form-label">Upload Bukti Pembayaran</label>
                        <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group d-flex justify-content-end pt-3">
                        <button type="submit" name="confirm" class="btn btn-success">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection