<?php

use Carbon\Carbon;

date_default_timezone_set('Asia/Jakarta');
$dateName = Carbon::now()->locale('id')->isoFormat('LL');
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
            padding-top: 20px;
        }

        td {
            padding: 0;
            text-align: left;
        }

        .rental-info {
            text-align: right;
            margin-bottom: 20px;
        }

        td.rental-info {
            padding-top: -200px;
        }

        td.rental-info h5 {
            line-height: 0px;
        }

        .title {
            padding-right: 0px;
            font-weight: bold;
        }

        span.time {
            text-align: right;
            padding-left: 120px;
        }

        .judul-table p {
            font-size: 14px;
            padding-top: 6px;
        }

        .judul-table {
            border-bottom: 1px solid black;
            border-top: 1px solid black;
        }

        p {
            line-height: 1px;
            font-size: 0.7rem;
        }

        .ketentuan {
            font-size: 0.7rem;
        }

        .ketentuan tr td:first-child {
            text-align: center;
            padding: 0 5px;
        }

        .kondisi td,
        .kondisi th {
            border-bottom: 1px solid black;
            border-right: 1px solid black;
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
            <td colspan="4" class="rental-info judul-table">
                <p style="text-align: center; padding-left:30px;"><span class="title" style="text-align: center;">BUKTI SEWA KENDARAAN</span>
                </p>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="padding-right: 0px;">
                <table class="table-child">
                    <tr>
                        <td>No KTP</td>
                        <td>:</td>
                        <td>{{$order->ktp}}</td>
                    </tr>
                    <tr>
                        <td>Nama Pelanggan</td>
                        <td>:</td>
                        <td>{{$order->nama_pelanggan}}</td>
                    </tr>
                    <tr>
                        <td>No Whatsapp</td>
                        <td>:</td>
                        <td>{{$order->telp}}</td>
                    </tr>
                    <tr>
                        <td>Tujuan</td>
                        <td>:</td>
                        <td>{{$order->tujuan}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td style="width: 240px;">{{$order->alamat}}</td>
                    </tr>

                </table>
            </td>
            <td>
                <table class="table-child" style="padding-right: 0px;">
                    <tr>
                        <td>No Invoice</td>
                        <td>:</td>
                        <td>
                            {{$order->invoice}}
                        </td>
                    </tr>
                    <tr>
                        <td>Unit</td>
                        <td>:</td>
                        <td>
                            {{$car->merk}} {{$car->type}}
                        </td>
                    </tr>
                    <tr>
                        <td>No Polisi</td>
                        <td>:</td>
                        <td>
                            {{$order->nopol}}
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Sewa</td>
                        <td>:</td>
                        <td>
                            <?php
                            $newDate = date("d/m/Y", strtotime($order->mulai_sewa));
                            echo $newDate;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Selesai Sewa</td>
                        <td>:</td>
                        <td>
                            <?php
                            $newDate2 = date("d/m/Y", strtotime($order->selesai_sewa));
                            echo $newDate2;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>:</td>
                        <td>
                            Rp {{number_format($order->total_harga, 0, ',','.')}},00
                        </td>
                    </tr>
                    <tr>
                        <td>Catatan Pelanggan</td>
                        <td>:</td>
                        <td>{{$order->catatan}}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center; padding-left:39px;" class="judul-table">
                <p class="title">KETENTUAN SEWA MOBIL</p>
            </td>
        </tr>
    </table>
    <table style="border-bottom: 1px solid black;" class="ketentuan">
        <tr>
            <td style="width:360px;">
                <table>
                    <tr>
                        <td>1</td>
                        <td>Penyewa tidak boleh memindah tangankan mobil yang disewa kepada pihak lain.</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Segala kerusakan selama disewa menjadi tanggung jawab penyewa dan akan dikenakan denda sesuai kerusakan</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td rowspan="2">Apabila terjadi kecelakaan atau mobil hilang, maka sepenuhnya menjadi tanggung jawab penyewa.</td>
                    </tr>
                </table>
            </td>
            <td>
                <table>
                    <tr>
                        <td>4</td>
                        <td>Kelebihan waktu dikenakan biaya 10% /jam</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Lewat dari 6 (enam) jam akan dihitung 1 (satu) hari.</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Pembatalan sewa mobil dihitung 5 (lima) jam dari harga sewa.</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>
                            Penyewa bersedia menaati semua ketentuan dengan menandatangani lembaran ini. tanpa adanya paksaan dari pihak manapun.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center; padding-left:39px;" class="judul-table">
                <p class="title">BODY MOBIL</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <img src="{{public_path("images/sketsa.jpg")}}" alt="" width="100%" height="240px">
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center; padding-left:39px; " class="judul-table">
                <p class="title">KONDISI KENDARAAN</p>
            </td>
        </tr>
        <tr>
            <td style="width:360px; border-bottom: 1px solid black;" class="ketentuan kondisi">
                <table>
                    <tr>
                        <th>NO</th>
                        <th style="padding-right:210px; padding-left:-20px;">BAGIAN</th>
                        <th>B</th>
                        <th>R</th>
                        <th>H</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Starter</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Lampu Utama</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Lampu Rem</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Lampu Mundur</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Power Window</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>AC</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Central Lock</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Safety Belt / Sabuk Pengaman</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </td>
            <td class="ketentuan kondisi" style="border-bottom: 1px solid black;">
                <table>
                    <tr>
                        <th>NO</th>
                        <th style="padding-right:210px; padding-left:-20px;">BAGIAN</th>
                        <th>B</th>
                        <th>R</th>
                        <th>H</th>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Apar / Pemadam Api</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Karpet Dasar</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Elektrik Mirror</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Ban Serep dan Kunci Roda</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>Wiper Depan</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>Wiper Belakang</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>Dongkrak & Gagangnya</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>Emblem/Sticker</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td style="padding: 0px; padding-right:180px;">
                <p style="text-align: center; padding-bottom: 60px;">Mengetahui</p>
                <p style="text-align: center;">PENYEWA</p>
                <p style="text-align: center;">{{$order->nama_pelanggan}}</p>
            </td>
            <td style="padding-left: 80px; padding-top:5px;">

                <p style="text-align: center;">Jakarta : <?php echo $dateName; ?></p>
                <img src="{{public_path("images/logo.png")}}" alt="" width="150px" height="60px" style="padding-left: 60px; opacity:50%;">
                <p style="text-align: center;">NANINU RENT</p>
                <p style="text-align: center;">...............</p>
            </td>
        </tr>
    </table>

</body>

</html>