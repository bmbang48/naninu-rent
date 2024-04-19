<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
// use Dompdf\Dompdf;
// use Barryvdh\DomPDF\Facade\Pdf;
use PDF;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cars = Car::where('isActive', true)->limit(4)->get();

        $view_data = [
            'cars' => $cars,
        ];

        // dd($cars);
        return view('home', $view_data);
    }
    public function cars()
    {
        //
        $cars = Car::where('isActive', true)->get();

        $view_data = [
            'cars' => $cars,
        ];

        // dd($cars);
        return view('cars.cars', $view_data);
    }

    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $merk = $request->input('merk');
        $type = $request->input('type');
        $tahun = $request->input('tahun');
        $jml_penumpang = $request->input('jml_penumpang');
        $transmisi = $request->input('transmisi');
        $bbm = $request->input('bbm');
        $harga = $request->input('harga');
        // $image = 

        if ($request->hasFile('image')) {
            $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
            $image = $request->file('image')->getClientOriginalName();
        }

        Car::create([
            'merk' => $merk,
            'type' => $type,
            'tahun' => $tahun,
            'jml_penumpang' => $jml_penumpang,
            'transmisi' => $transmisi,
            'bbm' => $bbm,
            'harga' => $harga,
            'image' => $image
        ]);

        return redirect('cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function order($id)
    {
        //
        $car = Car::where('id', $id)->first();
        $view_data = [
            'car' => $car
        ];

        return view('auth.order', $view_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $car = Car::where('id', $id)->first();
        $view_data = [
            'car' => $car
        ];


        return view('cars.edit', $view_data);
    }
    public function update(Request $request, $id)
    {
        // $data = Car::select('image')->where('id', $id)->get();
        //

        // $image = $data[0];
        $merk = $request->input('merk');
        $type = $request->input('type');
        $tahun = $request->input('tahun');
        $jml_penumpang = $request->input('jml_penumpang');
        $transmisi = $request->input('transmisi');
        $bbm = $request->input('bbm');
        $harga = $request->input('harga');


        // print_r($image);
        // dd($image);

        Car::where('id', $id)
            ->update([
                'merk' => $merk,
                'type' => $type,
                'tahun' => $tahun,
                'jml_penumpang' => $jml_penumpang,
                'transmisi' => $transmisi,
                'bbm' => $bbm,
                'harga' => $harga,
            ]);
        if ($request->hasFile('image')) {
            $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
            $image = $request->file('image')->getClientOriginalName();
            Car::where('id', $id)->update([
                'image' => $image
            ]);
        }

        // dd(Car::first());
        return redirect("manage_cars");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Car::where('id', $id)->delete();

        return redirect('manage_cars');
    }

    public function manage_cars()
    {
        $cars = Car::where('isActive', true)->get();

        $view_data = [
            'cars' => $cars,
        ];

        return view('cars.manage', $view_data);
    }

    public function search_cars(Request $request)
    {
        $keyword = $request->input('keyword');
        if ($keyword) {
            $cars = Car::where('merk', 'like', '%' . $keyword . '%')
                ->orWhere('type', 'like', '%' . $keyword . '%')
                ->get();
            $view_data = [
                'cars' => $cars,
            ];
            return view('home', $view_data);
        } else {
            return redirect("/");
        }

        // dd($cars);

        // dd($cars);
    }
    public function search_cars_collection(Request $request)
    {
        $keyword = $request->input('keyword');
        if ($keyword) {
            $cars = Car::where('merk', 'like', '%' . $keyword . '%')
                ->orWhere('type', 'like', '%' . $keyword . '%')
                ->get();
            $view_data = [
                'cars' => $cars,
            ];
            return view('cars.cars', $view_data);
        } else {
            return redirect("/");
        }

        // dd($cars);

        // dd($cars);
    }

    public function cetak_pdf()
    {

        $cars = Car::all();
        $view_data = [
            'cars' => $cars
        ];
        // dd($view_data);
        $dompdf = PDF::loadView('pdf.cars_pdf', $view_data);
        set_time_limit(300);
        return $dompdf->stream('cars.pdf');
    }
}
