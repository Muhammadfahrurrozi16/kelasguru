<?php

namespace App\Http\Controllers;

use App\Http\Requests\materirequest;
use App\Models\mapel;
use App\Models\materi;
use Illuminate\Http\Request;

class materiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $materis = materi::when($request->input('search'), function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->input('search') . '%');
        })
        ->paginate(5);
        return view('Back.Superadmin.materi.index', compact('materis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mapels = mapel::all();
        return view('Back.Superadmin.materi.create', compact('mapels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(materirequest $request)
    {
        $materis = new materi();
        $materis->name = $request->name;
        $materis->mapel_id = $request->mapel_id;
        $materis->sinopsis = $request->sinopsis;
        $materis->is_active = $request->is_active;
        $materis->materi = $request->materi;
        $materis->save();
        notify()->success('Data materi berhasil di tambahkan');
        return redirect('/materi');
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
        $mapels = mapel::all();
        $materis = materi::where('id',$id)->get();
        return view('Back.Superadmin.materi.edit', compact('materis','mapels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(materirequest $request, string $id)
    {
        $materis = materi::findOrFail($id);
        $materis->name = $request->name;
        $materis->mapel_id = $request->mapel_id;
        $materis->sinopsis = $request->sinopsis;
        $materis->is_active = $request->is_active;
        $materis->materi = $request->materi;
        $materis->save();
        notify()->success('Data materi berhasil di perbarui');
        return redirect('/materi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materis = materi::findOrFail($id);
        $materis->delete();
        notify()->success('data materi berhasil di hapus');
        return redirect('/materi');
    }

    public function delete($id)
    {
        $materis = materi::find($id);

        return view('Back.Superadmin.materi.delete', compact('materis'));
    }
}
