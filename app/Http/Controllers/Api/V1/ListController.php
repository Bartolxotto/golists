<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\AppList;
use App\Models\Item;
use Illuminate\Http\Request;

class ListController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = AppList::all();
        return response()->json($lists, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255'
        ]);

        $list = AppList::create($request->all());

        return response()->json($list, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $list = AppList::find($id);

        if (!$list) {
            return response()->json(['error' => 'List not found'], 404);
        }

        return response()->json($list, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255'
        ]);

        $list = AppList::findOrFail($id);
        $list->update($request->all());

        return response()->json($list, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $list = AppList::findOrFail($id);
        $list->delete();

        return response()->json(null, 204);
    }

    public function showItems(Request $request, string $listId)
    {
        $items = Item::join('products', 'items.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select(
                'items.*',
                'categories.name as category_name',
                'categories.icon as category_icon',
                'products.name as product_name'
            )
            ->where('items.list_id', $listId)
            ->orderBy('categories.order')
            ->get();

        return response()->json($items, 200);
    }
}
