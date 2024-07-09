<?php

$harga = $order->total_harga;
$lama_sewa = $order->lama_sewa;
$overtime = $order->overtime;
$harga_overtime = (int) ($harga / $lama_sewa / 10) * $overtime;
$total_harga = (int) $harga + $harga_overtime;
?>

<html>

<head>
    <title>Cetak Status Order</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .container {
            border-bottom: 1px dashed black;
        }

        .table-head {
            width: 100%;
        }

        .table-head {

            margin-top: -25px;
        }

        .table-child {
            margin-top: -20px;
        }

        .table-head-3 {
            margin-top: -15px;
            margin-bottom: -10px;
        }

        .table-child {
            width: 100%;
            border: 1px solid black;
        }

        td {
            padding: 0;
            text-align: left;
        }

        .table-child td {
            /* border: 1px solid black; */
            border-spacing: 0px;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            font-size: 14px;
        }

        .table-child th {
            border-spacing: 0px;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
        }

        .table-child td:first-child {
            text-align: center;
        }

        .table-child td:last-child,
        .table-child th:last-child {
            border-right: none;
        }

        .table-child tr:last-child td {
            border-bottom: none;
        }


        .table .text-bg-primary {
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

        .title {
            text-align: center;
        }

        p {
            line-height: 1px;
            font-size: 0.7rem;
        }

        td span {
            position: relative;
            right: -9px;
        }

        td.overtime span {
            right: -19px;
        }
    </style>
</head>

<body>
    <table class="table-head">
        <tr>
            <td>
                <img src="{{public_path("images/logo.png")}}" alt="" width="200px" height="90px">
            </td>
            <td colspan="3">
                <div class="rental-info">
                    <h5>NANINU RENT</h5>
                    <!-- <small>Jakarta</small> -->
                    <p>Jln. Mampang Prapatan V No.70 Rt009/Rw006, Jakarta Selatan, 12790</p>
                    <p>Phone : 021-79182997, 0858-8275-9455, 0899-5395-345</p>
                    <p>E-Mail : naninurent@gmail.com</p>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                Nama : {{$order->nama_pelanggan}}
            </td>
            <td colspan="2">
                <h5 class="title">KWITANSI</h5>
            </td>
            <td class="rental-info">
                Jakarta : <?php echo (new \DateTime())->format('d/m/Y'); ?>
            </td>
        </tr>
    </table>
    <table class="table-child">
        <tr>
            <th>NO</th>
            <th colspan="3">KETERANGAN KENDARAAN</th>
            <th>JUMLAH</th>
        </tr>
        <tr>
            <td>1</td>
            <td colspan="2">MERK KENDARAAN</td>

            <td>
                : {{$car->merk}} {{$car->type}}
            </td>
            <td> </td>
        </tr>
        <tr>
            <td>2</td>
            <td colspan="2">NO POLISI</td>

            <td>
                : {{$order->nopol}}
            </td>
            <td></td>
        </tr>
        <tr>
            <td>3</td>
            <td colspan="2">TUJUAN</td>

            <td>
                : {{$order->tujuan}}
            </td>
            <td></td>
        </tr>
        <tr>
            <td>4</td>
            <td colspan="2">TANGGAL SEWA</td>

            <td>
                : <?php
                    $newDate = date("d/m/Y", strtotime($order->mulai_sewa));
                    echo $newDate;
                    ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>5</td>
            <td colspan="2">SELESAI SEWA</td>

            <td>
                : <?php
                    $newDate2 = date("d/m/Y", strtotime($order->selesai_sewa));
                    echo $newDate2;
                    ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>6</td>
            <td colspan="2">HARGA SEWA</td>

            <td>:</td>
            <td>Rp. <span>{{number_format($order->total_harga, 0, ',','.')}},00</span>
            </td>
        </tr>
        <tr>
            <td>7</td>
            <td colspan="2">OVERTIME</td>

            <td>
                @if($overtime!=0)
                {{$overtime}} JAM x 10% DARI HARGA SEWA KENDARAAN PER 1 (SATU) JAM
                @else
                10% DARI HARGA SEWA KENDARAAN PER 1 (SATU) JAM
                @endif
            </td>
            @if($overtime!=0)
            <td class="overtime">Rp. <span>{{number_format($harga_overtime, 0, ',','.')}},00</span></td>
            @else
            <td class="overtime">Rp. </td>
            @endif
        </tr>
        <tr>
            <td></td>
            <td colspan="2"></td>
            <td>TOTAL</td>
            <td>Rp. <span>{{number_format($total_harga, 0, ',','.')}},00</span></td>
        </tr>
    </table>
    <table class="table-head-2">
        <tr>
            <td>NB : DILUAR TOL, PARKIR, BBM, MAKAN DRIVER</td>
        </tr>
    </table>
    <table class="table-head-3">
        <tr>
            <td style="padding: 0px; padding-left:30px;">
                <h5 style="text-align: center; padding-bottom: 65px;">PENYEWA</h5>
                <h5 style="text-align: center;">{{$order->nama_pelanggan}}</h5>
            </td>
            <td style="padding-left: 480px;">
                <h5 style="text-align: center;">NANINU RENT</h5>
                <img src="{{public_path("images/logo.png")}}" alt="" width="150px" height="65px" style="padding-left: 30px; opacity:50%;">
                <h5 style="text-align: center;">...............</h5>
            </td>

        </tr>
    </table>
</body>

</html>