<?php

namespace App\Http\Controllers;

use App\Models\roles;
use App\Models\sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = DB::table('users')->when($request->input('search'), function($query,$search) {
            $query->where('name', 'like' , '%' . $search . '%');
        })->paginate(5);
        return view('Back.Superadmin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = roles::all();
        $sekolah = sekolah::all();
        return view('Back.Superadmin.user.create',['role' => $roles, 'sekolah' => $sekolah]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
