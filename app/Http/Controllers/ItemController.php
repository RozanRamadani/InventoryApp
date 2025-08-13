<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display items
        $items = Item::all();
        return inertia('Items/index', [
            'items' => $items,
        ]);
    }

    public function create()
    {
        // Logic to show the item creation form
        return inertia('Items/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|numeric|digits_between:1,6',
            'unit' => 'required|string|max:255', // Validate the 'unit' field
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'Item Created Succesfully');
    }

    public function edit($id)
    {
        // Logic to show the item edit form
        $item = Item::findOrFail($id);
        return inertia('Items/edit', [
            'item' => $item,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:255', // Validate the 'unit' field
        ]);

        $item = Item::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Item Updated Successfully');
    }
}
