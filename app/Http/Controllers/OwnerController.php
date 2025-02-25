<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    // http://127.0.0.1/20250218_BG/public/api/owners
    public function getAll()
    {
        return Owner::query()
            ->get();
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $owner = Owner::create($data);

        return response()->json($owner, 201);
    }

    public function update(Owner $owner, Request $request)
    {
        $data = [
            "name" => $request->get("name"),
            "address" => $request->get("address"),
            "phone" => $request->get("phone"),
        ];

        $owner->update($data);

        return response()->json($owner);
    }

    public function delete(Owner $owner)
    {
        $owner->delete();

        return response()->json("", 204);
    }
}
