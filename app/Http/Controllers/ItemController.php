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
}
