<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::with('category')->withTrashed()->orderByDesc('id')->get();
        return view('admin.pages.item.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.item.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|exists:categories,id',
            'name' => 'required',
            'desc' => 'required',
            'photo_banner' => 'required|file',
            'owner' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'maps' => 'present',
        ], [
            'name.required' => 'Judul harus diisi',
            'desc.required' => 'Deskripsi harus diisi',
            'owner.required' => 'Owner harus diisi',
            'phone.required' => 'Phone harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak sesuai',
            'address.required' => 'Alamat harus diisi',
            'category.required' => 'Kategori harus dipilih',
            'category.exists' => 'Kategori yang dipilih tidak sesuai',
            'photo_banner.required' => 'Photo banner harus dipilih',
            'photo_banner.file' => 'Format photo banner tidak sesuai',
        ]);
 
        if ($validator->fails()) {
            return redirect()->route('admin.items.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        DB::beginTransaction();
        try {
            $data = $request->all();

            $uuid = Str::uuid()->toString();
            while(Item::where('slug', $uuid)->exists()) {
                $uuid = Str::uuid()->toString();
            }

            $item = Item::create([
                'slug' => $uuid,
                'name' => $data['name'],
                'desc' => $data['desc'],
                'owner' => $data['owner'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'address' => $data['address'],
                'google_maps' => $data['maps'],
                'category_id' => $data['category'],
                'created_at' => now(),
                'created_by' => Auth::user()->id // 'system'
            ]);
    
            $file = $request->photo_banner;
            $folder = 'iresources';
            $filename = 'ids_'.$item->id.'_'.now()->timestamp.'.'.$file->extension();
            $path = $folder . '/' . $filename;
            $file->storeAs('public/'.$folder, $filename);
    
            $item->img_path_banner = $path;
            $item->save();

            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.items.create')
                        ->withErrors($e->getMessage())
                        ->withInput();
        }
        
        return redirect()->route('admin.items.index')->with(['message' => 'menambahkan', 'item' => $item ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $item = Item::where('slug', $slug)->first();

        if(!isset($item)) {
            return redirect()->back()->withErrors('Oops! Terjadi kesalahan...')
            ->withInput();
        }

        return view('detail', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Item::withTrashed()->find($id);

        return view('admin.pages.item.edit', ['categories' => Category::all(), 'item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'category' => 'required|exists:categories,id',
            'name' => 'required',
            'desc' => 'required',
            'photo_banner_old' => 'present|nullable',
            'photo_banner' => 'nullable|file',
            'owner' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'maps' => 'present',
            'isactive' => 'present|in:0,1'
        ], [
            'name.required' => 'Judul harus diisi',
            'desc.required' => 'Deskripsi harus diisi',
            'owner.required' => 'Owner harus diisi',
            'phone.required' => 'Phone harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak sesuai',
            'address.required' => 'Alamat harus diisi',
            'category.required' => 'Kategori harus dipilih',
            'category.exists' => 'Kategori yang dipilih tidak sesuai',
            'photo_banner_old.present' => 'Photo banner tidak boleh kosong',
            'photo_banner.file' => 'Format photo banner tidak sesuai',
        ]);
 
        if ($validator->fails()) {
            return redirect()->route('admin.items.edit', $id)
                        ->withErrors($validator)
                        ->withInput();
        }

        // validasi file banner tidak boleh kosong
        if(!$request->hasFile('photo_banner') && (!isset($request->photo_banner_old) || empty($request->photo_banner_old))) {
            return redirect()->route('admin.items.edit', $id)
                        ->withErrors('Photo banner tidak boleh kosong')
                        ->withInput();
        }

        DB::beginTransaction();
        try {
            $data = $request->all();

            $item = Item::withTrashed()->find($id);
            $item->name = $data['name'];
            $item->desc = $data['desc'];
            $item->owner = $data['owner'];
            $item->phone = $data['phone'];
            $item->email = $data['email'];
            $item->address = $data['address'];
            $item->google_maps = $data['maps'];
            $item->category_id = $data['category'];
            $item->deleted_at = isset($data['isactive']) && $data['isactive'] == 0 ? now() : null;
            $item->deleted_by = isset($data['isactive']) && $data['isactive'] == 0 ? 'system' : null;

            if($request->hasFile('photo_banner')) {


                $file = $request->photo_banner;
                $folder = 'iresources';
                $filename = 'ids_'.$item->id.'_'.now()->timestamp.'.'.$file->extension();
                $path = $folder . '/' . $filename;
                $file->storeAs('public/'.$folder, $filename);

                // remove file sebelumnya
                Storage::disk('public')->delete($item->img_path_banner);

                $item->img_path_banner = $path;
            }

            $item->updated_at = now();
            $item->updated_by = Auth::user()->id; //'system';
            $item->save();

            DB::commit();
    
        } catch(\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.items.edit', $id)
                        ->withErrors($e->getMessage())
                        ->withInput();
        }
        
        return redirect()->route('admin.items.index')->with(['message' => 'mengubah', 'item' => $item ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
