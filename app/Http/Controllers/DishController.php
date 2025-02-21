<?php

namespace App\Http\Controllers;

use App\Http\Resources\DishResource;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DishResource::collection(Dish::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'dish_name' => 'required|max:255',
            'price' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        $dish = Dish::create($fields);

        return new DishResource($dish);
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        return response()->json($dish->load('category'), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        $fields = $request->validate([
            'dish_name' => "sometimes|,max:255",
            'price' => "sometimes",
            'category_id' => 'sometimes|exists:categories,id'
        ]);

        $dish->update($fields);

        return response()->json($dish->load('category'), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();

        return response()->json(null, 204);
    }
}
