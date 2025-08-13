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
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'Item Created Succesfully');
    }
}
