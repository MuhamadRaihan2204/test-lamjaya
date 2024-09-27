<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kecamatan = Kecamatan::select('id','name','code','status')->get();
        return view('kecamatan.index',compact('kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kecamatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $request->all();

            $kecamatan = Kecamatan::create([
                'code' => $request->code,
                'name' => $request->name,
                'status' => $request->status
            ]);
            DB::commit();

            return redirect()->route('kecamatan');
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
        $kecamatan = Kecamatan::findOrFail($id);

        return view('kecamatan.edit',compact('kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {

            $request->all();

            $idData = Kecamatan::findOrFail($id);

            $idData->update([
                'code' => $request->code,
                'name' => $request->name,
                'status' => $request->status
            ]);

            DB::commit();

            return redirect()->route('kecamatan');
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
        $kecamatan = Kecamatan::findOrFail($id)->delete();

        return redirect()->route('kecamatan');
    }
}
