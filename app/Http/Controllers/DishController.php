<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
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
    public function store(StoreDishRequest $request)
    {

        $dish = Dish::create($request->validated());
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
    public function update(UpdateDishRequest $request, Dish $dish)
    {

        $dish->update($request->validated());

        return new DishResource($dish);
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
