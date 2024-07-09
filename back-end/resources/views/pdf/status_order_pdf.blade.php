<html>

<head>
    <title>Cetak Status Order</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .container {
            padding-left: 20px;
        }

        .table-child {
            padding-left: 20px;
        }

        img {
            padding-left: 20px;
        }

        .text-bg-primary {
            background-color: blue;
            color: white;
        }

        .text-bg-warning {
            background-color: warning;
            color: white;
        }

        .rental-info {
            text-align: right;
            margin-bottom: 20px;
        }

        p {
            line-height: 1px;
            font-size: 0.7rem;
        }

        .rental-info h5 {
            line-height: 0px;
            padding-bottom: 0;
        }

        small {
            line-height: 0px;
        }
    </style>
</head>

<body>
    <div class="container">
        <table>
            <tr>
                <td>
                    <div class="description px-5">
                        <img src="{{public_path("images/logo.png")}}" alt="" width="200px" height="90px">
                        <table class="table-child">
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
                                    {{$order->lama_sewa}} Hari
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
                </td>
                <td>
                    <div class="description">
                        <div class="rental-info">
                            <h5>NANINU RENT</h5>
                            <!-- <small>Jakarta</small> -->
                            <p>Jln. Mampang Prapatan V No.70 Rt009/Rw006, Jakarta Selatan, 12790</p>
                            <p>Phone : 021-79182997, 0858-8275-9455, 0899-5395-345</p>
                            <p>E-Mail : naninurent@gmail.com</p>
                        </div>
                        <table class="table-child">
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
                                <td class="p-2" style="width: 250px;">{{$order->alamat}}</td>
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
                            <tr>
                                <td class="p-2">Status Order</td>
                                <td class="p-2">:</td>
                                <td class="p-2">
                                    @if($order->status=='Dibayar')
                                    <span class="badge rounded-pill text-bg-primary">{{$order->status}}</span>
                                    @elseif($order->status=='Belum Dibayar')
                                    <span class="badge rounded-pill text-bg-warning">{{$order->status}}</span>
                                    @endif
                                </td>
                            </tr>
                            @if($order->status=='Belum Dibayar')
                            <tr>
                                <td class="p-2" colspan="3">
                                    <a href="{{url("confirm_order/$order->invoice")}}" class="btn btn-dark">Bayar Order</a>
                                </td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="padding-left: 40px; color:green;" colspan="2">
                    <h5>* Harap menunjukan bukti pembayaran untuk pengambilan unit mobil.</h5>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>