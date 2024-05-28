<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->category;
        $item = new Item;
        switch($category) {
            case 'product' : 
                $item=$item->product();
                break;
            case 'destination' : 
                $item=$item->destination();
                break;
            default : break;
        }
        $item = $item->where(function($query) use($request) {
            $query->where('name', 'like', '%'.$request->term.'%')->orWhere('desc', 'like', '%'.$request->term.'%');
        })->paginate(5);
        return view('search', ['term' => $request->term, 'category' => $request->category, 'items' => $item]);
    }
}
