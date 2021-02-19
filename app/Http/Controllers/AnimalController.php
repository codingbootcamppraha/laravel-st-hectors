<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Visit;

class AnimalController extends Controller
{
    public function show($id, $visit_id = null)
    {
        $animal = Animal::findOrFail($id);

        if ($visit_id) {
            $visit = Visit::find($visit_id);
        }

        if (empty($visit)) {
            $visit = new Visit;
        }

        return view('animal.show', compact(
            'animal',
            'visit'
        ));
    }
}
