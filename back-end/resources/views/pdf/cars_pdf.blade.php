<html>

<head>
    <title>Cetak</title>
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

    <div class="container">
        <h1>Data Mobil</h1>
        <h5 style="text-align: right; padding-right:50px;">Jakarta : <?php echo (new \DateTime())->format('d/m/Y'); ?></h5>
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
                </tr>
            </thead>
            <tbody>
                @php($number=1)
                @foreach($cars as $car)
                <tr>
                    <td>{{$number}}</td>
                    <td>
                        <img src="{{public_path("images/$car->image")}}" alt="naninu_picture" width="70px">
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
                </tr>
                @php($number++)
                @endforeach
            </tbody>
        </table>
    </div>


</body>

</html>