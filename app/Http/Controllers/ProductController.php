<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        $product = Item::product()->orderByDesc('id')->paginate();
        return view('product', ['product' => $product]);
    }
}
