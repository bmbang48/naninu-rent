<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
        $dataCars = Car::get();
        return response()->json([
            'status' => true,
            'message' => 'Data Cars Ditemukan',
            'data' => $dataCars
        ], 200);
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
        $dataCar = new Car;

        $rules = [
            'merk' => 'required',
            'type' => 'required',
            'tahun' => 'required',
            'jml_penumpang' => 'required',
            'transmisi' => 'required',
            'bbm' => 'required',
            'harga' => 'required',
            'image' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menyimpan data',
                'data' => $validator->errors()
            ]);
        }

        $dataCar->merk = $request->merk;
        $dataCar->type = $request->type;
        $dataCar->tahun = $request->tahun;
        $dataCar->jml_penumpang = $request->jml_penumpang;
        $dataCar->transmisi = $request->transmisi;
        $dataCar->bbm = $request->bbm;
        $dataCar->harga = $request->harga;
        $dataCar->image = $request->image;

        $dataCar->save();
        return response()->json([
            'status' => true,
            'message' => 'Data Car Berhasil Disimpan',
            'data' => $dataCar
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dataCar = Car::find($id);

        if (!$dataCar) {
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak Ditemukan',
            ], 404);
        }


        $rules = [
            'merk' => 'required',
            'type' => 'required',
            'tahun' => 'required',
            'jml_penumpang' => 'required',
            'transmisi' => 'required',
            'bbm' => 'required',
            'harga' => 'required',
            'image' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menyimpan data',
                'data' => $validator->errors()
            ]);
        }

        $dataCar->merk = $request->merk;
        $dataCar->type = $request->type;
        $dataCar->tahun = $request->tahun;
        $dataCar->jml_penumpang = $request->jml_penumpang;
        $dataCar->transmisi = $request->transmisi;
        $dataCar->bbm = $request->bbm;
        $dataCar->harga = $request->harga;
        $dataCar->image = $request->image;

        $dataCar->update();
        return response()->json([
            'status' => true,
            'message' => 'Data Car Berhasil Disimpan',
            'data' => $dataCar
        ], 200);
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
        $dataCar = Car::find($id);

        if (!$dataCar) {
            return response()->json([
                'status' => true,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $dataCar->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data car berhasil dihapus',
        ], 200);
    }
}
