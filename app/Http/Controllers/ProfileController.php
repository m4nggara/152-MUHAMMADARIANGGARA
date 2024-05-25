<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $edit = $request->has('edit') && $request->get('edit') == true ? TRUE : FALSE;
        return view('admin.pages.profile.index', ['edit' => $edit]);
    }

    public function edit(Request $request)
    {

        $data = $request->all();

        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $data['name'];
        $user->save();

        return redirect()->route('admin.profile.index')->with(['message' => 'Profile berhasil diubah']);
    }

    public function setting(Request $request)
    {
        return view('admin.pages.profile.setting');
    }

    public function changePassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:8',
        ], [
            'password.required' => 'Password harus diisi',
            'password.confirmed' => 'Konfirmasi password harus sesuai.',
        ]);
 
        if ($validator->fails()) {
            return redirect()->route('admin.profile.setting')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $request->all();

        $id = Auth::user()->id;
        $user = User::find($id);
        $user->password = bcrypt($data['password']);
        $user->save();

        return redirect()->route('admin.profile.setting')->with(['message' => 'Perubahan berhasil dilakukan']);
    }
}
