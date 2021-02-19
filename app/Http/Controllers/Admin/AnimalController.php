<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Owner;

class AnimalController extends Controller
{
    public function create()
    {
        $animal = new Animal;

        $owners = Owner::orderBy('first_name', 'asc')->orderBy('surname', 'asc')->get();

        return view('admin.animal.edit', compact(
            'animal',
            'owners'
        ));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'owner_id' => 'required',
            'age' => 'numeric',
            'weight' => 'numeric'
        ]);

        $animal = new Animal;

        $animal->name = $request->input('name');
        $animal->owner_id = $request->input('owner_id');
        $animal->breed = $request->input('breed');
        $animal->age = $request->input('age');
        $animal->weight = $request->input('weight');

        $animal->save();

        session()->flash('success_message', 'Success!');

        return redirect()->action('Admin\AnimalController@edit', $animal->id);
    }

    public function edit($id)
    {
        $animal = Animal::findOrFail($id);

        $owners = Owner::orderBy('first_name', 'asc')->orderBy('surname', 'asc')->get();

        return view('admin.animal.edit', compact(
            'animal',
            'owners'
        ));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'owner_id' => 'required',
            'age' => 'numeric',
            'weight' => 'numeric'
        ]);

        $animal = Animal::findOrFail($id);

        $animal->name = $request->input('name');
        $animal->owner_id = $request->input('owner_id');
        $animal->breed = $request->input('breed');
        $animal->age = $request->input('age');
        $animal->weight = $request->input('weight');

        $animal->save();

        session()->flash('success_message', 'Success!');

        return redirect()->action('Admin\AnimalController@edit', $animal->id);
    }

    public function delete($id)
    {
        $animal = Animal::findOrFail($id);

        $animal->delete();

        session()->flash('success_message', 'Successfully deleted!');

        return redirect()->action('Admin\AnimalController@create');
    }


}
