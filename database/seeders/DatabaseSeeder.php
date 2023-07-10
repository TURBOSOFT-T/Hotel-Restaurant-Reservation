<?php

namespace Database\Seeders;
use App\Models\{ User, Contact, Menu, Comment, Page };
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {


        // Users
        User::withoutEvents(function () {
            // Create 1 admin
            User::factory(1)->create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 'admin',
            ]);
            // Create 20 managers
            User::factory()->count(20)->create([
                'role' => 'manager',
            ]);
            // Create 30 users
            User::factory()->count(30)->create();
        });

        $nbrUsers = 51;

        DB::table('categories')->insert([
    [
        'title' => 'Crudite',
        'slug' => 'crudite'
    ],
    [
        'title' => 'Pile',
        'slug' => 'pile'
    ],
    [
        'title' => 'Taro',
        'slug' => 'taro'
    ],
     [
        'title' => 'Legume',
        'slug' => 'legume'
    ],
]);

$nbrCategories = 4;


Menu::withoutEvents(function () {
    foreach (range(1, 6) as $i) {
        Menu::factory()->create([
            'title' => 'Menu ' . $i,
            'slug' => 'menu-' . $i,

            'user_id' => 2,
            'image' => 'img0' . $i . '.jpg',
        ]);
    }
    foreach (range(7, 50) as $i) {
        Menu::factory()->create([
            'title' => 'Menu ' . $i,
            'slug' => 'menu-' . $i,

            'user_id' => 3,
            'image' => 'img0' . $i . '.jpg',
        ]);
    }
});

$nbrMenus = 50;



// Set categories
$menus = Menu::all();
foreach ($menus as $menu) {
    if ($menu->id === 50) {
        DB::table ('category_menu')->insert ([
            'category_id' => 1,
            'menu_id' => 9,
        ]);
    } else {
        $numbers = range (1, $nbrCategories);
        shuffle ($numbers);
        $n = rand (1, 4);
        for ($i = 0; $i < $n; ++$i) {
            DB::table ('category_menu')->insert ([
                'category_id' => $numbers[$i],
                'menu_id' => $menu->id,
            ]);
        }
    }
}

foreach (range(1, $nbrMenus - 1) as $i) {
    Comment::factory()->create([
        'menu_id' => $i,
        'user_id' => rand(1, $nbrUsers),
    ]);
}

$faker = \Faker\Factory::create();

Comment::create([
    'menu_id' => 2,
    'user_id' => 3,
    'body' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),

    'children' => [
        [
            'menu_id' => 2,
            'user_id' => 4,
            'body' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),

            'children' => [
                [
                    'menu_id' => 2,
                    'user_id' => 2,
                    'body' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),
                ],
            ],
        ],
    ],
]);

Comment::create([
    'menu_id' => 2,
    'user_id' => 6,
    'body' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),

    'children' => [
        [
            'menu_id' => 2,
            'user_id' => 3,
            'body' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),
        ],
        [
            'menu_id' => 2,
            'user_id' => 6,
            'body' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),

            'children' => [
                [
                    'menu_id' => 2,
                    'user_id' => 3,
                    'body' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),

                    'children' => [
                        [
                            'menu_id' => 2,
                            'user_id' => 6,
                            'body' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),
                        ],
                    ],
                ],
            ],
        ],
    ],
]);

Comment::create([
    'menu_id' => 4,
    'user_id' => 4,
    'body' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),

    'children' => [
        [
            'menu_id' => 4,
            'user_id' => 5,
            'body' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),

            'children' => [
                [   'menu_id' => 4,
                    'user_id' => 2,
                    'body' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),
                ],
                [
                    'menu_id' => 4,
                    'user_id' => 1,
                    'body' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),
                ],
            ],
        ],
    ],
]);
    }
}