<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function data()
    {
        $user = User::isNotAdmin()->orderBy('id', 'desc')->get();

        return datatables()
            ->of($user)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`' . route(
                    'user.update',
                    $user->id
                ) . '`)" class="btn btn-xs btn-info">
                        <i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`' . route(
                    'user.destroy',
                    $user->id
                ) . '`)" class="btn btn-xs btn-danger">
                        <i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->level = 2;
        $user->foto = '/img/user.png';
        $user->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    public function show(string $id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;

        if ($request->has('password') && $request->password != "")
            $user->password = $request->password;
        $user->update();

        return response()->json('Data berhasil disimpan', 200);
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return response(null, 204);
    }

    public function profil()
    {
        $profil = Auth::user();

        return view('user.profil', compact('profil'));
    }

    public function updateProfil(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;

        if ($request->has('password') && $request->password != "") {
            if (Hash::check($request->old_password, $user->password)) {
                if ($request->password == $request->password_confirmation) {
                    $user->password = bcrypt($request->password);
                } else {
                    return response()->json('Konfirmasi password tidak sesuai', 422);
                }
            } else {
                return response()->json('Password lama tidak sesuai', 422);
            }
        }

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama = 'foto-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img'), $nama);
            $user->foto = "/img/$nama";
        }

        $user->update();

        return response()->json($user, 200);
    }
}
