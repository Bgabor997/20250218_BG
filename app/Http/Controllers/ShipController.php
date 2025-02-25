<?php

namespace App\Http\Controllers;

use App\Models\Harbor;
use App\Models\Ship;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    public function getAll()
    {
        $ships = Ship::query()
            ->with(["harbor", "owners"])
            ->get();

        return response()->json($ships);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $ship = Ship::create($data);

        return response()->json($ship, 201);
    }

    public function update(Ship $ship, Request $request)
    {
        $data = [
            "name" => $request->get("name"),
            "height" => floatval($request->get("height"))
        ];

        $ship->update($data);

        return response()->json($ship);
    }

    public function parkShip(Ship $ship, Harbor $harbor)
    {
        
        if ($ship->harbor) {
            $ship->harbor_id = null;
            $harbor->capacity = $harbor->capacity + 1;
        } else {
            
            $ship->harbor_id = $harbor->getKey();
            $harbor->capacity = $harbor->capacity - 1;
        }
        $ship->save();
        $harbor->save();

        return response()->json([
            "harborCapacity" => $harbor->capacity,
            "shipIsParked" => $ship->harbor_id ? true : false
        ]);
    }

    public function delete(Ship $ship)
    {
        $ship->delete();

        return response()->json("", 204);
    }
}
