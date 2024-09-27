<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelurahan = Kelurahan::with(['kecamatan'])->get();
        return view('kelurahan.index', compact('kelurahan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecamatan = Kecamatan::select('id','name')->get();
        return view('kelurahan.create', compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $request->all();

            $kelurahan = Kelurahan::create([
                'kecamatan_id' => $request->kecamatan_id,
                'code' => $request->code,
                'name' => $request->name,
                'status' => $request->status
            ]);
            DB::commit();

            return redirect()->route('kelurahan');
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
        $kelurahan = Kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::select('id','name')->get();

        return view('kelurahan.edit',compact('kelurahan','kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {

            $request->all();

            $idData = Kelurahan::findOrFail($id);

            $idData->update([
                'kecamatan_id' => $request->kecamatan_id,
                'code' => $request->code,
                'name' => $request->name,
                'status' => $request->status
            ]);

            DB::commit();

            return redirect()->route('kelurahan');
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
        $kelurahan = Kelurahan::findOrFail($id)->delete();

        return redirect()->route('kelurahan');
    }
}
