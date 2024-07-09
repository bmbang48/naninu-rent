<html>

<head>
    <title>Cetak Orders</title>
    <style>
        .container {
            width: 100%;
            display: flex;
            justify-content: center;
            text-align: center;
            padding-left: 2rem;
        }

        table {
            text-align: center;
            border: 1px solid black;
        }

        thead,
        td,
        th {
            border-bottom: 1px solid black;
            border-left: 1px solid black;
        }
    </style>
</head>

<body>
    <div class="container-fluid px-3">
        <h1>Data Order</h1>
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
                </tr>
                @php($number++)
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>