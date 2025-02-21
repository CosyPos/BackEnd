<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreinventoryRequest;
use App\Http\Requests\UpdateinventoryRequest;
use App\Http\Resources\InventoryResource;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return InventoryResource::collection(Inventory::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreinventoryRequest $request)
    {
        $fields = $request->validated();

        $inventory = Inventory::where('dish_id', $fields['dish_id'])->first();

        if ($inventory) {
            $inventory->update([
                'quantity' => $fields['quantity'],
                'availability' => $fields['availability']
            ]);

            return new InventoryResource($inventory);
        }

        if($fields['quantity'] < 0){
            return response()->json(['error' => 'Cannot create inventory with negative quantity'], 422);
        }

        $inventory = Inventory::create($fields);

        return new InventoryResource($inventory);
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
    public function update(UpdateinventoryRequest $request, inventory $inventory)
    {
        $fields = $request->validated();
        $inventory->update($fields);
        Log::info('Inventory updated', ['dish_id' => $fields['dish_id'], 'quantity' => $fields['quantity']]);
        return new InventoryResource($inventory);
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
