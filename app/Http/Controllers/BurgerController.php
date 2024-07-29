<?php

namespace App\Http\Controllers;

use App\Models\Burger;
use Illuminate\Http\Request;

class BurgerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $burgers = Burger::all();
        return response()->json($burgers,200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated =  $request->validate(
            [
                'nom' => 'required',
                'description' => 'required|max:100',
                'prix' => 'required',
                'image' => 'required|image',

            ]
        );

       /* $image = $request->image;
        $image= $image->store('images','public');*/

        $burger = Burger::create($validated);
        return response()->json($burger,201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $burgers =  Burger::findOrFail($id);
            $validated =  $request->validate(
                [
                    'nom' => 'required',
                    'description' => 'required|max:100',
                    'prix' => 'required',
                    'image' => 'required|image',
                ]
            );

            $burgers->update($validated);
            return response()->json($burgers,200);
        }catch (ModelNotFoundException $ex){
            return response()->json(['error' => 'Burger not found'],404);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $burgers =  Burger::findOrFail($id);
            $burgers->delete();
            return response()->json(null,204);
        }catch (ModelNotFoundException $e){
            return response()->json(['error' => 'Burger not found'],404);
        }
    }
}
