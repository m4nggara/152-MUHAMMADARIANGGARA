<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscoverController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $productPopuler = DB::select('select items.id, items.created_at, count(*) as jml from items left join viewers on items.id=viewers.item_id and viewers.deleted_at is null where items.deleted_at is null and items.category_id = 1 group by items.id, items.created_at order by jml desc, created_at desc limit 3');
        $destinationPopuler = DB::select('select items.id, items.created_at, count(*) as jml from items left join viewers on items.id=viewers.item_id and viewers.deleted_at is null where items.deleted_at is null and items.category_id = 2 group by items.id, items.created_at order by jml desc, created_at desc limit 3');
        return view('discover', ['productPopuler' => $productPopuler, 'destinationPopuler' => $destinationPopuler]);
    }
}
