<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreinventoryRequest;
use App\Http\Requests\UpdateinventoryRequest;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inventory::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'quantity' => 'required|integer',
            'availability' => 'required|max:30',
            'dish_id' => 'required|exists:dishes,id'
        ]);

        $inventory = Inventory::where('dish_id', $fields['dish_id'])->first();

        if($inventory){
            $inventory->update([
                'quantity' => $fields['quantity'],
                'availability' => $fields['availability']
            ]);

            return response()->json($inventory->load('dish'), 201);
        }

        $inventory = Inventory::create($fields);

        return response()->json($inventory->load('dish'), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(inventory $inventory)
    {
        return response()->json($inventory->load('dish'), 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, inventory $inventory)
    {
        $fields = $request()->validate([
            'quantity' => 'sometimes|integer',
            'availability' => 'sometimes|max:30'
        ]);

        $inventory->update($fields);

        return response()->json($inventory->load('dish'), 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(inventory $inventory)
    {
        $inventory->delete();

        return response()->json(null, 204);
    }
}
