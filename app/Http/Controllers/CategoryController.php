<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withTrashed()->get();

        return view('admin.pages.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories',
            'desc' => 'present|nullable',
            'icon_type' => 'required|in:icon,path',
            'icon_source' => 'present|nullable'
        ], [
            'name.required' => 'Nama kategori harus diisi',
            'name.unique' => 'Nama kategori sudah ada. Silakan buat nama lainnya.',
            'icon_type.required' => 'Jenis ikon harus dipilih',
            'icon_type.in' => 'Jenis ikon yang dipilih adalah Font Ikon atau Path File',
        ]);
 
        if ($validator->fails()) {
            return redirect()->route('admin.categories.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        
        $data = $request->all();

        $category = Category::create([
            'name' => $data['name'],
            'desc' => $data['desc'],
            'icon_type' => $data['icon_type'],
            'icon_source' => $data['icon_source'],
            'created_at' => Carbon::now(),
            'created_by' => 'system'
        ]);

        return redirect()->route('admin.categories.index')->with(['message' => 'menambahkan', 'category' => (object) $data ]);
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
        $category = Category::withTrashed()->find($id);

        return view('admin.pages.category.edit', ['item' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories',
            'desc' => 'present|nullable',
            'icon_type' => 'required|in:icon,path',
            'icon_source' => 'present|nullable',
            'isactive' => 'present|in:0,1'
        ], [
            'name.required' => 'Nama kategori harus diisi',
            'name.unique' => 'Nama kategori sudah ada. Silakan buat nama lainnya.',
            'icon_type.required' => 'Jenis ikon harus dipilih',
            'icon_type.in' => 'Jenis ikon yang dipilih adalah Font Ikon atau Path File',
        ]);
 
        if ($validator->fails()) {
            return redirect()->route('admin.categories.update', $id)
                        ->withErrors($validator)
                        ->withInput();
        }
        
        DB::beginTransaction();
        try {
            $category = Category::withTrashed()->find($id);
        
            $data = $request->all();
    
            $category->name = $data['name'];
            $category->desc = $data['desc'];
            $category->icon_type = $data['icon_type'];
            $category->icon_source = $data['icon_source'];
            $category->deleted_at = isset($data['isactive']) && $data['isactive'] == 0 ? Carbon::now() : null;
            $category->deleted_by = isset($data['isactive']) && $data['isactive'] == 0 ? 'system' : null;
            $category->updated_at = Carbon::now();
            $category->updated_by = 'system';
            $category->save();

            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.categories.edit', $id)
                        ->withErrors($e->getMessage())
                        ->withInput();
        }

        return redirect()->route('admin.categories.index')->with(['message' => 'mengubah', 'category' => (object) $data ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
