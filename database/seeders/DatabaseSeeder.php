<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;



use App\Models\{ Film, Category, Actor };

use App\Models\{ User, Company,Project,Task};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Menu;

class DatabaseSeeder extends Seeder
{


     public function run()
    {

    \App\Models\User::factory(12)->create();
     \App\Models\Project::factory(20)->create();
    \App\Models\Task::factory(33)->create();
 


<<<<<<< HEAD

/*
=======
      // Créer 10 utilisateurs avec 2 menus chacun
      User::factory()->count(12)->create()->each(function ($user) {
          $user->menus()->saveMany(Menu::factory()->count(2)->make());
      });
 
//  \App\Models\Menu::factory(10)->create();
/* 
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
     Category::factory()
    ->has(Film::factory()->count(4))
    ->count(10)
    ->create();



      Actor::factory()->count(10)->create();
     Film::factory(10)->create();
        $categories = [
            'Comédie',
            'Drame',
            'Action',
            'Fantastique',
            'Horreur',
            'Animation',
            'Espionnage',
            'Guerre',
            'Policier',
            'Pornographique',
        ];
        foreach($categories as $category) {
            Category::create(['name' => $category, 'slug' => Str::slug($category)]);
        }
        $ids = range(1, 10);
        Film::factory()->count(40)->create()->each(function ($film) use($ids) {
            shuffle($ids);
            $film->categories()->attach(array_slice($ids, 0, rand(1, 4)));
            shuffle($ids);
            $film->actors()->attach(array_slice($ids, 0, rand(1, 4)));
        });
        */
    }
}




