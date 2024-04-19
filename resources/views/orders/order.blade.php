@extends('layouts.app')

@section('title','Order Mobil')
@section('content')
<div class="container">
    <form action="{{url("order/$car->id")}}" method="POST">
        <div class="row mt-5 pt-3">
            @csrf
            <div class="col-md-7">
                <img src="{{asset("images/$car->image")}}" alt="" class="image-car-order">
            </div>
            <div class="col-md-5">
                <div class="card w-100">
                    <div class="card-body">
                        <h4 class="card-title text-center">Form Pemesanan</h4>
                        <hr>
                        <input class="d-none" type="number" name="harga" value="{{$car->harga}}">
                        <table class="w-100">
                            <tr>
                                <td class="py-2">
                                    <h4 class="card-text">Harga</h4>
                                </td>
                                <td class="py-2">
                                    <h4 class="card-text">:</h4>
                                </td>
                                <td class="py-2">
                                    <h4 class="card-text hargasewa">Rp {{number_format($car->harga, 0, ',','.')}},00</h4>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2">
                                    <p class="card-text">Unit</p>
                                </td>
                                <td class="py-2">:</td>
                                <td class="py-2">
                                    <p class="card-text">{{$car->merk}} {{$car->type}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2">
                                    <p class="card-text">Tahun</p>
                                </td>
                                <td class="py-2">:</td>
                                <td class="py-2">
                                    <p class="card-text">{{$car->tahun}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2">
                                    <p class="card-text">Transmisi</p>
                                </td>
                                <td class="py-2">:</td>
                                <td class="py-2">
                                    <p class="card-text">{{$car->transmisi}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2">
                                    <p class="card-text">Bahan Bakar</p>
                                </td>
                                <td class="py-2">:</td>
                                <td class="py-2">
                                    <p class="card-text">{{$car->bbm}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2">
                                    <p class="card-text">Jumlah Penumpang</p>
                                </td>
                                <td class="py-2">:</td>
                                <td class="py-2">
                                    <p class="card-text">{{$car->jml_penumpang}}</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center my-3 px-2">
                            <table>
                                <tr>
                                    <td class="py-2">
                                        <label for="nama_pelanggan" class="card-text">Nama Pelanggan</label>
                                    </td>
                                    <td class="py-2">:</td>
                                    <td class="py-2">
                                        <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">
                                        <label for="telp" class="card-text">No Whatsapp</label>
                                    </td>
                                    <td class="py-2">:</td>
                                    <td class="py-2">
                                        <input type="number" name="telp" id="telp" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">
                                        <label for="ktp" class="card-text">No KTP</label>
                                    </td>
                                    <td class="py-2">:</td>
                                    <td class="py-2">
                                        <input type="number" name="ktp" id="ktp" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">
                                        <label for="alamat" class="card-text">Alamat</label>
                                    </td>
                                    <td class="py-2">:</td>
                                    <td class="py-2">
                                        <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">
                                        <label for="catatan" class="card-text">Catatan</label>
                                    </td>
                                    <td class="py-2">:</td>
                                    <td class="py-2">
                                        <textarea name="catatan" id="catatan" cols="30" rows="4" class="form-control"></textarea>
                                    </td>
                                </tr>


                            </table>
                        </div>
                        <div class="col-md-6 d-flex justify-content-center my-3">
                            <table>
                                <tr>
                                    <td class="py-2">
                                        <label for="" class="form-label">Layanan</label>
                                    </td>
                                    <td class="py-2">:</td>
                                    <td class="d-flex align-content-center justify-content-center py-2 pt-3 mt-4">
                                        <div onclick="layanan(0)">
                                            <input type="radio" name="layanan" class="form-check-input" value="Mobil Saja" id="mobil">
                                        </div>
                                        <label for="mobil" class="form-check-label"> Mobil Saja</label>
                                        <div onclick="layanan(1)">
                                            <input type="radio" name="layanan" class="form-check-input" value="Dengan Supir" id="supir">
                                        </div>
                                        <label for="supir" class="form-check-label"> Dengan Supir</label>
                                        <div onclick="layanan(2)">
                                            <input type="radio" name="layanan" class="form-check-input" value="All In" id="allin">
                                        </div>
                                        <label for="allin" class="form-check-label"> All In</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">
                                        <label for="tujuan" class="card-text">Tujuan</label>
                                    </td>
                                    <td class="py-2">:</td>
                                    <td class="py-2">
                                        <input type="text" name="tujuan" id="tujuan" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">
                                        <label for="tgl_sewa" class="form-label">Mulai Sewa</label>
                                    </td>
                                    <td class="py-2">:</td>
                                    <td class="py-2">
                                        <input type="date" name="tgl_sewa" id="tgl_sewa" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">
                                        <label for="lama_sewa" class="card-text">Lama Sewa (Hari)</label>
                                    </td>
                                    <td class="py-2">:</td>
                                    <td class="py-2">
                                        <input type="number" name="lama_sewa" id="lama_sewa" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="py-2">
                                        <button type="submit" class="btn btn-success w-100" name="order">Pesan Sekarang</button>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="{{asset("js/app.js")}}">

</script>
@endsection