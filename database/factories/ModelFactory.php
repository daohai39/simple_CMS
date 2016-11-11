<?php

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title'            => $faker->sentence,
        'description'      => $faker->paragraph,
        'content'          => $faker->paragraph,
        'featured'         => $faker->randomElement( [true, false] ),
        'status'           => $faker->randomElement( [App\Post::STATUS_PUBLISH, App\Post::STATUS_DRAFT] ),
    ];
});


$factory->define(App\Category::class, function(Faker\Generator $faker) {
	return [
		'name' => $faker->words(3, true),
	];
});

$factory->define(App\Product::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->words(3, true),
        'code' => $faker->postcode,
        'author' => $faker->name,
        'description' => $faker->paragraphs(3, true)
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Setting::class, function (Faker\Generator $faker) {
    return
    [
        'name' => $faker->name,
        'value' => $faker->words(5,true),
        'type' => $faker->randomElement($array = array ('text','textarea','number')),
    ];
});

$factory->define(App\Designer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'description' => $faker->sentences(5, true),
    ];
});
