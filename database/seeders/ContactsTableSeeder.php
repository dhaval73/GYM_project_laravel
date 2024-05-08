<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Contact;
class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            Contact::create([
                'name' => $faker->name(30),
                'mobile_no' => $faker->numberBetween(1000000000,9999999999),
                'email' => $faker->email,
                'subject' => $faker->text(50),
                'message' => $faker->paragraph,
                'mark_as_read' =>$faker->boolean(),
            ]);
    };
}
}