<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

	// $title = $faker->sentence;
 //    $slug = Str::slug($title);
    return [
        'name' => $faker->name,
        'sku' => $faker->unique()->realText(rand(10, 20)),
        'description' => $faker->text(800),
        'value' => $faker->randomNumber(5),
        'image_path' => $faker->randomElement($array = array ('1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg')),
        'store_id' => $faker->randomElement($array = array (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18))
    ];
});
