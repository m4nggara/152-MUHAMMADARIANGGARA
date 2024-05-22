<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::withTrashed()->get();
        return view('admin.pages.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.users.create', ['roles' => Role::withTrashed()->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            // 'roles' => 'required'
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah terdaftar, silahkan gunakan email lainnya.',
            'password.required' => 'Password harus diisi',
            'password.confirmed' => 'Konfirmasi password harus sesuai.',
            'role.required' => 'Role harus dipilih'
        ]);
 
        if ($validator->fails()) {
            return redirect()->route('admin.users.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $request->all();

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'created_at' => Carbon::now(),
                'created_by' => 'system'
            ]);

            // hardcore role admin
            $roleAdmin = UserRole::create([
                'role_id' => 1,
                'user_id' => $user->id,
                'created_at' => Carbon::now(),
                'created_by' => 'system'
            ]);

            /* // roles user
            if(isset($data['roles']) && count($data['roles']) > 0) {
                foreach($data['roles'] as $roleid) {

                    // cek role user
                    $urole = UserRole::withTrashed()->where([
                        ['user_id', '=', $user->id],
                        ['role_id', '=', $roleid]
                    ])->first();

                    if(isset($urole)) {
                        throw new \Exception('Terjadi kesalahan: Tidak dapat menyimpan data role.');
                    }

                    // simpan role user
                    UserRole::create([
                        'role_id' => $roleid,
                        'user_id' => $user->id,
                        'created_at' => Carbon::now(),
                        'created_by' => 'system'
                    ]);
                }
            } */

            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.users.create')
                        ->withErrors($e->getMessage())
                        ->withInput();
        }

        return redirect()->route('admin.users.index')->with(['message' => 'menambahkan', 'user' => (object) $data ]);
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
        $user = User::with('uroles')->withTrashed()->find($id);
        return view('admin.pages.users.edit', ['item' => $user, 'uroles' => $user->uroles->transform(fn($item) => $item->role_id)->toArray(), 'roles' => Role::withTrashed()->get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,id,'.$id,
            // 'roles' => 'required',
            'isactive' => 'present|in:0,1'
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah terdaftar, silahkan gunakan email lainnya.',
            'roles.required' => 'Role harus dipilih'
        ]);
 
        if ($validator->fails()) {
            return redirect()->route('admin.users.edit', $id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $request->all();

        DB::beginTransaction();
        try {
            $user = User::withTrashed()->find($id);
        
            $data = $request->all();
    
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->deleted_at = isset($data['isactive']) && $data['isactive'] == 0 ? Carbon::now() : null;
            $user->deleted_by = isset($data['isactive']) && $data['isactive'] == 0 ? 'system' : null;
            $user->updated_at = Carbon::now();
            $user->updated_by = 'system';
            $user->save();

            /* $previouslySelectedRoleIds = $user->uroles->pluck('role_id')->toArray();
            $currentlySelectedRoleIds = $data['roles']; 
            $rolesToRemove = array_diff($previouslySelectedRoleIds, $currentlySelectedRoleIds);
            $rolesToAdd = array_diff($currentlySelectedRoleIds, $previouslySelectedRoleIds);

            foreach ($rolesToRemove as $key => $value) {
                UserRole::where([
                    ['role_id', '=',  $value],
                    ['user_id', '=', $user->id]
                ])->forceDelete();
            }

            foreach ($rolesToAdd as $key => $value) {
                UserRole::create([
                    'role_id' => $value,
                    'user_id' => $user->id,
                    'created_at' => Carbon::now(),
                    'created_by' => 'system'
                ]);
            } */



            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.users.edit', $id)
                        ->withErrors($e->getMessage())
                        ->withInput();
        }

        return redirect()->route('admin.users.index')->with(['message' => 'mengubah', 'user' => (object) $data ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
