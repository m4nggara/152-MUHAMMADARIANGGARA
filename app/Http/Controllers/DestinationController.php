<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function list(Request $request)
    {
        $page = 5;
        if($request->ajax() && $request->has('page') && $request->page >= 2) {
            $page += 1;
        }
        $destination = Item::destination()->orderByDesc('id')->paginate($page);
        if($request->ajax()) {
            $view = view('destination-item', ['destination' => $destination])->render();
            return response()->json(['html' => $view, 'isMore' => $destination->hasMorePages()]);
        }
        return view('destination', ['destination' => $destination]);
    }
}
