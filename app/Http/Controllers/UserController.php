<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
                    <button type="button" onclick="editForm(`' . route('user.update',
                        $user->id) . '`)" class="btn btn-xs btn-info">
                        <i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`' . route('user.destroy',
                        $user->id) . '`)" class="btn btn-xs btn-danger">
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
}
