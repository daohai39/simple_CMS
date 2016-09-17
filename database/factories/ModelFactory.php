<?php

$factory->define(App\Category::class, function(Faker\Generator $faker) {
	return [
		'name' => $faker->words(3, true),
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
