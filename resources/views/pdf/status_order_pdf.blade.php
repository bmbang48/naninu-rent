<html>

<head>
    <title>Cetak Status Order</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .d-flex {
            display: flex;
            flex-direction: column;
        }

        .text-bg-primary {
            background-color: blue;
            color: white;
        }

        .text-bg-warning {
            background-color: warning;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container pt-5">
        <table>
            <tr>
                <td>
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
                            @if($order->status=='Dibayar')
                            <tr>
                                <td class="p-2">Bayar</td>
                                <td class="p-2">:</td>
                                <td class="p-2">
                                    Rp {{number_format($confirm->bayar, 0, ',','.')}},00
                                </td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </td>
                <td>
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
        </table>
    </div>
</body>

</html>