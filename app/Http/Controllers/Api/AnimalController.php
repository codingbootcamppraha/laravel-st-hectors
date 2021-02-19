<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function index(Request $request)
    {
        $query = Animal::query()
            ->with('owner')
            ->with('image');

        if ($search_term = $request->input('s')) {
            $query
                ->leftJoin('owners', 'animals.owner_id', 'owners.id')
                ->where('animals.name', 'like', '%'.$search_term.'%')
                ->orWhere('owners.surname', 'like', '%'.$search_term.'%');
        }

        return $query
            ->orderBy('animals.name', 'asc')
            ->paginate(10)
            ->items();
    }
}
