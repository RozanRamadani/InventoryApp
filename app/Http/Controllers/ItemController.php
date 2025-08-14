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

    public function editStock($id)
    {
        // Logic to show the stock edit form for the item
        $item = Item::findOrFail($id);
        return inertia('Items/editStock', [
            'item' => $item,
        ]);
    }

    public function updateStock(Request $request, $id)
    {
        $request->validate([
            'qty' => 'required|numeric|digits_between:1,6',
            'note' => 'required|in:in,out', // Validate the 'note' field to be either 'in' or 'out'
            'description' => 'nullable|string|max:500', // Optional description field
        ]);

        $item = Item::findOrFail($id);
        if ($request->note === 'in') {
            $item->qty += $request->qty; // Increase stock
        } else {
            $item->qty -= $request->qty; // Decrease stock
        }
        $item->save();

        return redirect()->route('items.index')->with('success', 'Stock Updated Successfully');
    }
}
