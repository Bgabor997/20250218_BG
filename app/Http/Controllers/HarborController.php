<?php

namespace App\Http\Controllers;

use App\Models\Harbor;
use Illuminate\Http\Request;

class HarborController extends Controller
{
    public function getAll()
    {
        $harbors = Harbor::query()
            ->get();

        return response()->json($harbors);
    }
}
