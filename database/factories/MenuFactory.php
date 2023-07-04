<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Faker\Provider\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\Table\Table;

class MenuFactory extends Factory
{
    protected $model = Menu::class;

    public function definition()
    {
        $faker = \Faker\Factory::create();
        $user = User::factory()->create(); // Crée un utilisateur
        // $imagePath = Storage::putFile('public/images', new File($faker->image()));

        return [
            'libelle' => $faker->sentence(),
            'description' => $faker->paragraph(),
            'prix' => $faker->randomFloat(2, 5, 20),
            'image' => $faker->image('public/storage/images', 640, 480, null, false),
            'user_id' => $user->id,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Menu $menu, $attributes) {
            // Crée un menu pour l'utilisateur connecté
            $user = $attributes['user']; // Récupère l'utilisateur connecté
            if ($user) {
                Menu::factory()->create(['user_id' => $user->id]);
            }
        });
    }
}
