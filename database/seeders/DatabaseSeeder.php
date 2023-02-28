<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\User;
use App\models\Order;
use App\models\Product;
use App\models\Category;
use App\models\Sex;
use App\models\Article;
use App\models\Client;
use App\models\Contact;
use App\models\Type;
use App\models\Color;
use App\models\Size;
use App\models\Carousel;
use App\models\Subscribe;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
       /* Carousel::factory()->count(10)->create();
        Subscribe::factory()->count(10)->create();
        Category::factory()->count(10)->create();
        Sex::factory()->count(10)->create();
        Client::factory()->count(10)->create();
        Contact::factory()->count(10)->create();
        Article::factory()->count(10)->create();
        Type::factory()->count(10)->create();
        Color::factory()->count(10)->create();
        Size::factory()->count(10)->create();
        User::factory()
            ->count(10)
            ->has(
                Order::factory()
                    ->count(3)
                    ->hasAttached(
                        Product::factory()->count(5),
                        ['price' => rand(100, 500), 'quantity' => rand(1, 3)]
                    )
            )
            ->create();*/
    }
}
