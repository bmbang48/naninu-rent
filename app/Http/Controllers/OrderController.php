<?php


namespace App\Http\Controllers;

require base_path('/vendor/autoload.php');

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Confirm_order;
use App\Models\Order;
use Dompdf\Dompdf;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use PDF;
use PHPJasper\PHPJasper;


class OrderController extends Controller
{
    //
    public function create($id)
    {
        $car = Car::where('id', $id)->first();
        $view_data = [
            'car' => $car
        ];

        return view('orders.order', $view_data);
    }

    public function store(Request $request, $id)
    {
        $car = Car::where('id', $id)->first();

        date_default_timezone_set('Asia/Jakarta');
        $invoice = date('Ymdhis', time());
        $nama_pelanggan = $request->input('nama_pelanggan');
        $ktp = $request->input('ktp');
        $telp = $request->input('telp');
        $alamat = $request->input('alamat');
        $harga = $request->input('harga');
        $catatan = $request->input('catatan');
        $layanan = $request->input('layanan');
        $tujuan = $request->input('tujuan');
        $tgl_sewa = $request->input('tgl_sewa');
        $lama_sewa = $request->input('lama_sewa');

        // dd($tgl_sewa);
        // $mulai_sewa = $request->input('mulai_sewa'->format('d-m-Y'));
        $lama_sewa = $request->input('lama_sewa');
        if ($layanan == 'Dengan Supir') {
            $total_harga = (int)$harga + 350000;
            $total_harga *= $lama_sewa;
        } else if ($layanan == 'All In') {
            $total_harga = (int)$harga + 950000;
            $total_harga *= $lama_sewa;
        } else if ($layanan == 'Mobil Saja') {
            $total_harga = (int)$harga;
            $total_harga *= $lama_sewa;
        }

        $data = [
            'car_id' => $car->id,
            'invoice' => $invoice,
            'nama_pelanggan' => $nama_pelanggan,
            'ktp' => $ktp,
            'telp' => $telp,
            'alamat' => $alamat,
            'catatan' => $catatan,
            'layanan' => $layanan,
            'tujuan' => $tujuan,
            'mulai_sewa' => $tgl_sewa,
            'lama_sewa' => $lama_sewa,
            'total_harga' => $total_harga
        ];

        // dd($data);
        Order::create($data);

        return redirect("confirm_order/{$invoice}");
        // 
    }

    public function confirm_order($id)
    {
        $order = Order::where('invoice', $id)->first();

        $car_id = $order->car_id;

        $car = Car::where('id', $car_id)->first();

        $view_data = [
            'order' => $order,
            'car' => $car
        ];
        return view('orders.confirm_order', $view_data);
    }

    public function store_confirm_order(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();
        $order_id = $order->id;

        $bayar = $request->input('bayar');
        $keterangan = $request->input('keterangan');

        if ($request->hasFile('bukti_bayar')) {
            $request->file('bukti_bayar')->move('images/confirm_order/', $order->invoice . ".jpg");
            $bukti_bayar = $order->invoice . ".jpg";
        }



        Confirm_order::create([
            'order_id' => $order_id,
            'bayar' => $bayar,
            'bukti_bayar' => $bukti_bayar,
            'keterangan' => $keterangan,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Order::where('id', $id)
            ->update([
                'status' => 'Dibayar'
            ]);

        return redirect("status_order/$order_id");
    }

    public function status_order($id)
    {
        $order = Order::where('id', $id)->first();
        $car_id = $order->car_id;
        $car = Car::where('id', $car_id)->first();
        if ($order->status == "Dibayar") {
            $confirm = Confirm_order::where('order_id', $id)->first();

            $view_data = [
                'order' => $order,
                'confirm' => $confirm,
                'car' => $car
            ];
        } else {
            $view_data = [
                'order' => $order,
                'car' => $car
            ];
        }
        return view('orders.status_order', $view_data);
    }

    public function manage_orders()
    {
        $orders = Confirm_order::rightJoin('orders', 'orders.id', '=', 'confirm_orders.order_id')
            ->join('cars', 'cars.id', '=', 'orders.car_id')
            ->select('confirm_orders.*', 'orders.*', 'cars.merk', 'cars.type', 'cars.harga')
            ->get();

        $view_data = [
            'orders' => $orders
        ];

        return view('orders.manage', $view_data);
    }

    public function edit($id)
    {
        $order = Confirm_order::rightJoin('orders', 'orders.id', '=', 'confirm_orders.order_id')
            ->join('cars', 'cars.id', '=', 'orders.car_id')
            ->select('confirm_orders.*', 'orders.*', 'cars.merk', 'cars.type', 'cars.harga')
            ->where('orders.id', '=', $id)->first();

        // dd($order);
        $view_data = [
            'order' => $order
        ];

        return view('orders.edit', $view_data);
    }

    public function update(Request $request)
    {

        $nopol = $request->input('nopol');
        $invoice = $request->input('invoice');
        $nama_pelanggan = $request->input('nama_pelanggan');
        $ktp = $request->input('ktp');
        $telp = $request->input('telp');
        $alamat = $request->input('alamat');
        $catatan = $request->input('catatan');
        $layanan = $request->input('layanan');
        $tujuan = $request->input('tujuan');
        $tgl_sewa = $request->input('tgl_sewa');
        $lama_sewa = $request->input('lama_sewa');
        $total_harga = $request->input('total_harga');
        $bayar = $request->input('bayar');
        $keterangan = $request->input('keterangan');
        $order = Order::where('invoice', $invoice)->first();

        $id_order = $order->id;

        $confirm_order = Confirm_order::where('order_id', '=', $id_order)->first();
        // dd($confirm_order);

        Order::where('orders.id', '=', $id_order)->update([
            'nopol' => $nopol,
            'nama_pelanggan' => $nama_pelanggan,
            'ktp' => $ktp,
            'telp' => $telp,
            'alamat' => $alamat,
            'catatan' => $catatan,
            'layanan' => $layanan,
            'tujuan' => $tujuan,
            'mulai_sewa' => $tgl_sewa,
            'lama_sewa' => $lama_sewa,
            'total_harga' => $total_harga,
        ]);

        // dd($id_order);

        if ($request->hasFile('bukti_bayar')) {
            $image_path = "images/confirm_order/$confirm_order->bukti_bayar";  // the value is : localhost/project/image/filename.format
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $request->file('bukti_bayar')->move('images/confirm_order/', $invoice . ".jpg");
            $bukti_bayar = $invoice . ".jpg";
            Confirm_order::where('order_id', $id_order)->update([
                'bukti_bayar' => $bukti_bayar
            ]);
        }

        Confirm_order::where('order_id', '=', $id_order)->update([
            'bayar' => $bayar,
            'keterangan' => $keterangan
        ]);
        return redirect('manage_orders');
    }
    public function destroy($id)
    {
        //
        Order::where('id', $id)->delete();

        return redirect('manage_orders');
    }

    public function search_order(Request $request)
    {
        $invoice = $request->input('invoice');

        $order = Order::where('invoice', '=', $invoice)->first();

        return redirect("status_order/$order->id");
    }
    public function cetak_pdf()
    {

        $orders = Confirm_order::rightJoin('orders', 'orders.id', '=', 'confirm_orders.order_id')
            ->join('cars', 'cars.id', '=', 'orders.car_id')
            ->select('confirm_orders.*', 'orders.*', 'cars.merk', 'cars.type', 'cars.harga')
            ->get();

        $view_data = [
            'orders' => $orders
        ];
        // dd($view_data);
        $dompdf = PDF::loadView('pdf.orders_pdf', $view_data)->setPaper('a4', 'landscape');;
        set_time_limit(300);
        return $dompdf->stream('orders.pdf');
    }

    public function cetak_bukti_bayar($id)
    {
        $order = Order::where('id', $id)->first();
        // dd($order);
        $car_id = $order->car_id;
        $car = Car::where('id', $car_id)->first();
        if ($order->status == "Dibayar") {
            $confirm = Confirm_order::where('order_id', $id)->first();

            $view_data = [
                'order' => $order,
                'confirm' => $confirm,
                'car' => $car
            ];
        } else {
            $view_data = [
                'order' => $order,
                'car' => $car
            ];
        }


        $dompdf = PDF::loadView('pdf.status_order_pdf', $view_data)->setPaper('a4', 'potrait');;
        set_time_limit(300);
        return $dompdf->stream('bukti_bayar.pdf');
    }
}
