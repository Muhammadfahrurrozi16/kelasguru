<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\roles;
use Illuminate\Support\Str;
use App\Models\sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::when($request->input('search'), function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->input('search') . '%');
        })
        ->paginate(5);
        return view('Back.Superadmin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = roles::all();
        $sekolahs = sekolah::all();
        return view('Back.Superadmin.user.create',['role' => $roles, 'sekolah' => $sekolahs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // $hashpass = Hash::make($request->password);

        $users = new User();
        $users->name = $request->name;
        $users->username = $request->username;
        $users->bio = $request->bio;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->email_verified_at = now();
        $users->remember_token = Str::random(10);
        $users->roles_id = $request->roles_id;
        $users->sekolah_id = $request->sekolah_id;
        $users->password = Hash::make($request->password);
        $users->save();
        notify()->success('Data User berhasil di tambahkan');
        return redirect('/user');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::where('id',$id)->get();
        return view('Back.Superadmin.user.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = roles::all();
        $sekolah = sekolah::all();
        $users = User::where('id',$id)->get();
        // dd($users);
        return view('Back.Superadmin.user.edit', compact('users','role','sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $users = User::findOrFail($id);
        $users->name = $request->name;
        $users->username = $request->username;
        $users->bio = $request->bio;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->roles_id = $request->roles_id;
        $users->sekolah_id = $request->sekolah_id;
        $users->password = $request->password;
        $users->save();
        notify()->success('Data User berhasil di perbarui');
        return redirect('/user');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        notify()->success('Data User berhasil di hapus');
        return redirect('/user');
    }

    public function delete($id)
    {
        $users = User::find($id);

        return view('Back.Superadmin.user.delete', compact('users'));
    }
}
