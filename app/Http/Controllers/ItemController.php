<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{

    public function index()
    {
        return response()->json(Item::all());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_item' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'gambar' => 'nullable|string'
        ]);

        $item = Item::create($request->all());

        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update($request->all());

        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return response()->json(['message' => 'Item dibeli']);
    }
}
