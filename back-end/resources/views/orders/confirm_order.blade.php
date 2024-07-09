@extends('layouts.app')
@section('title','Konfirmasi Pembayaran')
@section('content')

<div class="container">
    <div class="row pt-5">
        <div class="col-12 mt-5 d-flex align-items-start justify-content-start">
            <img src="{{asset("images/$car->image")}}" alt="" width="250px">
            <div class="d-flex">
                <div class="description px-3">
                    <table>
                        <tr>
                            <td class="p-2">No Invoice</td>
                            <td class="p-2">:</td>
                            <td class="p-2">
                                <span class="invoice">{{$order->invoice}}</span>
                                <button style="border: none; background:transparent;"><span class="badge text-bg-dark" onclick="copy()">Copy</span></button>
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
                                <?php
                                $newDate = date("d/m/Y", strtotime($order->mulai_sewa));
                                echo $newDate;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2">Selesai Sewa</td>
                            <td class="p-2">:</td>
                            <td class="p-2">
                                <?php
                                $newDate2 = date("d/m/Y", strtotime($order->selesai_sewa));
                                echo $newDate2;
                                ?>
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
                            <td class="p-2" style="width:300px;">{{$order->alamat}}</td>
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
        <!-- <h5 class="metode-bayar">"Lakukan pembayaran dengan metode Transfer ke rekening Mandiri <span class="badge rounded-pill text-bg-primary rekening">1290013167776</span> <button style="border: none; background:transparent;"><span class="badge text-bg-dark btn-rekening" onclick="copyRekening()">Copy</span></button>A/N Bambang Satmoto"</h5> -->
        <h5 class="metode-bayar">"Lakukan pembayaran dengan memilih metode pembayaran yang tersedia"</h5>
        <!-- <form action="{{url("store_confirm_order/$order->id")}}" method="POST" enctype="multipart/form-data">
            @csrf -->
        <div class="col-12">
            <button type="button" name="confirm" class="btn btn-success w-100" id="pay-button">Bayar Sekarang</button>
        </div>
        <!-- </form> -->
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{env('MIDTRANS_CLIENT_KEY')}}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
        // SnapToken acquired from previous step
        snap.pay('<?= $order->snap_token ?>', {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                window.location.href = "{{route('store_confirm_order',['id' => $order->id]);}}";

            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
    };
</script>


@endsection