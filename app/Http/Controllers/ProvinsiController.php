<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinsi = Provinsi::select('id','name','code','status')->get();
        return view('provinsi.index', compact('provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('provinsi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $request->all();

            $provinsi = Provinsi::create([
                'code' => $request->code,
                'name' => $request->name,
                'status' => $request->status
            ]);
            DB::commit();

            return redirect()->route('provinsi');
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
        $provinsi = Provinsi::findOrFail($id);

        return view('provinsi.edit',compact('provinsi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {

            $request->all();

            $idData = Provinsi::findOrFail($id);

            $idData->update([
                'code' => $request->code,
                'name' => $request->name,
                'status' => $request->status
            ]);

            DB::commit();

            return redirect()->route('provinsi');
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
        $provinsi = Provinsi::findOrFail($id)->delete();

        return redirect()->route('provinsi');
    }
}
