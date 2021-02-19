<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use App\Models\Animal;
use App\Models\Owner;
use App\Models\Image;

class StHectorsDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->truncate();
        DB::table('animals')->truncate();
        DB::table('images')->truncate();

        $data = json_decode(file_get_contents(storage_path('clients.json')));

        foreach ($data as $owner_data) {
            $owner = new Owner;
            $owner->first_name = $owner_data->first_name;
            $owner->surname = $owner_data->surname;
            $owner->save();

            if (!empty($owner_data->pets)) {
                foreach ($owner_data->pets as $pet_data) {

                    $image_id = null;
                    if (!empty($pet_data->photo)) {
                        $image = new Image;
                        $image->path = 'animals/'.$pet_data->photo;
                        $image->save();

                        $image_id = $image->id;
                    }

                    $animal = new Animal;
                    $animal->image_id = $image_id;
                    $animal->owner_id = $owner->id;
                    $animal->name = $pet_data->name;
                    $animal->species = 'dog';
                    $animal->breed = $pet_data->breed;
                    $animal->weight = $pet_data->weight;
                    $animal->age = $pet_data->age;
                    $animal->name = $pet_data->name;

                    $animal->save();
                }
            }
        }
    }
}
