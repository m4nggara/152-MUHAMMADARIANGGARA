<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $items = Item::withTrashed()->get();
        return view('admin.pages.dashboard', ['items' => $items]);
    }
}
