<?php

namespace App\Http\Controllers;

use App\Http\Requests\mapelrequest;
use App\Models\mapel;
use App\Models\tingkat_sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mapelcontrollers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mapels = mapel::when($request->input('search'), function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->input('search') . '%');
        })
        ->paginate(5);
        return view('Back.Superadmin.mapel.index',compact('mapels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tingkats = tingkat_sekolah::all();
        return view('Back.Superadmin.mapel.create', compact('tingkats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(mapelrequest $request)
    {
        $mapels = new mapel();
        $mapels->nama_mapel = $request->nama_mapel;
        $mapels->keterangan = $request->keterangan;
        $mapels->is_active = $request->is_active;
        $mapels->tingkat_sekolah_id = $request->tingkat_sekolah_id;
        $mapels->save();
        notify()->success('Data mapel berhasil di tambahkan');
        return redirect('/mapel');

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
        $tingkats = tingkat_sekolah::all();
        $mapels = mapel::where('id',$id)->get();
        return view('Back.Superadmin.mapel.edit', compact('mapels','tingkats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(mapelrequest $request, string $id)
    {
        $mapels = mapel::findOrFail($id);
        $mapels->nama_mapel = $request->nama_mapel;
        $mapels->keterangan = $request->keterangan;
        $mapels->is_active = $request->is_active;
        $mapels->tingkat_sekolah_id = $request->tingkat_sekolah_id;
        $mapels->save();
        notify()->success('Data mapel berhasil di perbarui');
        return redirect('/mapel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mapels = mapel::findOrFail($id);
        $mapels->delete();
        notify()->success('data mapel berhasil di hapus');
        return redirect('/mapel');
    }
    public function delete($id)
    {
        $mapels = mapel::find($id);

        return view('Back.Superadmin.mapel.delete', compact('mapels'));
    }
}
