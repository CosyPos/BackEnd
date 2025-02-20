<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Dish::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'dish_name' => 'required|max:255',
            'price' => 'required'
        ]);

        $dish = Dish::create($fields);

        return $dish;
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        return $dish;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        $fields = $request->validate([
            'dish_name' => "required|max:255",
            'price' => "required"
        ]);

        $dish->update($fields);

        return $dish;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();

        return ['message' => "the post was deleted"];
    }
}
