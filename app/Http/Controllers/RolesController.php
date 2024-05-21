<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::withTrashed()->get();
        return view('admin.pages.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|max:255',
            'desc' => 'present|nullable',
        ], [
            'name.unique' => 'Nama role sudah terdaftar, silahkan gunakan nama lainnya.'
        ]);
 
        if ($validator->fails()) {
            return redirect()->route('admin.roles.create')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $data = $request->all();

        try {
            Role::create([
                'name' => $data['name'],
                'desc' => $data['desc'],
                'created_at' => Carbon::now(),
                'created_by' => 'system'
            ]);
        } catch(\Exception $e) {
            return redirect()->route('admin.roles.create')
                        ->withErrors($e->getMessage())
                        ->withInput();
        }

        return redirect()->route('admin.roles.index')->with(['message' => 'menambahkan', 'role' => (object) $data ]);
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
        $role = Role::withTrashed()->find($id);

        return view('admin.pages.roles.edit', ['item' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|'. Rule::unique('roles', 'name')->ignore($id),
            'desc' => 'present|nullable',
            'isactive' => 'present|in:0,1'
        ], [
            'name.unique' => 'Nama role sudah terdaftar, silahkan gunakan nama lainnya.'
        ]);
 
        if ($validator->fails()) {
            return redirect()->route('admin.roles.edit', $id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $role = Role::withTrashed()->find($id);
        
        $data = $request->all();

        $role->name = $data['name'];
        $role->desc = $data['desc'];
        $role->deleted_at = isset($data['isactive']) && $data['isactive'] == 0 ? Carbon::now() : null;
        $role->deleted_by = isset($data['isactive']) && $data['isactive'] == 0 ? 'system' : null;
        $role->updated_at = Carbon::now();
        $role->updated_by = 'system';
        $role->save();

        return redirect()->route('admin.roles.index')->with(['message' => 'mengubah', 'role' => $role ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
