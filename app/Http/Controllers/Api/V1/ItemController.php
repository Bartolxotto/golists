<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return response()->json($items, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer',
            'checked' => 'required|boolean',
            'product_id' => 'required|exists:products,id',
            'list_id' => 'required|exists:lists,id'
        ]);

        $item = Item::create($request->all());

        return response()->json($item, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::find($id);

        if (!$item) {
            return response()->json(['error' => 'Item not found'], 404);
        }

        return response()->json($item, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'quantity' => 'required|integer',
            'checked' => 'required|boolean',
            'product_id' => 'required|exists:products,id',
            'list_id' => 'required|exists:lists,id'
        ]);

        $item = Item::findOrFail($id);
        $item->update($request->all());

        return response()->json($item, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return response()->json(null, 204);
    }

    public function incrementQuantityItem(string $id)
    {
        $item = Item::findOrFail($id);
        $item->quantity++;
        $item->save();
        return response()->json($item, 200);
    }

    public function decrementQuantityItem(string $id)
    {
        $item = Item::findOrFail($id);
        if ($item->quantity > 0) {
            $item->quantity--;
            $item->save();
        }
        return response()->json($item, 200);
    }

    public function checkItem(string $id)
    {
        $item = Item::find($id);
        $item->checked = !$item->checked;
        if($item->checked)
            $item->checked_at = now();
        else
            $item->checked_at = null;
            
        $item->save();
        return response()->json($item, 200);
    }
}
