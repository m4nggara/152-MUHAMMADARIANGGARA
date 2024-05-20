<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
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
        $role = Role::create([
            'name' => $data['name'],
            'desc' => $data['desc'],
            'created_at' => Carbon::now(),
            'created_by' => 'system'
        ]);

        $roles = Role::all();
        return view('admin.pages.roles.index', ['roles' => $roles, 'role' => $role, 'message' => true]);
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
