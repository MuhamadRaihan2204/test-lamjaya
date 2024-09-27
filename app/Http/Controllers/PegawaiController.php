<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pegawai;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::with(['kecamatan','kelurahan','provinsi'])->get();
        return view('pegawai.index',compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecamatan = Kecamatan::select('id', 'name')->get();
        $kelurahan = Kelurahan::select('id', 'name')->get();
        $provinsi = Provinsi::select('id', 'name')->get();
        return view('pegawai.create', compact('kecamatan', 'kelurahan', 'provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $request->all();

            $pegawai = Pegawai::create([
                'kecamatan_id' => $request->kecamatan_id,
                'kelurahan_id' => $request->kelurahan_id,
                'provinsi_id' => $request->provinsi_id,
                'name' => $request->name,
                'place_of_birth' => $request->place_of_birth,
                'date' => $request->date,
                'address' => $request->address,
                'gender' => $request->gender,
                'religion' => $request->religion,
            ]);
            DB::commit();

            return redirect()->route('pegawai');
        } catch (\Throwable $th) {
            DB::rollBack();

            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $kecamatan = Kecamatan::select('id','name')->get();
        $kelurahan = Kelurahan::select('id','name')->get();
        $provinsi = Provinsi::select('id','name')->get();

        return view('pegawai.edit', compact('pegawai','kecamatan','kelurahan','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {

            $request->all();

            $idData = Pegawai::findOrFail($id);

            $idData->update([
                'kecamatan_id' => $request->kecamatan_id,
                'kelurahan_id' => $request->kelurahan_id,
                'provinsi_id' => $request->provinsi_id,
                'name' => $request->name,
                'place_of_birth' => $request->place_of_birth,
                'date' => $request->date,
                'address' => $request->address,
                'gender' => $request->gender,
                'religion' => $request->religion,
            ]);

            DB::commit();

            return redirect()->route('pegawai');
        } catch (\Throwable $th) {
            DB::rollBack();

            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = Pegawai::findOrFail($id)->delete();

        return redirect()->route('pegawai');
    }
}
