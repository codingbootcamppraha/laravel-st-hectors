<?php

/**
 * You can find a laravel-based seeding solution in /database/seeds/AnimalsOwnersImagesSeeder.php
 */

require_once 'DB.php';

DB::connect('127.0.0.1', 'laravel_st_hectors', 'root', 'rootroot');

DB::statement('TRUNCATE TABLE `owners`');
DB::statement('TRUNCATE TABLE `animals`');
DB::statement('TRUNCATE TABLE `images`');

$data = json_decode(file_get_contents('clients.json'), true);

foreach ($data as $owner_data) {

    DB::insert("
        INSERT INTO `owners`
        (`first_name`, `surname`)
        VALUES
        (?, ?)
    ", [
        $owner_data['first_name'],
        $owner_data['surname']
    ]);
    
    $owner_id = DB::getPdo()->lastInsertId();

    if (!empty($owner_data['pets'])) {
        foreach ($owner_data['pets'] as $pet_data) {

            $image_id = null;
            if (!empty($pet_data['photo'])) {

                DB::insert("
                    INSERT INTO `images`
                    (`path`)
                    VALUES
                    (?)
                ", [
                    'animals/'.$pet_data['photo']
                ]);

                $image_id = DB::getPdo()->lastInsertId();
            }

            DB::insert("
                INSERT INTO `animals`
                (`image_id`, `owner_id`, `name`, `species`, `breed`, `weight`, `age`)
                VALUES
                (?, ?, ?, ?, ?, ?, ?)
            ", [
                $owner_id,
                $image_id,
                $pet_data['name'],
                'dog',
                $pet_data['breed'],
                $pet_data['weight'],
                $pet_data['age']
            ]);
        }
    }
}