<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;

class VisitController extends Controller
{
    public function store(Request $request, $animal_id)
    {
        $this->validate($request, [
            'happened_at' => 'required|date'
        ]);

        $visit = new Visit;

        $visit->happened_at = date('Y-m-d H:i:s', strtotime($request->input('happened_at')));
        $visit->animal_id = $animal_id;
        $visit->report = $request->input('report');

        $visit->save();

        session()->flash('success_message', 'Success!');

        return redirect()->route('animal.show', $animal_id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'happened_at' => 'required|date'
        ]);

        $visit = Visit::findOrFail($id);

        $visit->happened_at = date('Y-m-d H:i:s', strtotime($request->input('happened_at')));
        $visit->report = $request->input('report');

        $visit->save();

        session()->flash('success_message', 'Success!');

        return redirect()->route('animal.show', $animal_id);
    }
}
